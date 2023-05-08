<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaporanJurnal;
use App\Lap_jurnal;
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
            $bb = \App\Jurnal::All();
            $akun = \App\Akun::All();
            $pdf = PDF::loadview('jurnal.cetak', ['laporan' => $bb, 'akun' => $akun])->setPaper('A4', 'landscape');
            return $pdf->stream();
        } elseif ($periode == 'periode') {
            $tglawal = $request->get('tglawal');
            $tglakhir = $request->get('tglakhir');
            $akun = \App\Akun::All();
            $bb = DB::table('jurnal')
                ->whereBetween('tgl_jurnal', [$tglawal, $tglakhir])
                ->orderby('tgl_jurnal', 'ASC')
                ->get();
            $pdf = PDF::loadview('jurnal.cetak', ['laporan' => $bb, 'akun' => $akun])->setPaper('A4', 'landscape');
            return $pdf->stream();
        }
    }
}
