<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use App\Models\Clan;
use App\Models\Family;
use App\Models\FamilyUser;

class GuildController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getGuild()
    {
        $familyUser = FamilyUser::where("char_id", Auth::user()->main_id)->first();
        $clan = null;
        if ($familyUser) {
            $fid = $familyUser->fid;
            $users = FamilyUser::where("fid", $fid)->get();
            $cid = Family::where("fid", $fid)->first()->guildid;
            $clan = Clan::where("guildid", $cid)->first();
            $families = Family::where("guildid", $cid)->pluck("fid");
            $users = FamilyUser::whereIn("fid", $families)->get();
        }
        return view("guild", ["guild" => $clan, "users" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function postGuild()
    {
        return back()->with("success", "Đã thêm, chờ xác nhận từ member");
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
