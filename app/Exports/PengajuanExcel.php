<?php

namespace App\Exports;

use App\Models\pengajuan;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengajuanExcel implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    //     public function collection()
    // {
    //     $data = [
    //         ['No','No SPK', 'Leasing', 'Tgl Pengajuan','Tgl Hasil', 'Hasil'], // Add headers here
    //         // Add your data rows here
    //     ];

    //     // You can fetch your data and add it to the array
    //     $pengajuan = pengajuan::all();
    //     foreach ($pengajuan as $product) {
    //         $data[] = [$product->id,$product->spk_id, $product->leasing_id, $product->tgl_pengajuan, $product->tgl_hasil , $product->hasil];
    //     }

    //     return collect($data);
    // }

    // public function headings(): array
    // {
    //     return [
    //         'NO','No SPK', 'Leasing', 'Tgl Pengajuan', 'Tgl Hasil', 'Hasil'
    //     ];
    // }
    public function collection()
    {

    }

    public function headings(): array
    {
        return [
            'NO','No SPK', 'Leasing', 'Tgl Pengajuan', 'Tgl Hasil', 'Hasil'
        ];
    }
}