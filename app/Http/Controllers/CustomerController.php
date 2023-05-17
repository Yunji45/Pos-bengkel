<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Auth;
use PDF;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $fillable = ['no_antrian','status'];

    public function index()
    {
        $title = 'Customer';
        $antrian = auth::user();
        $data = $antrian->service;
        return view ('customer.index', compact ('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Customer';
        return view ('customer.create' ,compact('title'));
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
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ],[
            'nama' => 'nama tidak boleh kosong',
            'alamat' => 'alamat tidak boleh kosong',
            'no_telp' => 'no telepon tidak boleh kosong'
        ]
    );
        // Cek jumlah antrian yang sedang aktif
        $jumlah_antrian = Customer::where('status', 'menunggu')->count();
        if ($jumlah_antrian >= 10) {
            return redirect('/customer')->with('error', 'Maaf, antrian sudah penuh.');
        }
        $last_antrian = Customer::orderBy('no_antrian', 'desc')->first();
        $nomor_antrian = $last_antrian ? $last_antrian->no_antrian + 1 : 1;
        if ($nomor_antrian > 10) {
            $nomor_antrian = 1;
        }        
        // Buat antrian baru
        $antrian = new Customer;
        $antrian ->user_id = auth::user()->id;
        $antrian->no_antrian = $nomor_antrian;
        $antrian->nama = $request->nama;
        $antrian->alamat = $request->alamat;
        $antrian->no_telp = $request->no_telp;
        $antrian->status = 'menunggu';
        $antrian->save();

        $antrians = Customer::where('status', '=', 'menunggu')
        ->orderBy('no_antrian', 'asc')
        ->get();

        foreach ($antrians as $antrian) {
        if ($antrian->no_antrian > $nomor_antrian) {
            $antrian->no_antrian--;
            $antrian->save();
            }
        }
        // $antrian->update_status();
        return redirect('/customer')
                        ->with('success', 'Antrian berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update_status()
    {
        $this->status = 'selesai';
        $this->save();

        $antrians = Customer::where('status', '=', 'menunggu')->get();

        foreach ($antrians as $antrian) {
            $antrian->nomor_antrian--;
            $antrian->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customer')->with('success', 'Data Customer Berhasil Terhapus');
    }

    public function cetakantrian()
    {
        $title = 'Customer';
        $antrian = auth::user();
        $data = $antrian->service;

        $export = PDF::loadview('customer.cetak', ['data' => $data])->setPaper('A4', 'landscape');
        return $export->stream();;
        // return $export ->stream('customer.antrian.pdf', compact('data'));
    }
}
