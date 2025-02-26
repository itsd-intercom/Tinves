<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\isp;
use App\Models\User;
use App\Models\wifi;
use App\Models\notes;
use App\Models\vendor;
use App\Models\history;
use App\Models\fotocopy;
use App\Models\Inventory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{


    // public function __construct()
    // {
    //     $this->middleware('role:admin');
    // }

    public function index(Request $request){
        $inventory = Inventory::all();
        $history = history::all();
        $reqproses = history::all();
        $start_date = Carbon::now()->startOfMonth();
        $end_date = Carbon::now()->endOfMonth();
        $wifi = wifi::all();
        $isp = isp::all();
        $fc = fotocopy::all();
        $vendor = vendor::all();

        // Count
        $totalinven =Inventory::count();
        $totaluser  = user::count();
        $totalreq   = history::count();
        $totalreqpen   = history::where('status','0')->count();

        $startMonth = $request->input('startMonth');
        $endMonth = $request->input('endMonth');

        if ($startMonth && $endMonth) {
            $start_date = Carbon::parse($startMonth)->startOfMonth();
            $end_date = Carbon::parse($endMonth)->endOfMonth();

            $allData = history::whereBetween('created_at', [$start_date, $end_date])
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            // Jika tidak ada rentang bulan yang dipilih, tampilkan semua data
            $allData = history::whereBetween('created_at',[$start_date, $end_date])
                    ->orderBy('created_at','desc')
                    ->get();
        }

        $notes = notes::whereBetween('created_at',[$start_date, $end_date])->get();

        return view('admin.index',compact('inventory','history','totalinven','totaluser','totalreq','totalreqpen','reqproses','allData','notes','wifi','fc','vendor','isp' ));

    }



}