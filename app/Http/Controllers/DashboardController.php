<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Penjualan;

class DashboardController extends Controller
{
    public function index()
    {
        $bulan = ['january','february', 'maret', 'april','mei','juni','juli','agustus','september','oktober','november','desember'];
        $user = [];
        foreach($bulan as $key => $value){
            $user = Penjualan::where(\DB::raw("DATE_FORMAT(created_at,'%Y')"),$value)->count();
        }
        return view('dashboard')->with('bulan',json_encode($bulan,JSON_NUMERIC_CHECK))->with('user',json_encode($user,JSON_NUMERIC_CHECK));
        // $service =  Penjualan::where('type','service')->get();
        // $produk = Penjualan::where('type','produk')->get();
        // return view ('dashboard');
    }

    public function penjualan()
    {
        $penjualan = DB::table('penjualan')
            ->join('barang', 'penjualan.nama','=', 'barang.nama')
            ->select('penjualan.*', 'barang.*')
            ->whereDate('penjualan.created_at', Carbon::today())
            ->get();

        $penjualan_hari_ini = 0;
        foreach ($penjualan as $item) {
            $penjualan_hari_ini = $penjualan_hari_ini + $item->total_harga;
        }

        return response()->json([
            'penjualan' => $penjualan_hari_ini
        ]);
    }

    public function profit()
    {
        $penjualan = DB::table('penjualan')
            ->join('barang', 'penjualan.nama','=', 'barang.nama')
            ->select('penjualan.*', 'barang.*')
            ->whereDate('penjualan.created_at', Carbon::today())
            ->get();

        $profit_hari_ini = 0;
        foreach ($penjualan as $item) {
            $profit = $item->qty * $item->profit;
            $profit_hari_ini = $profit_hari_ini + $profit;
        }

        return response()->json([
            'profit' => $profit_hari_ini
        ]);
    }

    public function supplier()
    {
        $supplier = DB::table('penjualan')->count();
        return response()->json([
            'supplier' => $supplier
        ]);
    }

    public function barang()
    {
        $barang = DB::table('barang')->count();
        return response()->json([
            'barang' => $barang
        ]);
    }

}
