<?php

namespace App\Imports;

use App\Barang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Barang([
            'supplier_id'  => $row['supplier_id'],
            'barcode' => $row['barcode'],
            'nama' => $row['nama'],
            'satuan' => $row['satuan'],
            'stok' => $row['stok'],
            'harga_beli' => $row['harga_beli'],
            'harga_jual' => $row['harga_jual'],
            'profit' => $row['profit'],
            
        ]);
    }
}
