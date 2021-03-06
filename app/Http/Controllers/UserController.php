<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function info(Request $request) {
        $id = random_int(1,100);
        $user = User::where(['id' => $id])->get()->first();
        return [
            "id" => $user ? $user->getKey() : $id,
            // "open_id" => $user->open_id,
        ];

    }
}
