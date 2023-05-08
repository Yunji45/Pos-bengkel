<?php

namespace App\Http\Controllers;

use App\Akun;
use Illuminate\Http\Request;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akun=\App\Akun::All();
        return view('akun.index',['akun'=>$akun]); //Array
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('akun.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // fungsi
    {
        //untuk menyimpan data
        $tambah_akun=new \App\Akun;
        $tambah_akun->no_akun = $request->addnoakun;
        $tambah_akun->nm_akun = $request->addnmakun;
        $tambah_akun->save(); // method
        return redirect('/akun'); // prosedur
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function show(Akun $akun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akun_edit=\App\Akun::findOrFail($id);
        return view('akun.edit',['akun'=>$akun_edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $update_akun = \App\akun::findOrFail($id);
        $update_akun->no_akun=$request->addnoakun;
        $update_akun->nm_akun=$request->addnmakun;
        $update_akun->save();
        return redirect()->route( 'akun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Akun  $akun
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_akun)
    {
        $akun=\App\Akun::findOrFail($no_akun);
        $akun->delete();
        return redirect()->route('akun.index');
    }
}
