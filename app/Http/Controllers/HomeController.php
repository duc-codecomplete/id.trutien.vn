<?php

namespace App\Http\Controllers;

use App\Models\Giftcode;
use App\Models\GiftcodeUser;
use App\Models\Shop;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Char;
use Auth;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function home()
    {
        $user = Auth::user();
        $shops = Transaction::where("type", "shop")->latest()->limit(10)->get();
        return view('home', ["user" => $user, "shops" => $shops]);
    }

    public function shopHistory()
    {
        $shops = Transaction::where("type", "shop")->latest()->get();
        return view('histories', ["shops" => $shops]);
    }


    public function getNapTien()
    {
        return view("deposit");
    }

    public function getShop()
    {
        $shops = Shop::where("status", "active")->get();
        return view("shop", ["shops" => $shops]);
    }

    public function postShop(Request $request)
    {
        $user = Auth::user();
        if ($user->main_id == "") {
            return redirect()->back()->with('error', 'Chưa chọn nhân vật để mua vật phẩm.');
        }

        if ($request->quantity < 1) {
            return redirect()->back()->with('error', 'Số lượng không thể nhỏ hơn 1.');
        }

        $shop = Shop::find($request->shop_id);
        if ($request->quantity > $shop->stack) {
            return redirect()->back()->with('error', 'Số lượng không thể lớn hơn số lượng xếp chồng của vật phẩm.');
        }
        $balance = $user->balance;
        $cash = $request->quantity * $shop->price;
        if ($balance < $cash) {
            return redirect()->back()->with('error', 'Số xu trong tài khoản không đủ (cần ' . $cash . ' xu, thiếu ' . $cash - $balance . ' xu), vui lòng nạp thêm.');
        }
        try {
            DB::beginTransaction();
            $this->callGameApi("post", "/html/send2.php", [
                "receiver" => $user->main_id,
                "itemid" => $shop->itemid,
                "count" => $request->quantity,
            ]);
            $user->balance = $balance - $cash;
            $user->save();

            $transaction = new Transaction;
            $transaction->user_id = $user->id;
            $transaction->shop_quantity = $request->quantity;
            $transaction->shop_id = $request->shop_id;
            $transaction->type = "shop";
            $transaction->char_id = $user->main_id;
            $transaction->save();
            DB::commit();
            return back()->with('success', 'Chúc mừng bạn đã mua thành công '.$request->quantity.' cái '.$shop->name.' với giá '. $cash. ' (xu)');
        } catch (\Throwable $th) {
            DB::rollback();
            return back()->with("error", "Có lỗi xảy ra, vui lòng liên hệ GM!");
        }
    }

    public function getGiftcode()
    {
        $giftcodes = Giftcode::all();
        return view("giftcodes", ["giftcodes" => $giftcodes]);
    }

    public function useGiftcode(Request $request, $id)
    {
        $user = Auth::user();
        if (!$user->main_id) {
            return back()->with("error", "Vui lòng vào game tạo nhân vật!!");
        }
        $userGiftcode = GiftcodeUser::where(["user_id" => $user->id, "giftcode_id" => $id])->first();
        if ($userGiftcode) {
            return redirect()->back()->with('error', 'Bạn đã dùng giftcode này!');
        }
        try {
            DB::beginTransaction();
            $code = Giftcode::find($id);
            $use = new GiftcodeUser;
            $use->user_id = $user->id;
            $use->giftcode_id = $id;
            $use->char_id = $user->main_id;
            $use->save();
            $code->count = $code->count + 1;
            $code->save();

            $this->callGameApi("post", "/html/send2.php", [
                "receiver" => $user->main_id,
                "itemid" => $code->itemid,
                "count" => $code->quantity,
            ]);
            DB::commit();
            return back()->with("success", "Sử dụng giftcode thành công, vui lòng check tín sứ!");
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with("error", "Có lỗi xảy ra, vui lòng liên hệ GM!");
        }
    }

    public function getKnb()
    {
        return view("knb");
    }

    public function postKnb()
    {
        $ratio = 3;
        $user = Auth::user();
        $xu = request()->cash;
        if ($xu < 50 || $xu > $user->balance) {
            return back()->with("error", "Số xu nạp phải lớn hơn 50 và nhỏ hơn số dư xu hiện có!");
        }
        try {
            DB::beginTransaction();
            $this->callGameApi("POST", "/html/knb.php", [
                "userid" => $user->userid,
                "cash" => intval($xu) * $ratio * 100,
            ]);
            $user->balance = intval($user->balance) - $xu;
            $user->save();

            $transaction = new Transaction;
            $transaction->user_id = $user->id;
            $transaction->knb_amount = $xu;
            $transaction->type = "knb";
            $transaction->save();
            return back()->with("success", "Đã chuyển " . intval($xu) * $ratio . " KNB vào game thành công!");
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
            return back()->with("error", "Có lỗi xảy ra, vui lòng liên hệ GM!");
        }
    }

    public function transactions()
    {
        $shops = Transaction::where("user_id", Auth::user()->id)->where("type", "shop")->latest()->get();
        $knbs = Transaction::where("user_id", Auth::user()->id)->where("type", "knb")->latest()->get();
        return view("transactions", ["shops" => $shops, "knbs" => $knbs]);
    }


    public function online()
    {

        $response = $this->callGameApi("get", "/html/online1.php", []);
        $data = $response["data"];
        $onlines = collect($data)->pluck('uid')->all();
        $chars = User::whereIn("userid", $onlines)->get();
        return $chars;
    }

    public function vip()
    {
        try {
            $response = $this->callGameApi("get", "/html/vip.php", []);
            $data = $response["data"];
            return view("vip", ["vips" => $data]);
        } catch (\Throwable $th) {
            return view("vip", ["vips" => []]);
        }
    }
}
