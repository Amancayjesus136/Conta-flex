<?php
namespace App\Exports;

use App\Models\compras;
use Maatwebsite\Excel\Concerns\FromCollection;

class ComprasExport implements FromCollection
{
    public function collection()
    {
        return compras::all();
    }
}

