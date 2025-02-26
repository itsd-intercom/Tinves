<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function RequestAll(){
        $alldata = request::all();
        return view('Backend.Request.requestAll',compact('alldata'));
    }

    
}