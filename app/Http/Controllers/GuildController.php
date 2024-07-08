<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GuildUser;
use Auth;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getGuild()
    {
        $guild = Auth::user()->guild;
        $users = GuildUser::where("guild_id", $guild->guild_id)->get();
        return view("guild", ["users" => $users, "guild" => $guild]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postGuild()
    {
        $username = request()->username;
        $guild = Auth::user()->guild;
        if ($guild->role == "admin") {
            $member = User::where("username", $username)->first();
            if (!$member) {
                return back()->with("error", "Tài khoản đã tồn tại!");
            }

            if (GuildUser::where("user_id", $member->id)->first()) {
                return back()->with("error", "Tài khoản đã thuộc về bang hội!");
            }
            $item = new GuildUser;
            $item->guild_id = $guild->guild_id;
            $item->user_id = $member->id;
            $item->status = "inactive";
            $item->role = "member";
            $item->save();
            return back()->with("success", "Đã thêm, chờ xác nhận từ member");
        }
        return back()->with("error", "Đã có lỗi xảy ra, vui lòng liên hệ với GM!");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
