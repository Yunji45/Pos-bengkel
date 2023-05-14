<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Antrian';
        $data = Customer::all();
        return view ('antrian.index',compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function selesaiAntrian(Request $request, $id)
    {
        $antrian = Customer::findOrFail($id); // mencari antrian berdasarkan id

        // Ubah status antrian menjadi "selesai"
        $antrian->status = 'selesai';
        $antrian->save();

        // Hapus antrian dari database
        $antrian->delete();

        // return $antrian;
        return redirect('/antrian/home')
                        ->with('success', 'Antrian selesai dan dihapus dari daftar antrian.');
    }

}
