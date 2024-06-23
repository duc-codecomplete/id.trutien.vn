<?php

function getAcc($userid) {
    $user = \App\Models\User::where("userid", $userid)->first();
    $username = $user->username ?? "";
    if ($username == "") {
      return "";
    }
    return substr($username,0, 3)."******";
}


function getChar($userid) {
  $user = \App\Models\User::where("userid", $userid)->first();
  $username = $user->username ?? "";
  if ($username) {
    return $user->getMain();
  } else {
    return "Chưa tạo nhân vật";
  }
}