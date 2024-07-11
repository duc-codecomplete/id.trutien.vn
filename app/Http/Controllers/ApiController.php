<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Clan;
use App\Models\Family;
use App\Models\FamilyUser;
use DB;

class ApiController extends Controller
{
    public function paymentSuccess(Request $request)
    {
        try {
            $code = $request->code;
            $username = strtolower(substr($code, 2));
            $user = User::where("username", $username)->first();
            $amount = $request->transferAmount;
            $amount_promotion = $amount;
            $processing_time = $request->transactionDate;
            $bank = $request->gateway;

            $trans = new Deposit;
            $trans->user_id = $user->id ?? null;
            $trans->sepay_tran_id = $request->id;
            $trans->amount = $amount;
            $trans->status = "success";
            $trans->processing_time = $processing_time;
            $trans->bank = $bank;
            $trans->account_number = $request->accountNumber;

            $currentPromotion = $this->getCurrentPromotion();
            if ($currentPromotion) {
                if ($currentPromotion->type == "double") {
                    $amount_promotion = $amount_promotion * $currentPromotion->amount;
                } else {
                    $amount_promotion = $amount_promotion + $amount_promotion * $currentPromotion->amount / 100;
                }
            }
            $trans->amount_promotion = $amount_promotion;
            $user->balance = $amount_promotion;
            $trans->save();
            $user->save();
            $msg = "Người chơi " . $username . "đã nạp " . number_format($amount) . "";
            $this->sendMessage($msg);

            return response()->json("ok", 200);
        } catch (\Throwable $th) {
            throw $th;
            return view("chat", ["chat" => []]);
        }
    }

    public function getGuilds() {
        $res = $this->callGuildApi("/html/guild.php");
        $handlex = str_replace('"', '', $res);
        $res = [];
        foreach (mb_str_split($handlex) as $char) {
            if (mb_detect_encoding($char, "UTF-8", true)) {
                array_push($res, $char);
            }

        }
        $handlex = (implode("", $res));
        $parts = (explode("========", $handlex));

        $guilds = (explode("\n", $parts[0]));
        $guilds_res = [];
        foreach ($guilds as $key) {
            if ($key && !str_contains($key, 'Log::')) {
                $keys = explode(",", $key);
                array_push($guilds_res, [
                    "guildid" => $keys[0],
                    "name" => $keys[1] ? $keys[1] : "Unknow",
                    "level" => $keys[2],
                    "char_id" => $keys[3],
                    "size" => $keys[5],
                ]);
            }
        }
        Clan::upsert($guilds_res, ['guildid'], ['name', "level", "char_id", "size"]);
        $families = (explode("\n", $parts[1]));

        $families_res = [];
        foreach ($families as $key) {
            if ($key && !str_contains($key, 'Log::')) {
                $keys = explode(",", $key);
                array_push($families_res, [
                    "fid" => $keys[0],
                    "name" => $keys[1],
                    "char_id" => $keys[2],
                    "guildid" => $keys[3]
                ]);
            }
        }
        DB::table("families")->truncate();
        Family::upsert($families_res, ['fid'], ['name', "char_id", 'guildid']);
        $users = (explode("\n", $parts[2]));

        $users_res = [];
        foreach ($users as $key) {
            if ($key && !str_contains($key, 'Log::')) {
                $keys = explode(",", $key);
                array_push($users_res, [
                    "char_id" => $keys[0],
                    "fid" => $keys[1],
                    "created_at" => date("Y-m-d H:i:s")
                ]);
            }
        }
        DB::table("family_users")->truncate();
        FamilyUser::upsert($users_res, ['char_id', 'fid'], ["created_at"]);
        return response()->json("success", 200);
    }

    private function getCurrentPromotion()
    {
        $now = Carbon::now();
        $currentPromotion = Promotion::where('start_time', '<=', $now)->where('end_time', '>=', $now)->first();
        return $currentPromotion;
    }
}
