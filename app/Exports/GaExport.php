<?php

namespace App\Exports;

use App\Models\NamaBarang;
use Maatwebsite\Excel\Concerns\FromCollection;

class GaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NamaBarang::all();
    }
}