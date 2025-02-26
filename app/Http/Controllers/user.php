<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user extends Controller
{
    public function usersAll(){
        return view('Backend.user.user.all');
    }

    // public function index(){
    //     $user = user::all();
    //     return view('Backend.Master.users.UsersAll',compact('user'));
    // }
}