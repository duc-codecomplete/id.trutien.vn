<?php

namespace App\Http\Controllers;

use App\Models\Giftcode;
use App\Models\GiftcodeUser;
use App\Models\Shop;
use App\Models\Transaction;
use App\Models\User;
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
        $gameApi = env('GAME_API_ENDPOINT', '');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $gameApi . '/html/reg.php', ["form_params" => [
            "login" => strtolower($request->login),
            "passwd" => $request->passwd,
            "repasswd" => $request->passwd,
            "email" => $request->login . "@gmail.com",
        ]]);
        $content = json_decode($response->getBody()->getContents(), true);
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
        $gameApi = env('GAME_API_ENDPOINT', '');
        $userid = \Auth::user()->userid;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('get', $gameApi . '/html/char.php');
        $content = json_decode($response->getBody()->getContents(), true);
        if (($content) == null) {
            return 1;
        }
        $data = $content["data"];
        $chars = collect($data)->filter(function ($value, $key) use ($userid) {
            return $value['akkid'] == $userid;
        });
        return view("shop", ["shops" => $shops, "chars" => $chars]);
    }

    public function postShop(Request $request)
    {
        $user = Auth::user();
        if ($user->main_id == "") {
            return redirect()->back()->with('error', 'Chưa chọn nhân vật để mua vật phẩm.');
        }
        $shop = Shop::find($request->shop_id);
        $balance = $user->balance;
        $cash = $request->quantity * $shop->price;
        if ($balance < $cash) {
            return redirect()->back()->with('error', 'Số xu trong tài khoản không đủ, vui lòng nạp thêm.');
        }
        $user->balance = $balance - $cash;
        $user->save();

        $transaction = new Transaction;
        $transaction->user_id = $user->id;
        $transaction->shop_quantity = $request->quantity;
        $transaction->shop_id = $request->shop_id;
        $transaction->type = "shop";
        $transaction->char_id = $request->char_id;
        $transaction->save();
        return back();
    }

    public function getGiftcode()
    {
        $giftcodes = Giftcode::all();
        $gameApi = env('GAME_API_ENDPOINT', '');
        $userid = \Auth::user()->userid;
        $client = new \GuzzleHttp\Client();
        $response = $client->request('get', $gameApi . '/html/char.php');
        $content = json_decode($response->getBody()->getContents(), true);
        if (($content) == null) {
            return 1;
        }
        $data = $content["data"];
        $chars = collect($data)->filter(function ($value, $key) use ($userid) {
            return $value['akkid'] == $userid;
        });
        return view("giftcodes", ["giftcodes" => $giftcodes, "chars" => $chars]);
    }

    public function setMainChar()
    {
        $user = Auth::user();
        $user->main_id = request()->main_id;
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
            $use->save();
            $code->count = $code->count + 1;
            $code->save();
            $client = new \GuzzleHttp\Client();
            $gameApi = env('GAME_API_ENDPOINT', '');
            $client->request('POST', $gameApi . '/html/send2.php', ["form_params" => [
                "receiver" => $user->main_id,
                "itemid" => $code->itemid,
                "count" => $code->quantity,
            ]]);
            return back()->with("success", "Sử dụng giftcode thành công, vui lòng check tín sứ!");
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return back()->with("error", "Có lỗi xảy ra, vui lòng liên hệ GM!");
        }
    }

    public function updateChar()
    {
        $gameApi = env('GAME_API_ENDPOINT', '');
        $client = new \GuzzleHttp\Client();
        $response = $client->request('get', $gameApi . '/html/char_update.php');
        $content = json_decode($response->getBody()->getContents(), true);
        return redirect("/shops");
    }
}
