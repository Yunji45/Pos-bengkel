<?php

use App\Penjualan;
use Carbon\Carbon;

function no_invoice() {
    $cek_kode_hari_ini = Penjualan::whereDate('created_at', Carbon::today())->count(); //0
    if ($cek_kode_hari_ini == 0) {
        $kode_penjualan = 'FB' . date('dmy') . '0001';
        return $kode_penjualan;

    } else {
        $get_penjualan = Penjualan::orderBy('id', 'desc')->whereDate('created_at', Carbon::today())->first();
        $sub = substr($get_penjualan->kode_penjualan, 8,4) + 1;
        
        $string = sprintf('%04s', $sub);
        $kode_penjualan = 'FB' . date('dmy') . $string;
        return $kode_penjualan;
    }
}

function rupiah($parameter) 
{
    $string = number_format($parameter, 0, ',', '.');
    return $string;
}