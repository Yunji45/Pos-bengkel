<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaporanJurnal;
use App\Lap_jurnal;
use App\Penjualan;
use PDF;
use DB;

class JurnalController extends Controller
{
    //
    public function index()
    {
        return view('jurnal.index');
    }

    public function show(Request $request)
    {
        $periode = $request->get('periode');
        if ($periode == 'All') {
            $bb = \App\Penjualan::All();
            $akun = \App\Akun::All();
            $pdf = PDF::loadview('jurnal.cetak', ['laporan' => $bb, 'akun' => $akun])->setPaper('A4', 'landscape');
            return $pdf->stream();
        } elseif ($periode == 'periode') {
            $tanggal_awal = $request->tanggal_awal . ' 00:00:00';
            $tanggal_akhir = $request->tanggal_akhir . ' 23:59:59';
            $tanggal1 = $request->tanggal_awal;
            $tanggal2 = $request->tanggal_akhir;
            $akun = \App\Akun::All();
            $bb = DB::table('penjualan')
            ->whereBetween('penjualan.created_at', [$tanggal_awal, $tanggal_akhir])
            ->get();
            $pdf = PDF::loadview('jurnal.cetak', ['laporan' => $bb, 'akun' => $akun])->setPaper('A4', 'landscape');
            return $pdf->stream();
        }
    }
}
