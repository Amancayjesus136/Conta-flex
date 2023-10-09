<?php
namespace App\Exports;

use App\Models\ventas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VentasExport implements FromCollection
{
    public function collection()
    {
        return ventas::all();
    }
    public function headings(): array
    {
        return [
            'RUC',
            'Nombre del Proveedor',
            'Cod Compra',
            'Tipo de Cambio',
            'Documento',
            'Factura Número',
            'Base Disponible',
            'Tasa de IGV',
            'IGV',
            'Total',
            'Fecha Comprobante',
            'Fecha de Emisión',
            'Fecha de Venta',
        ];
    }
}
