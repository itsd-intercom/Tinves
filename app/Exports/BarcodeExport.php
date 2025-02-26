<?php

namespace App\Exports;

use App\Models\Inventory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BarcodeExport implements FromView, ShouldAutoSize
{
    use Exportable;

    private $inventory;

    public function __construct()
    {
        $this->inventory = Inventory::all();
    }

    public function view(): View
    {
        return view('backend.Inventory.List.InventoryPC', [
            'inventory' => $this->inventory
        ]);
    }
}
