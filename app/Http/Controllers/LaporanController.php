<?php

namespace App\Http\Controllers;

use App\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class LaporanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::orderBy('id', 'asc')->get();
        return view('laporan', compact('penjualan'));
    }

    public function pdf()
    {
        $penjualan = DB::table('penjualan')
            ->join('users', 'penjualan.user_id', '=', 'users.id')
            ->join('barang', 'penjualan.nama', '=', 'barang.nama')
            ->select('penjualan.*', 'users.*', 'barang.*')
            ->get();

        $pdf = PDF::loadView('laporan_pdf', compact('penjualan'));
        return $pdf->download('Laporan penjualan.pdf');
    }

    public function pertanggal(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal . ' 00:00:00';
        $tanggal_akhir = $request->tanggal_akhir . ' 23:59:59';

        $tanggal1 = $request->tanggal_awal;
        $tanggal2 = $request->tanggal_akhir;

        $penjualan = DB::table('penjualan')
            ->join('users', 'penjualan.user_id', '=', 'users.id')
            ->join('barang', 'penjualan.nama', '=', 'barang.nama')
            ->select('penjualan.*', 'users.*', 'barang.*')
            ->whereBetween('penjualan.created_at', [$tanggal_awal, $tanggal_akhir])
            ->get();

        
        $pdf = PDF::loadView('laporan_pdf_pertanggal', compact('penjualan', 'tanggal1', 'tanggal2'));
        return $pdf->download('Laporan penjualan' . $tanggal1 . '-' . $tanggal2 . '.pdf');

    }
}
