<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpKernel\Event\RequestEvent;

use App\Models\Divisi;
use Carbon\Carbon;
use App\Models\user;
use App\Models\history;
use App\Models\Inventory;
use App\Models\Jenis;
use App\Models\proses;

use function GuzzleHttp\Promise\all;

class HistoryController extends Controller
{
    public function HistoryAll()
    {
        $history = History::latest('created_at')->get();
        return view('Backend.Request.historyAll', compact('history'));
    }

    public function RequestAdd()
    {
        $history = history::all();
        $inventory = Inventory::with('user')->get();

        return view('Backend.Request.requestAdd', compact('history', 'inventory'));
    }

    public function RequestStore(Request $request)
    {

        $wifi = new history();
        // $wifi->id = $request;
        $wifi->inventory_id = $request->input('inventory_id');
        $wifi->laporan = $request->input('laporan');
        $wifi->created_by = Auth::user()->id;
        $wifi->created_at = Carbon::now();
        $wifi->save();

        // history::insert([
        //     'inventory_id' => $request->inventory_id,
        //     'laporan' => $request->laporan,
        //     'created_by' => Auth::user()->id,
        //     'created_at' => Carbon::now(),
        // ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('request.all')->with($notification);
    }

    public function historyProses($id)
    {
        $history = history::find($id);
        $user   = user::all();
        $inventory = Inventory::all();

        return view('Backend.Request.historyProses', compact('history', 'inventory', 'user'));
    }

    public function historyUpdate(Request $request, $id)
    {

        $history = History::findOrFail($id);
        //
        if ($request->filled('inventory_id')) {
            $history->inventory_id = $request->inventory_id;
        }
        if ($request->filled('laporan')) {
            $history->laporan = $request->laporan;
        }

        // $history->laporan = $request->laporan;
        $history->kendala = $request->kendala;
        $history->pengerjaan = $request->pengerjaan;
        $history->vendor = $request->vendor;
        $history->save();

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('request.all')->with($notification);
    }

    public function historyApprove($id)
    {

        $history = history::findOrFail($id);

        if ($history->save()) {

            history::findOrFail($id)->update([
                'status' => '1',
            ]);

            $notification = array(
                'message' => 'Status Approved Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('request.all')->with($notification);
        }
    } // End Method

    public function historyApproveDashboard($id)
    {

        $history = history::findOrFail($id);

        if ($history->save()) {

            history::findOrFail($id)->update([
                'status' => '1',
            ]);

            $notification = array(
                'message' => 'Status Approved Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('dashboard')->with($notification);
        }
    } // End Method

}
