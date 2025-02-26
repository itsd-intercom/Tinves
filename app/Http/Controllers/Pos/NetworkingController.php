<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\isp;
use App\Models\wifi;
use App\Models\vendor;
use App\Models\Lokasi;
use App\Models\fotocopy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NetworkingController extends Controller
{
    public function WifiAll()
    {
        $all = wifi::all();
        return view('Backend.Networking.wifi.WifiAll', compact('all'));
    }

    public function WifiAdd()
    {
        $all = wifi::all();
        return view('Backend.Networking.wifi.WifiAdd', compact('all'));
    }

    public function Wifi_Store(Request $request)
    {

        $wifi = new Wifi;
        // $wifi->id = $request;
        $wifi->name = $request->input('name');
        $wifi->wan = $request->input('wan');
        $wifi->lan = $request->input('lan');
        $wifi->wifi_password = $request->input('wifi_password');
        $wifi->Login = $request->input('Login');
        $wifi->login_pass = $request->input('login_pass');
        $wifi->merk = $request->input('merk');
        $wifi->status = $request->input('status');
        $wifi->save();

        $notification = array(
            'message' => 'Wifi Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('wifi.all')->with($notification);
    }

    public function Wifi_edit($id)
    {

        $data = wifi::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    public function Wifi_delete($id)
    {
        wifi::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Wifi Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Wifi_Update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'wan' => 'required|string',
            'lan' => 'required|string',
            'wifi_password' => 'required|string',
            'login' => 'required|string',
            'login_pass' => 'required|string',
            'merk' => 'required|string',
            'status' => 'required|string',
        ]);

        $vendor = wifi::findOrFail($id); // Cari data vendor berdasarkan ID
        $vendor->name = $validatedData['name'];
        $vendor->wan = $validatedData['wan'];
        $vendor->lan = $validatedData['lan'];
        $vendor->wifi_password = $validatedData['wifi_password'];
        $vendor->login = $validatedData['login'];
        $vendor->login_pass = $validatedData['login_pass'];
        $vendor->merk = $validatedData['merk'];
        $vendor->status = $validatedData['status'];

        // dd($request);
        $vendor->save(); // Simpan perubahan data vendor
        $notification = array(
            'message' => 'Wifi Update Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('wifi.all')->with($notification);
    }

    public function IspAll()
    {
        $isp = isp::all();
        $lokasi = Lokasi::all();
        return view('Backend.Networking.ISP.ISPAll', compact('isp', 'lokasi'));
    }

    public function IspStore(Request $request)
    {

        isp::insert([
            'name_isp' => $request->name_isp,
            'lokasi' => $request->lokasi,
            'ip' => $request->ip,
            'internet_number' => $request->internet_number,
            'speed' => $request->speed,
            'up_down' => $request->up_down,
            'no_telfon' => $request->no_telfon,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'ISP Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('isp.all')->with($notification);
    }

    public function isp_delete($id)
    {
        isp::findOrFail($id)->delete();

        $notification = array(
            'message' => 'ISP Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function Ispedit($id)
    {
        $data = isp::find($id); // Mengambil data berdasarkan ID yang diberikan
        return response()->json(['data' => $data]);
    }

    public function isp_update(Request $request, $id)
    {

        $validatedData = $request->validate([
            'name_isp' => 'required|string',
            'ip' => 'required|string',
            'lokasi' => 'required|string',
            'internet_number' => 'required|string',
            'speed' => 'required|string',
            'up_down' => 'required|string',
            'no_telfon_' => 'required|string',
        ]);

        $vendor = isp::findOrFail($id); // Cari data isp berdasarkan ID
        $vendor->name_isp = $validatedData['name_isp'];
        $vendor->ip = $validatedData['ip'];
        $vendor->lokasi = $validatedData['lokasi'];
        $vendor->internet_number = $validatedData['internet_number'];
        $vendor->speed = $validatedData['speed'];
        $vendor->up_down = $validatedData['up_down'];
        $vendor->no_telfon = $validatedData['no_telfon'];
        $vendor->save(); // Simpan perubahan data vendor

        return redirect()->route('isp.all')->with('success', 'Data ISP berhasil diupdate.');
    }

    public function fcAll()
    {
        $fc = fotocopy::all();
        return view('Backend.Networking.Fotocopy.FotocopyAll', compact('fc'));
    }


    public function fcStore(Request $request)
    {
        fotocopy::insert([
            'pengguna' => $request->pengguna,
            'lokasi' => $request->lokasi,
            'type' => $request->type,
            'status' => $request->status,
            'no_equipment' => $request->no_equipment,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Data Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('fc.all')->with($notification);
    }

    public function fc_delete($id)
    {
        fotocopy::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function fc_edit($id)
    {

        $data = fotocopy::find($id); // Mengambil data berdasarkan ID yang diberikan
        return response()->json(['data' => $data]);
    }

    public function fcupdate(Request $request, $id)
    {

        $validatedData = $request->validate([
            'pengguna' => 'required|string',
            'lokasi' => 'required|string',
            'type' => 'required|string',
            'status' => 'required|string',
            'no_equipment' => 'required|string',
        ]);

        $vendor = fotocopy::findOrFail($id); // Cari data vendor berdasarkan ID
        $vendor->pengguna = $validatedData['pengguna'];
        $vendor->lokasi = $validatedData['lokasi'];
        $vendor->type = $validatedData['type'];
        $vendor->status = $validatedData['status'];
        $vendor->no_equipment = $validatedData['no_equipment'];

        $vendor->save(); // Simpan perubahan data vendor

        return redirect()->route('fc.all')->with('success', 'Data Fotocopy berhasil diupdate.');
    }

    public function vendorAll()
    {
        $vendor = vendor::all();
        return view('Backend.Networking.Vendor.VendorAll', compact('vendor'));
    }

    public function vendorStore(Request $request)
    {
        vendor::insert([
            'nama' => $request->nama,
            'toko' => $request->toko,
            'no_telfon' => $request->no_telfon,
            'bagian' => $request->bagian,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Data Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('vendor.all')->with($notification);
    }

    public function vendor_delete($id)
    {
        vendor::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Vendor Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function vendor_edit($id)
    {

        $data_vendor = vendor::findOrFail($id); // Mengambil data berdasarkan ID yang diberikan
        return response()->json(['data' => $data_vendor]);
    }

    public function vendorupdate(Request $request, $id)
    {

        $validatedData = $request->validate([
            'nama' => 'required|string',
            'toko' => 'required|string',
            'no_telfon' => 'required|string',
            'bagian' => 'required|string',
        ]);

        $vendor = vendor::findOrFail($id); // Cari data vendor berdasarkan ID
        $vendor->nama = $validatedData['nama'];
        $vendor->toko = $validatedData['toko'];
        $vendor->no_telfon = $validatedData['no_telfon'];
        $vendor->bagian = $validatedData['bagian'];

        $vendor->save(); // Simpan perubahan data vendor

        return redirect()->route('vendor.all')->with('success', 'Data vendor berhasil diupdate.');
    }
}
