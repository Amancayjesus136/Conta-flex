<?php
namespace App\Exports;

use App\Models\ventas;
use Maatwebsite\Excel\Concerns\FromCollection;

class VentasExport implements FromCollection
{
    public function collection()
    {
        return ventas::all();
    }
}
