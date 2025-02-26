<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Inventory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InventoryExport implements FromView, ShouldAutoSize , WithHeadings
{

    public function view() : View
    {
        return view('Backend.Inventory.exports', [
            'export' => Inventory::with('user')->get()
        ]);
    }

    public function headings(): array
    {
        return [
            'id',
            'User',
            'jenis',
            'hostname',
            'merk',
            'processor',
            'tanggal pembelian',
            'ram',
            'grafik',
            'hardisk',
            'ssd',
            'os',
            'office',
            'akunOffice',
            'legalos',
            'internet',
            'ipaddress',
            'amp',
            'umbrella',
            'anydeskid',
        ];
    }
}
