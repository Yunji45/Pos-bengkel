<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Imports\BarangImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Barang';
        $barang = Barang::orderBy('id', 'asc')->get();
        return view('barang.index', compact('title', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Barang';
        return view('barang.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Barang::create($request->all());
        $request->validate([
            'barcode' => 'required',
            'nama' => 'required',
            'type' => 'required',
            'stok' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'profit' => 'required'
        ]);
        $barang = new Barang;
        $barang->barcode = $request->barcode;
        $barang->nama = $request->nama;
        $barang->type= $request->type;
        $barang->stok = $request->stok;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->profit = $request->profit;
        $barang->save();
        return redirect('/barang')->with('success', 'Data Barang Berhasil Tersimpan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Barang';
        $barang = Barang::find($id);
        return view('barang.edit', compact('title', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        $barang->barcode = $request->barcode;
        $barang->nama = $request->nama;
        $barang->type= $request->type;
        $barang->stok = $request->stok;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->profit = $request->profit;
        $barang->save();
        return redirect('/barang')->with('success', 'Data Barang Berhasil Terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang')->with('success', 'Data Barang Berhasil Terhapus');
    }

    public function import(Request $request) 
    {
        $request->validate(
            [
                'file' => 'mimes:xls,xlxs,csv'
            ]
        );
        $file = $request->file('file');
        Excel::import(new BarangImport, $file);   
        return redirect('/barang')->with('success', 'Data Barang Berhasil Terimport');
    }
}