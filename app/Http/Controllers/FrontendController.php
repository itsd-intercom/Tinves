<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\history;
use App\Models\Inventory;
use App\Models\Jenis;
use App\Models\User as ModelsUser;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    // public function index(){
    //     $history = history::all();
    //     $inventory = Inventory::all();
    //     $jenis = Jenis::all();
    //     return view('Frontend.index',compact('history','inventory','jenis'));
    // }

    public function index()
    {
        $user_id = Auth::id(); // mendapatkan user_id dari user yang sedang login
        $inventory = Inventory::where('user_id', $user_id)->get();
        $jenis = Jenis::all();
        $history = History::whereIn('inventory_id', $inventory->pluck('id'))->get();

        return view('Frontend.index',  compact('inventory', 'jenis', 'history'));
    }


    public function RequestStore(Request $request){

        history::insert([

            'inventory_id' => $request->inventory_id,
            // 'inventory_id' => $request->jenis_id,
            'laporan' => $request->laporan,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('users')->with($notification);
    }
}
