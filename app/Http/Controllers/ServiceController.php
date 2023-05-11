<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Supplier;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Service';
        $service = Barang::where('type','service')-> orderBy('id', 'asc')->get();
        return view('serviceses.index', compact('title', 'service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Service';
        $supplier = Supplier::all();
        return view('serviceses.create', compact('title','supplier'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'barcode' => 'required',
            'nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'profit' => 'required',

        ],
        [
            'barcode' => 'barcode tidak boleh kosong',
            'nama' => 'nama tidak boleh kosong',
            'harga_beli' => 'harga wajib di isi',
            'harga_jual' => 'harga wajib ada',
            'profit' => 'profit sudah terisi',
        ]);

        $service = new Barang;
        $service->barcode = $request->barcode;
        $service->nama = $request->nama;
        $service->type = 'service';
        $service->stok = null;
        $service->harga_beli = $request->harga_beli;
        $service->harga_jual = $request->harga_jual;
        $service->profit = $request->profit;
        $service->save();
        // service::create($request->all());
        return redirect('/jasa-service')->with('Success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Service';
        $server = Barang::find($id);
        return view('serviceses.edit',compact('title', 'server'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $server = Barang::find($id);
        $server->barcode = $request->barcode;
        $server->nama = $request->nama;
        $server->type = 'service';
        $server->stok = null;
        $server->harga_beli = $request->harga_beli;
        $server->harga_jual = $request->harga_jual;
        $server->profit = $request->profit;
        $server->save();
        return redirect ('/jasa-service')->with('Success','Data Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $server = service::find($id);
        $server->delete();
        return redirect('/jasa-service')->with('Success', 'Data Berhasil Dihapus');
    }
}
