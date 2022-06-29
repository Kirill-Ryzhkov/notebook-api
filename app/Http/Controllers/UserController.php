<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function makeUser(){
        $user = new User;
        $user->name = "user";
        $user->email = "hey@gmail.com";
        $user->password = Hash::make('hello123');
        $user->save();
    }
}
