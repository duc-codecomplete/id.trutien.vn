<?php

function getAcc($userid) {
    $user = \App\Models\User::where("userid", $userid)->first();
    return $user->username ?? "";
  }