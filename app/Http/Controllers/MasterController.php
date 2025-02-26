<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Models\User;
use App\Models\jenis;
// use App\Models\Jenis;
use App\Models\Divisi;
use App\Models\Lokasi;
use App\Models\history;
use App\Models\Inventory;
use App\Models\NamaBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Models\Permission;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class MasterController extends Controller
{
    public function jenisAll()
    {
        $jenis = Jenis::all();
        return view('Backend.Master.Jenis.jenis_all', compact('jenis'));
    }

    public function jenisAdd()
    {
        $jenis = jenis::all();
        return view('Backend.Master.Jenis.jenisAdd', compact('jenis'));
    }

    public function JenisStore(Request $request)
    {

        $jenis = jenis::insert([
            'nama' => $request->nama,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('jenis.all')->with($notification);
    }

    public function jenisEdit($id)
    {
        $jenis = jenis::findOrFail($id);

        return view('Backend.Master.Jenis.jenisEdit', compact('jenis'));
    }

    public function jenisDelete($id)
    {
        Jenis::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Jenis Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function jenisDetails($id)
    {
        $jenis = Jenis::findOrFail($id);
        return view('Backend.Master.Jenis.jenisDetails', compact('jenis'));
    }

    public function jenisUpdate(Request $request)
    {
        $id = $request->id;

        jenis::findOrFail($id)->update([
            'nama' => $request->nama,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Inventaris Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('jenis.all')->with($notification);
    }


    // <!-- Master Divisi -->

    public function DivisiAll()
    {
        $divisi = divisi::all();
        return view('Backend.Master.divisi.divisiAll', compact('divisi'));
    }

    public function divisiAdd()
    {
        $divisi = divisi::all();
        return view('Backend.Master.divisi.divisiAdd', compact('divisi'));
    }

    public function divisiStore(Request $request)
    {

        // $id = IdGenerator::generate(['divisi' => 'divisi', 'length' => 3, 'prefix' => date('D-')]);

        divisi::insert([
            'nama' => $request->nama,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Divisi Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('divisi.all')->with($notification);
    }

    public function divisiDelete($id)
    {

        divisi::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Divisi Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function divisiEdit($id)
    {
        $divisi = Divisi::findOrFail($id);

        return view('Backend.Master.divisi.divisiEdit', compact('divisi'));
    }

    public function DivisiUpdate(Request $request)
    {
        $id = $request->id;

        divisi::findOrFail($id)->update([
            'nama' => $request->nama,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Inventaris Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('divisi.all')->with($notification);
    }

    //Lokasi Controller

    public function LokasiAll()
    {
        $lokasi = lokasi::all();
        return view('Backend.Master.lokasi.lokasiAll', compact('lokasi'));
    }

    public function lokasiAdd()
    {
        $lokasi = lokasi::all();
        return view('Backend.Master.lokasi.lokasiAdd', compact('lokasi'));
    }

    public function lokasiStore(Request $request)
    {

        $lokasi = lokasi::insert([
            'nama' => $request->nama,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'lokasi Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('lokasi.all')->with($notification);
    }

    public function lokasiDelete($id)
    {
        lokasi::findOrFail($id)->delete();

        $notification = array(
            'message' => 'lokasi Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function lokasiEdit($id)
    {
        $lokasi = lokasi::findOrFail($id);
        return view('Backend.Master.lokasi.lokasiEdit', compact('lokasi'));
    }

    public function lokasiUpdate(Request $request)
    {
        $id = $request->id;

        Lokasi::findOrFail($id)->update([
            'nama' => $request->nama,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Inventaris Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('lokasi.all')->with($notification);
    }

    //Users
    public function UserAll()
    {
        $user = user::all();

        $divisi = divisi::all();
        $lokasi = lokasi::all();
        return view('Backend.Master.users.UsersAll', compact('lokasi', 'divisi', 'user'));
    }

    public function userAdd()
    {
        $user = user::all();
        $divisi = divisi::all();
        $lokasi = lokasi::all();
        $roles = Role::pluck('name', 'id');
        $permissions = Permission::pluck('name', 'id');


        // return view('users.create', compact('roles', 'permissions'));
        return view('Backend.Master.users.userAdd', compact('user', 'divisi', 'lokasi', 'roles', 'permissions'));
    }

    public function userStore(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // create a new user object and fill it with the form data
        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->divisi_id = $request->input('divisi_id');
        $user->lokasi_id = $request->input('lokasi_id');
        $user->jabatan = $request->input('jabatan');
        // $user->username = strtolower(str_replace(' ', '', $request->name));
        $user->email = strtolower(str_replace(' ', '.', $request->input('name'))) . '@gmail.com';

        // $password = Hash::make($request->input('password'));
        $user->password = Hash::make('password');
        $user->save();

        $notification = array(
            'message' => 'Users Insert Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.all')->with($notification);
    }

    public function userDelete($id)
    {
        user::findOrFail($id)->delete();
        $notification = array(
            'message' => 'user Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function userEdit($id)
    {
        $user = user::findOrFail($id);
        $divisi = Divisi::all();
        $lokasi = Lokasi::all();
        return view('Backend.Master.users.userEdit', compact('user', 'lokasi', 'divisi'));
    }

    public function userUpdate(Request $request, User $user)
    {
        $id = $request->id;
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->username = $request->username;
        $user->jabatan = $request->jabatan;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        if ($request->filled('divisi_id')) {
            $user->divisi_id = $request->divisi_id;
        }

        if ($request->filled('lokasi_id')) {
            $user->lokasi_id = $request->lokasi_id;
        }

        $user->save();

        $notification = array(
            'message' => 'Users Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('user.all')->with($notification);
    }

    public function userDetails(Request $request, $id)
    {
        $user = user::findOrFail($id);
        $inventory = Inventory::where('user_id', $id)->get();
        $barang = NamaBarang::where('user_id', $id)->get();
        $history = history::where('inventory_id', $id)->get();
        $countIT = Inventory::where('user_id', $id)->count();
        $countGA = NamaBarang::where('user_id', $id)->count();
        $inventaris = inventory::all();

        // $history = DB::table('request')
        //     ->join('inventory', 'request.inventory_id', '=', 'inventory.id')
        //     ->select(
        //         'request.id as request_id',
        //         'request.inventory_id',
        //         'inventory.user_id',
        //         'inventory.jenis',
        //         'request.kendala',
        //         'request.pengerjaan',
        //         'request.created_at as Masuk',
        //         DB::raw("IF(request.status = 1, 'Done', 'Progress') as STATUS"),
        //         'request.updated_at as Selesai'
        //     )
        //     ->where('inventory.user_id', '=', $id)
        //     ->get();

        $history = DB::table('request')
            ->leftJoin('inventory', 'request.inventory_id', '=', 'inventory.id')
            ->select(
                'request.id as request_id',
                'request.inventory_id',
                'inventory.user_id',
                'inventory.jenis',
                'inventory.merk',
                'request.laporan',
                'request.kendala',
                'request.pengerjaan',
                'request.created_at as Masuk',
                DB::raw("IF(request.status = 1, 'Done', 'Progress') as STATUS"),
                'request.updated_at as Selesai'
            )
            ->where('inventory.user_id', '=', $id)
            ->get();

        // dd($history);

        return view('Backend.Master.users.userDetail', compact('user', 'history', 'inventory', 'barang', 'countIT', 'countGA', 'inventaris', 'history'));
    }

    public function searchUsers(Request $request)
    {
        $query = $request->input('query');

        // pencarian berdasarkan nama
        $results = User::where('name', 'like', '%' . $query . '%')->get();

        return response()->json($results);
    }
}
