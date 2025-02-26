<?php

namespace App\Http\Controllers\Pos;

use App\Models\User;
use App\Models\Lokasi;
use App\Models\NamaBarang;
use Illuminate\Http\Request;
use App\Models\MasterInventory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class InventoryGa extends Controller
{
    public function index()
    {
        $barang = MasterInventory::all();
        return view('Backend.Master.Barang.barang_all', compact('barang'));
    }

    public function store(Request $request)
    {
        $barang = MasterInventory::insert([
            'nama' => $request->nama,
            'merk' => $request->merk,
            'jenis' => $request->jenis,
            'ukuran' => $request->ukuran,
            'created_by' => Auth::user()->id,
            'created_at' => now(),
        ]);
        $notification = [
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->route('barang.all')
            ->with($notification);
    }

    public function edit($id)
    {
        $data = MasterInventory::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama' => '|string',
            'merk' => '|string',
            'jenis' => '|string',
            'ukuran' => '|string',
            'created_by' => '|string',
        ]);

        // Temukan data yang akan diupdate
        $namaBarang = MasterInventory::findOrFail($id);

        // Update data
        $namaBarang->update([
            'nama' => $request->nama,
            'merk' => $request->merk,
            'jenis' => $request->jenis,
            'ukuran' => $request->ukuran,
            'created_by' => Auth::user()->id,
        ]);

        $notification = [
            'message' => 'Data Success Successfully',
            'alert-type' => 'success',
        ];

        // Redirect ke halaman yang sesuai atau berikan respons sesuai kebutuhan Anda
        return redirect()
            ->route('barang.all')
            ->with($notification);
    }

    public function delete($id)
    {
        MasterInventory::findOrFail($id)->delete();

        $notification = [
            'message' => 'Data Deleted Successfully',
            'alert-type' => 'success',
        ];
        return redirect()
            ->back()
            ->with($notification);
    }

    public function json()
    {
        return DataTables::of(MasterInventory::limit(10))->make(true);
    }

    public function index_json(Request $request)
    {
        if ($request->ajax()) {
            $data = NamaBarang::with('user', 'lokasi', 'MasterInventory')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('user_nama', function ($inventaris) {
                    return $inventaris->user->nama;
                })
                ->addColumn('lokasi_nama', function ($inventaris) {
                    return $inventaris->lokasi->nama;
                })
                ->addColumn('MasterInventory_merk', function ($inventaris) {
                    return $inventaris->MasterInventory->merk;
                })
                ->addColumn('MasterInventory_jenis', function ($inventaris) {
                    return $inventaris->MasterInventory->jenis;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $users = User::all();
        $master = MasterInventory::all();
        $lokasi = Lokasi::all();

        return view('Backend.Inventory.inventoryGa.ga_inventory_json', compact('users', 'master', 'lokasi'));
    }

    public function index_master()
    {
        $barang = NamaBarang::all();
        $users = user::all();
        $master = MasterInventory::all();
        return view('Backend.Inventory.inventoryGa.ga_inventory', compact('barang', 'users', 'master'));
    }

    public function inventory_delete($id)
    {
        try {
            // Find the NamaBarang record
            $namaBarang = NamaBarang::findOrFail($id);

            // Delete the associated image file
            if (!empty($namaBarang->image)) {
                Storage::delete($namaBarang->image);
            }

            // Delete the NamaBarang record
            $namaBarang->delete();

            // Success notification
            $notification = [
                'message' => 'Inventory Deleted Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('index.all')->with($notification);
        } catch (\Exception $e) {
            // Handle exceptions, log, or provide an error message
            return redirect()->route('index.all')->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function inventory_edit($id)
    {
        $data = NamaBarang::findOrFail($id);
        $users = User::all();
        return response()->json(['data' => $data, 'users' => $users]);
    }

    public function inventory_update(Request $request, $id)
    {
        dd($request->all());
        // Validasi data yang diterima dari formulir
        $this->validate($request, [
            'user_id' => 'nullable',
            'master_id' => 'nullable',
            'tgl_pembelian' => 'nullable',
            'usia_pemakaian' => 'nullable',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $namabarang = NamaBarang::findOrFail($id); // Cari data namabarang berdasarkan ID
        $namabarang->user_id = $request->user_id;
        $namabarang->master_id = $request->master_id;
        $namabarang->tgl_pembelian = $request->tgl_pembelian;
        $namabarang->usia_pemakaian = $request->usia_pemakaian;
        $namabarang->status = $request->status;
        $namabarang->keterangan = $request->keterangan;

        $namabarang->save();

        $notification = [
            'message' => 'Data Update Successfully',
            'alert-type' => 'success',
        ];

        // Redirect ke halaman yang sesuai atau berikan respons sesuai kebutuhan Anda
        return redirect()->route('index.all')->with($notification);
    }

    public function inventory_store(Request $request)
    {
        try {
            // Validate data from the form
            $validatedData = $request->validate([
                'user_id' => 'required|numeric',
                'master_id' => 'string',
                'usia_pemakaian' => 'nullable|numeric',
                'tgl_pembelian' => 'nullable|date',
                'status' => 'nullable|string',
                'keterangan' => 'nullable|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            // Check if master_id already exists in MasterInventory
            $masterInventory = MasterInventory::where('id', $request->input('master_id'))->first();

            if (!$masterInventory) {
                // If not, add new data to MasterInventory
                $masterInventory = new MasterInventory([
                    'nama' => $request->input('nama_barang'),
                    'merk' => $request->input('merk'),
                    'jenis' => $request->input('jenis'),
                    'ukuran' => $request->input('ukuran'),
                ]);
                $masterInventory->save();
            }

            // Create an automatic ID for NamaBarang
            $lastRecord = NamaBarang::orderBy('id', 'desc')->first();
            $id_custom = 'GA-001';

            if ($lastRecord) {
                $lastId = (int)substr($lastRecord->id, 3);
                $id_custom = 'GA-' . str_pad($lastId + 1, 3, '0', STR_PAD_LEFT);
            }

            // Check if an image is uploaded
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                // Compress and save the image
                $compressedImage = Image::make($image)->resize(500, 400)->encode('jpg', 75);

                // Specify the storage path for the compressed image
                $path = 'public/nama_barang_images/' . $id_custom . '_compressed.jpg';

                // Save the compressed image
                Storage::put($path, $compressedImage->stream());
            } else {
                $path = '';
            }

            // Add data to NamaBarang
            $namaBarang = new NamaBarang([
                'user_id' => $validatedData['user_id'],
                'master_id' => $masterInventory->id,
                'id' => $id_custom,
                'image' => $path,
                'status' => $validatedData['status'],
                'tgl_pembelian' => $validatedData['tgl_pembelian'],
                'usia_pemakaian' => $validatedData['usia_pemakaian'],
                'keterangan' => $validatedData['keterangan'],
            ]);

            // Check if saving was successful
            if (!$namaBarang->save()) {
                // If not, show an error message
                $error = $namaBarang->getError();
                return redirect()->route('index.all')->with('error', 'Failed to save NamaBarang: ' . $error);
            }

            // Success notification
            $notification = [
                'message' => 'Inventory Insert Successfully',
                'alert-type' => 'success',
            ];

            return redirect()->route('index.all')->with($notification);
        } catch (\Exception $e) {
            // Handle exceptions, log, or provide an error message
            return redirect()->route('index.all')->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
