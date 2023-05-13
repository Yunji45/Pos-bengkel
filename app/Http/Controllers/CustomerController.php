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
        $data = Customer::all();
        $jumlah_antrian = Customer::where('status', 'menunggu')->count();
        return view ('customer.index', compact ('title','data','jumlah_antrian'));
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
        if ($last_antrian) {
            $last_number = substr($last_antrian->no_antrian, 3);
            $new_number = sprintf('%05d', intval($last_number) + 1);
        } else {
            $new_number = '00001';
        }

        return 'SRV-' . $new_number;

    }

    public function selesaiAntrian(Request $request, $id)
    {
        $antrian = Customer::findOrFail($id); // mencari antrian berdasarkan id

        // Ubah status antrian menjadi "selesai"
        $antrian->status = 'selesai';
        $antrian->save();

        // Hapus antrian dari database
        $antrian->delete();

        return $antrian;
        // return redirect('/menu')
        //                 ->with('success', 'Antrian selesai dan dihapus dari daftar antrian.');
    }

    public function cetakantrian()
    {
        $title = 'Customer';
        $data = Customer::all();

        $export = PDF::loadview('customer.cetak', ['data' => $data]);
        return $export ->download('customer.antrian.pdf', compact('data'));
    }
}
// $bendahara = User::with('userDetail')->where('role','Bendahara')->get();
// $export = PDF::loadview('backend.pengguna.bendahara.laporan', ['bendahara' => $bendahara]);
// return $export ->download('backend.pengguna.bendahara.index.pdf', compact('bendahara'));
