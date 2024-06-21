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
        return view('home', ["user" => $user]);
    }

    public function signup()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        return view('signup');
    }

    public function signin()
    {
        if (Auth::check()) {
            return redirect("/");
        }
        return view('signin');
    }

    public function signupPost(Request $request)
    {
        $validated = $request->validate([
            'login' => 'bail|required|min:4|max:10|alpha_num|unique:users,username',
            'passwd' => 'bail|required|min:4|max:10|alpha_num',
            'passwdConfirm' => 'bail|required|same:passwd',
            'email' => 'bail|required|email|unique:users,email',
        ], [
            "login.min" => "Tên đăng nhập chỉ được chứa từ 3 - 10 kí tự",
            "login.max" => "Tên đăng nhập chỉ được chứa từ 3 - 10 kí tự",
            "login.alpha_num" => "Tên đăng nhập chỉ được chứa chữ và số",
            "login.unique" => "Tên đăng nhập đã được sử dụng",
            "passwd.min" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "passwd.max" => "Mật khẩu chỉ được chứa từ 3 - 10 kí tự",
            "passwd.alpha_num" => "Mật khẩu chỉ được chứa chữ và số",
            "passwdConfirm.same" => "Mật khẩu nhập lại không đúng",
        ]);
        sleep(2);
        $content = $this->callGameApi("POST", "/html/reg.php", [
            "login" => strtolower($request->login),
            "passwd" => $request->passwd,
            "repasswd" => $request->passwd,
            "email" => $request->login . "@gmail.com",
        ]);
        if ($content["success"]) {
            $user = new User;
            $user->name = $request->login;
            $user->username = $request->login;
            $user->userid = $content["userid"];
            $user->email = $request->login . "@gmail.com";
            $user->password2 = $request->passwd;
            $user->password = \Hash::make($request->passwd);
            $user->email_verified_at = date("Y-m-d H:i:s");
            $user->save();
            return back()->with("success", "Tạo tài khoản thành công!");
        } else {
            return back()->with("error", "Tên đăng nhập đã tồn tại!");
        }
    }

    public function signinPost(Request $request)
    {
        $validated = $request->validate([
            'login' => 'bail|required',
            'password' => 'bail|required',
        ], [
            "login.required" => "Tên đăng nhập chỉ được chứa từ 3 - 10 kí tự",
        ]);
        $login = [
            'username' => $request->login,
            'password' => $request->password,
        ];
        if (\Auth::attempt($login)) {
            if (\Auth::user()->role != "member") {
                \Auth::logout();
                return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác');
            }
            return redirect('/');
        } else {
            return redirect()->back()->with('error', 'Thông tin đăng nhập không chính xác');
        }
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

        $shop = Shop::find($request->shop_id);
        if ($request->quantity > $shop->stack) {
            return redirect()->back()->with('error', 'Số lượng không thể lớn hơn số lượng xếp chồng của vật phẩm.');
        }
        $balance = $user->balance;
        $cash = $request->quantity * $shop->price;
        if ($balance < $cash) {
            return redirect()->back()->with('error', 'Số xu trong tài khoản không đủ (cần ' . $cash . ' xu, thiếu ' . $cash - $balance . ' xu), vui lòng nạp thêm.');
        }
        $user->balance = $balance - $cash;
        $user->save();

        $transaction = new Transaction;
        $transaction->user_id = $user->id;
        $transaction->shop_quantity = $request->quantity;
        $transaction->shop_id = $request->shop_id;
        $transaction->type = "shop";
        $transaction->char_id = $user->main_id;
        $transaction->save();
        return back();
    }

    public function getGiftcode()
    {
        $giftcodes = Giftcode::all();
        return view("giftcodes", ["giftcodes" => $giftcodes]);
    }

    public function setMainChar()
    {
        $user = Auth::user();
        $user->main_id = request()->main_id;
        $user->save();
        return back();
    }

    public function setMainCharHome($id)
    {
        $user = Auth::user();
        $user->main_id = $id;
        $user->save();
        return back();
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
            return back()->with("success", "Sử dụng giftcode thành công, vui lòng check tín sứ!");
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return back()->with("error", "Có lỗi xảy ra, vui lòng liên hệ GM!");
        }
    }

    public function updateChar()
    {
        $this->charUpdate();
        return back();
    }

    private function callGameApi($method, $path, $params) {
        $client = new \GuzzleHttp\Client();
        $gameApi = env('GAME_API_ENDPOINT', '');
        $response = $client->request($method, $gameApi . $path, ["form_params" => $params]);
        $response = json_decode($response->getBody()->getContents(), true);
        return $response;
    }

    private function charUpdate() {
        $response = $this->callGameApi("get", "/html/char_update.php", []);
        $data = $response["data"];
        $chars = [];
        foreach ($data as $user) {
            array_push($chars, [
                "userid" => $user["akkid"],
                "char_id" => $user["id"],
                "name" => $user["name"],
                "gender" => $user["gender"] == "1" ? "Nam" : "Nữ",
                "pk_value" => $user["pkvalue"],
                "class" => $user["occupation"]
            ]);
        }
        Char::upsert($chars, ['char_id', 'userid'], ['name', "pk_value", "gender", "class"]);
        return $data;
    }

    public function updateCharApi()
    {
        $data = $this->charUpdate();
        return response()->json($data);
    }

    public function getKnb()
    {
        return view("knb");
    }

    public function postKnb()
    {
        $ratio = 3;
        $user = Auth::user();
        $gameApi = env('GAME_API_ENDPOINT', '');
        $client = new \GuzzleHttp\Client();
        $xu = request()->cash;
        if ($xu < 50 || $xu > $user->balance) {
            return back()->with("error", "Số xu nạp phải lớn hơn 50 và nhỏ hơn số dư xu hiện có!");
        }
        try {
            DB::beginTransaction();
            $client->request('POST', $gameApi . '/html/knb.php', ["form_params" => [
                "userid" => $user->userid,
                "cash" => intval($xu) * $ratio * 100,
            ]]);
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
        $shops = Transaction::where("type", "shop")->latest()->get();
        $knbs = Transaction::where("type", "knb")->latest()->get();
        return view("transactions", ["shops" => $shops, "knbs" => $knbs]);
    }
}
