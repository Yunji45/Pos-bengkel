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
            return redirect('/customer')
                            ->with('error', 'Maaf, antrian sudah penuh.');
        }

        // Buat antrian baru
        $antrian = new Customer;
        $antrian ->user_id = auth::user()->id;
        $antrian->no_antrian = $this->generateantrian();
        $antrian->nama = $request->nama;
        $antrian->alamat = $request->alamat;
        $antrian->no_telp = $request->no_telp;
        $antrian->status = 'menunggu';
        $antrian->save();

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
    public function update(Request $request, $id)
    {
        $customer = Customer::find($id);
        $customer->nama = $request->nama;
        $customer->alamat = $request->alamat;
        $customer->no_telp = $request->no_telp;
        $customer->save();
        return redirect('/customer')->with('success', 'Data Customer Berhasil Terupdate');
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

    public function generateantrian()
    {
        // Mengambil nomor antrian terakhir
        $last_antrian = Customer::orderBy('id', 'desc')->first();

        // Menghasilkan nomor antrian baru dengan format AN-XXXXX
        if ($last_antrian ) {
            // $last_number = substr($last_antrian->no_antrian, 0, 1);
            // $new_number = sprintf('%05d', intval($last_number) + 1);
            $new_number = (int) substr($last_antrian->no_antrian, 1);
            $new_number +=1;
            $this->no_antrian = $last_antrian . $new_number;
        } else {
            // return redirect('/customer')->with('invalid', 'Data Antrian Gagal Di tambahkan');
            $new_number = '00001';
        }

        return 'SRV-' . $new_number;

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
