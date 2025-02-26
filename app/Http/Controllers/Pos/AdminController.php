<?php

namespace App\Http\Controllers\Pos;

use Carbon\Carbon;
use App\Models\spk;
use App\Models\leasing;
use App\Models\pengajuan;
use Illuminate\Http\Request;

use App\Exports\PengajuanExcel;

use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{

    // public function index(){
    //     $spk = spk::all();
    //     return view('Backend.Admin.admin',compact('spk'));
    // }

    public function admin_json(Request $request){
        $data = spk::all();
        if ($request->ajax()) {
            $data = spk::latest()->get();
            return DataTables::of($data)
               ->addIndexColumn()
               ->addColumn('action', function($row){
                $btn = '<a href="'.route('notes.show',$row->id).'" class="edit btn btn-primary btn-sm">View</a>';
                return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Backend.Admin.admin',compact('data'));
    }

    public function json(){
        return DataTables::of(spk::limit(10))->make(true);
        return DataTables::of(pengajuan::limit(10))->make(true);
    }

    public function store(Request $request){

        $jenis = $request->input('jenis');

        $data = [];

        if ($jenis === 'Perusahaan') {
            $data = [
                'akta_pendirian' => $request->input('akta_pendirian', null),
                'sk_kemenkumham' => $request->input('sk_kemenkumham', null),
                'akta_perubahan' => $request->input('akta_perubahan', null),
                'npwp' => $request->input('npwp_perusahaan', null),
                'nib' => $request->input('nib', null),
                'rek_koran_perusahaan' => $request->input('rek_koran_perusahaan', null),
                'ktp_direksi' => $request->input('ktp_direksi', null),
                'ktp_komisaris' => $request->input('ktp_komisaris', null),
                'ktp_p_saham' => $request->input('ktp_p_saham', null),
                'keterangan' => $request->input('keterangan_perusahaan', null),
            ];
            } elseif ($jenis === 'Pribadi') {
            $data = [
                'ktp_pemohon' => $request->input('ktp_pemohon', null),
                'ktp_pasangan' => $request->input('ktp_', null),
                'ktp_penjamin' => $request->input('ktp_penjamin', null),
                'kk' => $request->input('kk', null),
                'npwp' => $request->input('npwp', null),
                'pbb' => $request->input('pbb', null),
                'rek_listrik' => $request->input('rek_listrik', null),
                'rek_koran' => $request->input('rek_koran', null),
                'rek_gaji' => $request->input('rek_gaji', null),
                'bukti_usaha' => $request->input('bukti_usaha', null),
                'sku' => $request->input('sku', null),
                'keterangan' => $request->input('ket_pribadi', null),
            ];
        } else {
            // Tindakan jika jenis tidak sesuai dengan Perusahaan atau Pribadi
        }

        // Mengecek kondisi untuk mengatur status
        if (
            ($jenis === 'Pribadi' && $data['ktp_pemohon'] && ($data['ktp_pasangan'] || $data['ktp_penjamin']) && $data['kk'] && $data['npwp']
                                  && ($data['pbb'] ||  $data['rek_listrik']) && $data['rek_koran'] && ($data['rek_gaji'] || $data['sku'] || $data['bukti_usaha'] )   ) ||

            ($jenis === 'Perusahaan' && $data['akta_pendirian'] && $data['sk_kemenkumham'] && $data['akta_perubahan']
                         && $data['npwp'] && $data['nib'] && $data['rek_koran_perusahaan'] && $data['ktp_direksi']
                         && $data['ktp_komisaris'] && $data['ktp_p_saham'] && $data['keterangan'] )
        ) {
            $data['status'] = "Lengkap"; // Status lengkap
        } else {
            $data['status'] = "Belum Lengkap"; // Status belum lengkap
        }

        // Menambahkan data yang sama untuk semua jenis
        $data += [
            'tgl_spk' => $request->tgl_spk,
            'no_spk' => $request->no_spk,
            'nama_spv' => $request->nama_spv,
            'nama_sales' => $request->nama_sales,
            'nama_customer' => $request->nama_customer,
            'jenis' => $request->jenis,
            // 'created_by' => Auth::user()->id,
            'created_at' => now(),
        ];

        $inventory = spk::create($data);

        $notification = [
            'message' => 'Data Insert Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin_json')->with($notification);
    }

    public function spk_edit($id){
        $data = spk::findOrFail($id);
        return response()->json(['data' => $data]);
    }

    // private function setStatus($jenis, $data)
    // {
    //     if (
    //         ($jenis === 'Pribadi' && $data['ktp_pemohon'] && ($data['ktp_pasangan'] || $data['ktp_penjamin']) && $data['kk'] && $data['npwp']
    //             && ($data['pbb'] ||  $data['rek_listrik']) && $data['rek_koran'] && ($data['rek_gaji'] || $data['sku'] || $data['bukti_usaha'] )   ) ||

    //         ($jenis === 'Perusahaan' && $data['akta_pendirian'] && $data['sk_kemenkumham'] && $data['akta_perubahan']
    //             && $data['npwp'] && $data['nib'] && $data['rek_koran_perusahaan'] && $data['ktp_direksi']
    //             && $data['ktp_komisaris'] && $data['ktp_p_saham'] && $data['keterangan'] )
    //     ) {
    //         return "Lengkap"; // Status lengkap
    //     } else {
    //         return "Belum Lengkap"; // Status belum lengkap
    //     }
    // }

    public function pribadi_update(Request $request, $id)
    {
        // Ambil data SPK yang ingin diupdate
        $spk = spk::findOrFail($id);
        $spk->tgl_spk = $request->tgl_spk;
        $spk->jenis = $request->jenis;
        $spk->no_spk = $request->no_spk;
        $spk->nama_spv = $request->nama_spv;
        $spk->nama_sales = $request->nama_sales;
        $spk->nama_customer = $request->nama_customer;

        $spk->ktp_pemohon = $request->ktp_pemohon;
        $spk->ktp_pasangan = $request->ktp_pasangan;
        $spk->ktp_penjamin = $request->ktp_penjamin;
        $spk->kk = $request->kk;
        $spk->npwp = $request->npwp;
        $spk->pbb = $request->pbb;
        $spk->rek_listrik = $request->rek_listrik;
        $spk->rek_koran = $request->rek_koran;
        $spk->rek_gaji = $request->rek_gaji;
        $spk->bukti_usaha = $request->bukti_usaha;
        $spk->bukti_usaha = $request->bukti_usaha;
        $spk->keterangan = $request->keterangan;
        // Lakukan proses pembaruan data seperti yang Anda lakukan sebelumnya

        // ...

        // Set status ulang berdasarkan kondisi yang sesuai
        if (
            ($spk->jenis === 'Pribadi' && $spk->ktp_pemohon && ($spk->ktp_pasangan || $spk->ktp_penjamin) && $spk->kk && $spk->npwp
                                && ($spk->pbb ||  $spk->rek_listrik) && $spk->rek_koran && ($spk->rek_gaji || $spk->sku || $spk->bukti_usaha)   ) ||

            ($spk->jenis === 'Perusahaan' && $spk->akta_pendirian && $spk->sk_kemenkumham && $spk->akta_perubahan
                        && $spk->npwp && $spk->nib && $spk->rek_koran_perusahaan && $spk->ktp_direksi
                        && $spk->ktp_komisaris && $spk->ktp_p_saham && $spk->keterangan)
        ) {
            $spk->status = "Lengkap"; // Status lengkap
        } else {
            $spk->status = "Belum Lengkap"; // Status belum lengkap
        }

        // Simpan perubahan
        $spk->save();

        $notification = [
            'message' => 'Data Update Successfully',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin_json')->with($notification);
    }


    public function perusahaan_update(Request $request, $id){


        $spk = spk::findOrFail($id); // Cari data spk berdasarkan ID
        $spk->tgl_spk = $request->tgl_spk;
        $spk->jenis = $request->jenis;
        $spk->no_spk = $request->no_spk;
        $spk->nama_spv = $request->nama_spv;
        $spk->nama_sales = $request->nama_sales;
        $spk->nama_customer = $request->nama_customer;

        $spk->akta_pendirian = $request->akta_pendirian;
        $spk->sk_kemenkumham = $request->sk_kemenkumham;
        $spk->akta_perubahan = $request->akta_perubahan;
        $spk->npwp = $request->npwp;
        $spk->nib = $request->nib;
        $spk->rek_koran_perusahaan = $request->rek_koran_perusahaan;
        $spk->ktp_direksi = $request->ktp_direksi;
        $spk->ktp_komisaris = $request->ktp_komisaris;
        $spk->ktp_p_saham = $request->ktp_p_saham;
        $spk->keterangan = $request->keterangan;

        // Set status ulang berdasarkan kondisi yang sesuai
        if (
            ($spk->jenis === 'Pribadi' && $spk->ktp_pemohon && ($spk->ktp_pasangan || $spk->ktp_penjamin) && $spk->kk && $spk->npwp
                                && ($spk->pbb ||  $spk->rek_listrik) && $spk->rek_koran && ($spk->rek_gaji || $spk->sku || $spk->bukti_usaha)   ) ||

            ($spk->jenis === 'Perusahaan' && $spk->akta_pendirian && $spk->sk_kemenkumham && $spk->akta_perubahan
                        && $spk->npwp && $spk->nib && $spk->rek_koran_perusahaan && $spk->ktp_direksi
                        && $spk->ktp_komisaris && $spk->ktp_p_saham )
        ) {
            $spk->status = "Lengkap"; // Status lengkap
        } else {
            $spk->status = "Belum Lengkap"; // Status belum lengkap
        }

        // @dd($request);

        // @dd($spk);
        $spk->save(); // Simpan perubahan data vendor
        // @dd($request);

        $notification = array(
            'message' => 'Data Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.perusahaan')->with($notification);
    }

    // public function perusahaan_update(Request $request,$id){
    //     {
    //         // Validasi data yang diterima dari form
    //         $validatedData = $request->validate([
    //             'tgl_spk' => 'required|date',
    //             'jenis' => 'required|string',
    //             'no_spk' => 'required|string',
    //             'nama_spv' => 'required|string',
    //             'nama_sales' => 'required|string',
    //             'nama_customer' => 'required|string',
    //             'akta_pendirian' => 'required|string',
    //             'sk_kemenkumham' => 'required|string',
    //             'akta_perubahan' => 'required|string',
    //             'npwp' => 'required|string',
    //             'nib' => 'required|string',
    //             'rek_koran' => 'required|string',
    //             'ktp_direksi' => 'required|string',
    //             'ktp_komisaris' => 'required|string',
    //             'ktp_p_saham' => 'required|string',
    //             'keterangan' => 'required|string',
    //         ]);

    //         // Temukan data spk berdasarkan ID
    //         $spk = Spk::findOrFail($id);

    //         // Update data spk dengan data yang divalidasi dari form
    //         $spk->update($validatedData);

    //         $notification = [
    //             'message' => 'Data Insert Successfully',
    //             'alert-type' => 'success',
    //         ];
    //         // Redirect kembali ke halaman yang sesuai dengan kebutuhan Anda
    //         return redirect()->route('admin.perusahaan')->with('$notification');
    //     }
    // }

    public function adminPribadi(){
        $spk = spk::where('jenis','Pribadi')->get();
        return view('Backend.Admin.adminPribadi',compact('spk'));
    }

    public function adminPerusahaan(){
        $spk = spk::where('jenis','Perusahaan')->get();
        return view('Backend.Admin.adminPerusahaan',compact('spk'));
    }

    public function pengajuan_json(Request $request){
        $data = pengajuan::with('spk')->get();
        if ($request->ajax()) {
            $data = pengajuan::latest()->get();
            return DataTables::of($data)
               ->addIndexColumn()
               ->addColumn('leasing.nama', function($data) {
                return $data->leasing->nama;
                })
               ->addColumn('spk.no_spk', function($data) {
                return $data->spk->no_spk;
                })
               ->addColumn('action', function($row){
                    $btn = '<a href="'.route('notes.show',$row->id).'" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Backend.Admin.pengajuan.pengajuan');
    }

    public function pengajuanAll(){
        $data = pengajuan::all();
        return view('Backend.Admin.pengajuan.pengajuan',compact('data'));
    }

    public function pengajuanAdd(){
        $pengajuan = pengajuan::all();
        $spk = spk::all();
        $leasing = leasing::all();
       return view('Backend.Admin.pengajuan.pengajuanAdd',compact('pengajuan','spk','leasing'));
    }

    public function pengajuanStore(Request $request) {
        // Validasi data yang masuk
        $request->validate([
            'spk_id' => 'required',
            'leasing_id' => 'required',
            'tgl_pengajuan' => 'required|date',
            'tgl_hasil' => 'required|date',
            'hasil' => 'required',
        ]);

        // Simpan data ke dalam database
        Pengajuan::create([
            'spk_id' => $request->spk_id,
            'leasing_id' => $request->leasing_id,
            'tgl_pengajuan' => $request->tgl_pengajuan,
            'tgl_hasil' => $request->tgl_hasil,
            'hasil' => $request->hasil,
        ]);

        // Redirect ke halaman yang sesuai setelah penyimpanan
        return redirect()->route('pengajuan.all');
    }

    public function pengajuanExcel()
    {
        return Excel::download(new pengajuanExcel, 'laporan.xlsx');
    }
    // Before

    // public function report(){
    //     $data = pengajuan::all();
    //     return view('Backend.Admin.pengajuan.report.reportAll',compact('data'));
    // }
    public function report(){
        // Ambil bulan dan tahun saat ini
        $now = Carbon::now();
        $bulanIni = $now->month;
        $tahunIni = $now->year;

        // Ambil data pengajuan hanya untuk bulan ini
        $data = pengajuan::whereMonth('tgl_pengajuan', $bulanIni)
            ->whereYear('tgl_pengajuan', $tahunIni)
            ->get();
        // $data = pengajuan::join('spk', 'pengajuan.spk_id', '=', 'spk.id')
        // ->whereMonth('tgl_pengajuan', $bulanIni)
        // ->whereYear('tgl_pengajuan', $tahunIni)
        // ->groupBy('spk.no_spk', 'pengajuan.id') // tambahkan 'pengajuan.id' ke dalam GROUP BY
        // ->get();

        return view('Backend.Admin.pengajuan.report.reportAll', compact('data'));
    }
}