<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\history;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Exports\BarcodeExport;
use App\Exports\InventoryExport;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
{

    public function InventarisAll()
    {
        $inventory = Inventory::all();
        return view('Backend.Inventory.InventoryAll', compact('inventory'));
    }

    public function index_json(Request $request)
    {
        $jenis = $request->input('jenis');

        $data = Inventory::with(['user', 'user.Divisi', 'user.Lokasi']);

        // Filter berdasarkan jenis jika ada
        if (!empty($jenis)) {
            if ($jenis === 'Peripheral') {
                // Show all data except for PC and Laptop
                $data->whereNotIn('jenis', ['PC', 'Laptop']);
            } else {
                $data->where('jenis', $jenis);
            }
        }

        $data = $data->get();
        if ($request->ajax()) {

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user.name', function ($inventaris) {
                    return $inventaris->user->name;
                })
                ->addColumn('user.jabatan', function ($inventaris) {
                    return $inventaris->user->jabatan;
                })
                ->addColumn('divisi.nama', function ($inventaris) {
                    return $inventaris->user->Divisi->nama;
                })
                ->addColumn('lokasi.nama', function ($inventaris) {
                    return $inventaris->user->Lokasi->nama;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Backend.Inventory.index');
    }

    public function InventarisAdd()
    {
        $user = user::with('divisi', 'lokasi')->get();
        return view('Backend.Inventory.inventoryAdd', compact('user'));
    }

    public function InventarisStore(Request $request)
    {
        $jenis = $request->input('jenis');
        $data = [];

        $lastRecord = Inventory::orderBy('id', 'desc')->first();
        $id_custom = 'IT-001';

        if ($lastRecord) {
            $lastId = (int)substr($lastRecord->id, 2);
            $id_custom = 'IT-' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
        }

        // Buat array data yang akan digunakan untuk membuat objek Inventory
        if ($jenis === 'PRINTER') {
            $data = [
                'merk' => $request->input('printerMerk'),
                'tanggal' => $request->input('printerTanggal'),
            ];
        } elseif ($jenis === 'PC' || $jenis === 'LAPTOP') {
            $data = [
                'merk' => $request->input($jenis === 'PC' ? 'pcMerk' : 'laptopMerk'),
                'tanggal' => $request->input($jenis === 'PC' ? 'pcTanggal' : 'laptopTanggal'),
                'hostname' => $request->input($jenis === 'PC' ? 'hostname' : 'laptopHostname'),
                'os' => $request->input($jenis === 'PC' ? 'os' : 'laptopOs'),
                'Office' => $request->input($jenis === 'PC' ? 'Office' : 'laptopOffice'),
                'akunOffice' => $request->input($jenis === 'PC' ? 'akunOffice' : 'laptopAkunOffice'),
                'Processor' => $request->input($jenis === 'PC' ? 'Processor' : 'laptopProcessor'),
                'ssd' => $request->input($jenis === 'PC' ? 'ssd' : 'laptopSsd'),
                'ram' => $request->input($jenis === 'PC' ? 'ram' : 'laptopRam'),
                'legalos' => $request->input($jenis === 'PC' ? 'legalos' : 'laptopLegalos'),
                'grafik' => $request->input($jenis === 'PC' ? 'grafik' : 'laptopGrafik'),
                'hardisk' => $request->input($jenis === 'PC' ? 'hardisk' : 'laptopHardisk'),
                'umbrella' => $request->input($jenis === 'PC' ? 'umbrella' : 'laptopUmbrella'),
                'amp' => $request->input($jenis === 'PC' ? 'amp' : 'laptopAmp'),
                'anydeskid' => $request->input($jenis === 'PC' ? 'anydeskid' : 'laptopAnydeskid'),
                'ipaddress' => $request->input($jenis === 'PC' ? 'ipaddress' : 'laptopIpaddress'),
            ];
        } elseif (
            $jenis === 'MONITOR' || $jenis === 'UPS' || $jenis === 'KEYBOARD' || $jenis === 'MOUSE' || $jenis === 'SPEAKER' || $jenis === 'TELEPHONE' || $jenis === 'HEADSET' || $jenis === 'POINTER' || $jenis === 'MICROPHONE' || $jenis === 'GIMBALL' || $jenis === 'CAMERA'
            || $jenis === 'LENSA' || $jenis === 'FLASH' || $jenis === 'LED' || $jenis === 'SCANNER' || $jenis === 'PENGHANCUR KERTAS' || $jenis === 'MESIN PENGHITUNG UANG'
            || $jenis === 'HUB'  || $jenis === 'TV' || $jenis === 'SARAMONIC' || $jenis === 'TWIN CLIENT' || $jenis === 'HP'
        ) {
            $data = [
                'merk' => $request->input($jenis === 'MONITOR' ? 'monitorMerk' : ($jenis === 'UPS' ? 'upsMerk' : ($jenis === 'KEYBOARD' ? 'keyboardMerk' : ($jenis === 'MOUSE' ? 'mouseMerk' : ($jenis === 'SPEAKER' ? 'speakerMerk' : ($jenis === 'TELEPHONE' ? 'telephoneMerk' : ($jenis === 'HEADSET' ? 'headsetMerk'  : ($jenis === 'POINTER' ? 'pointerMerk' : ($jenis === 'MICROPHONE' ? 'microphoneMerk' : ($jenis === 'GIMBAL' ? 'gimbalMerk' : ($jenis === 'CAMERA' ? 'cameraMerk' : ($jenis === 'LENSA' ? 'lensaMerk'  : ($jenis === 'FLASH' ? 'flashMerk' : ($jenis === 'LED' ? 'ledMerk' : ($jenis === 'SCANNER' ? 'scannerMerk' : ($jenis === 'PENGHANCUR KERTAS' ? 'penghancurkertasFields' : ($jenis === 'MESIN PENGHITUNG UANG' ? 'mesinMerk' : ($jenis === 'HUB' ? 'hubMerk' : ($jenis === 'TV' ? 'tvMerk' : ($jenis === 'TWIN CLIENT' ? 'tcMerk' : ($jenis === 'HP' ? 'hpMerk' : ($jenis === 'HARDISK' ? 'hardiskMerk' : ($jenis === 'SARAMONIC' ? 'saramonicMerk' : 'webcamMerk'))))))))))))))))))))))),

                'tanggal' => $request->input($jenis === 'MONITOR' ? 'monitorTanggal' : ($jenis === 'UPS' ? 'upsTanggal' : ($jenis === 'KEYBOARD' ? 'keyboardTanggal' : ($jenis === 'MOUSE' ? 'mouseTanggal' : ($jenis === 'SPEAKER' ? 'speakerTanggal' : ($jenis === 'TELEPHONE' ? 'telephoneTanggal' : ($jenis === 'HEADSET' ? 'headsetTanggal' : ($jenis === 'POINTER' ? 'pointerTanggal' : ($jenis === 'MICROPHONE' ? 'microphoneTanggal' : ($jenis === 'GIMBAL' ? 'gimbalTanggal' : ($jenis === 'CAMERA' ? 'cameraTanggal' : ($jenis === 'LENSA' ? 'lensaTanggal'  : ($jenis === 'FLASH' ? 'flashTanggal' : ($jenis === 'LED' ? 'ledTanggal' : ($jenis === 'SCANNER' ? 'scannerTanggal' : ($jenis === 'PENGHANCUR KERTAS' ? 'penghancurkertasFields' : ($jenis === 'MESIN PENGHITUNG UANG' ? 'mesinTanggal' : ($jenis === 'HUB' ? 'hubTanggal' : ($jenis === 'TV' ? 'tvTanggal' : ($jenis === 'TWIN CLIENT' ? 'tcTanggal' : ($jenis === 'HP' ? 'hpTanggal' : ($jenis === 'HARDISK' ? 'hardiskTanggal' : ($jenis === 'SARAMONIC' ? 'saramonicTanggal' : 'webcamTanggal'))))))))))))))))))))))),
            ];
        }

        // Buat objek Inventory dengan data yang telah dikumpulkan
        $inventoryData = array_merge($data, [
            'id' => $id_custom,
            'user_id' => $request->user_id,
            'jenis' => $request->jenis,
            'created_by' => Auth::user()->id,
            'created_at' => now(),
        ]);

        $inventory = Inventory::create($inventoryData);

        $notification = [
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('index_json')->with($notification);
    }

    public function InventarisEdit($id)
    {
        $inventaris = Inventory::findOrFail($id);
        $user = user::all();
        return view('Backend.Inventory.inventoryEdit', compact('inventaris', 'user'));
    }

    public function json()
    {
        return DataTables::of(Inventory::limit(10))->make(true);
    }

    public function InventarisUpdate(Request $request, $id)
    {

        //validasi inputan dari form
        $this->validate($request, [
            'user_id' => 'nullable',
            'jenis' => 'nullable',
            'hostname' => 'nullable',
            'os' => 'nullable',
            'merk' => 'nullable',
            'Office' => 'nullable',
            'Processor' => 'nullable',
            'akunOffice' => 'nullable',
            'ram' => 'nullable',
            'ssd' => 'nullable',
            'grafik' => 'nullable',
            'legalos' => 'nullable',
            'hardisk' => 'nullable',
            'internet' => 'nullable',
            'amp' => 'nullable',
            'umbrella' => 'nullable',
            'ipaddress' => 'nullable',
            'anydeskid' => 'nullable'
        ]);

        //mengambil data inventaris dari database
        $inventaris = Inventory::findOrFail($id);

        //mengupdate data inventaris dengan data baru dari inputan form
        $inventaris->user_id = $request->user_id;
        $inventaris->jenis = $request->jenis;
        $inventaris->hostname = $request->hostname;
        $inventaris->os = $request->os;
        $inventaris->merk = $request->merk;
        $inventaris->Office = $request->Office;
        $inventaris->Processor = $request->Processor;
        $inventaris->akunOffice = $request->akunOffice;
        $inventaris->ram = $request->ram;
        $inventaris->ssd = $request->ssd;
        $inventaris->grafik = $request->grafik;
        $inventaris->legalos = $request->legalos;
        $inventaris->hardisk = $request->hardisk;
        $inventaris->internet = $request->internet;
        $inventaris->amp = $request->amp;
        $inventaris->umbrella = $request->umbrella;
        $inventaris->ipaddress = $request->ipaddress;
        $inventaris->anydeskid = $request->anydeskid;

        //jika kolom tidak diubah, maka ambil nilai dari database sebelumnya
        if (!$inventaris->isDirty('user_id')) {
            $inventaris->user_id = $inventaris->getOriginal('user_id');
        }

        //simpan perubahan data pada inventaris
        $inventaris->save();

        //set notifikasi untuk ditampilkan pada halaman selanjutnya
        $notification = array(
            'message' => 'Inventaris Updated Successfully',
            'alert-type' => 'success'
        );

        //kembalikan user ke halaman inventaris dengan notifikasi
        return redirect()->route('index_json');
    }

    public function InventarisDelete($id)
    {
        // Hapus inventory
        Inventory::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Inventory Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function InventarisDetails($id)
    {
        $inventaris = Inventory::findOrFail($id);
        $user = user::all();
        $history = history::where('inventory_id', $id)->get();

        return view('Backend.Inventory.inventoryDetails', compact('inventaris', 'user', 'history'));
    }

    public function inventoryPrinter()
    {
        $inventory = Inventory::where('jenis', 'PRINTER')->get();
        $user = User::all();
        return view('Backend.Inventory.List.InventoryPrinter', compact('inventory', 'user'));
    }

    public function printer_edit($id)
    {

        $inventory = Inventory::find($id); // Mengambil data berdasarkan ID yang diberikan
        // $users = User::all(); // Mengambil semua data user dari tabel user

        return response()->json(['data' => $inventory]);
    }

    public function printer_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|string',
            'jenis' => 'required|string',
            'merk' => 'required|string',
            'tanggal' => 'nullable|date',
        ]);
        $vendor = Inventory::findOrFail($id); // Cari data vendor berdasarkan ID
        $vendor->user_id = $validatedData['user_id'];
        $vendor->jenis = $validatedData['jenis'];
        $vendor->merk = $validatedData['merk'];
        $vendor->tanggal = $validatedData['tanggal'];

        $vendor->save(); // Simpan perubahan data vendor

        return redirect()->route('invetaris.peripheral')->with('success', 'Data Inventory berhasil diupdate.');
    }

    public function inventoryPc()
    {
        $inventory = Inventory::where('jenis', 'PC')->get();
        return view('Backend.Inventory.List.InventoryPc', compact('inventory'));
    }

    public function inventoryUps()
    {
        $inventory = Inventory::where('jenis', 'UPS')->get();
        return view('Backend.Inventory.List.InventoryUps', compact('inventory'));
    }

    public function inventoryLaptop()
    {
        $inventory = Inventory::where('jenis', 'LAPTOP')->get();
        return view('Backend.Inventory.List.InventoryLaptop', compact('inventory'));
    }

    public function inventoryPeripheral(Request $request)
    {
        $data = Inventory::whereNotIn('jenis', ['Laptop', 'PC'])->get();
        if ($request->ajax()) {
            $data = Inventory::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user.name', function ($inventaris) {
                    return $inventaris->user->name;
                })
                ->addColumn('user.jabatan', function ($inventaris) {
                    return $inventaris->user->jabatan;
                })
                ->addColumn('divisi.nama', function ($inventaris) {
                    return $inventaris->user->Divisi->nama;
                })
                ->addColumn('lokasi.nama', function ($inventaris) {
                    return $inventaris->user->Lokasi->nama;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Backend.Inventory.List.inventoryPeripheral', compact('data'));
    }

    public function exportExcel()
    {
        return Excel::download(new BarcodeExport, 'barcode.xlsx');
    }

    public function export()
    {
        return Excel::download(new InventoryExport, 'inventory-IT.xlsx');
    }
}
