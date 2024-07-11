<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\User;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    private function getCurrentPromotion()
    {
        $now = Carbon::now();
        $currentPromotion = Promotion::where('start_time', '<=', $now)->where('end_time', '>=', $now)->first();
        return $currentPromotion;
    }
}
