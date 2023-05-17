<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  public function __construct()
    //  {
    //      $this->middleware('guest');
    //  }
 

    public function home()
    {
        return view('dashboard');
    }
    public function index()
    {
        $title = 'User';
        $user = User:: orderBy('id', 'asc')->get();
        return view('user.index', compact('title', 'user'));
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

        $title = 'User';
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required',

        ],
        [
            'name' => 'nama tidak boleh kosong',
            'email' => 'email tidak boleh kosong',
            'role' => 'role wajib di isi',
            'password' => 'password wajib ada',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash :: make($request->password);
        $user->role = $request->role;
        $user->save ();
        // return redirect('/user',compact('user',$user))->with('success', 'Data User Berhasil Tersimpan');
        return redirect()->to('/user')->with('success', 'Data Berhasil Di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',

        ],
        [
            'name' => 'nama tidak boleh kosong',
            'email' => 'email tidak boleh kosong',
            'role' => 'role wajib di isi',
        ]);

       $user = User::find($id);
       $user->name = $request->name;
       $user->email = $request->email;
       $user->role = $request->role;
       $user->save();
       return redirect('/user')->with('success', 'Data user berhasil terupdate');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $user = User::find($id);
       if ($user->photo != 'user.png') {
        File::delete('photo/' . $user->photo);
       }
       $user->delete();
        return redirect('/user')->with('success', 'Data User Berhasil Terhapus');
    }



    public function profile()
    {
       $title = 'My Profile';
       $user = User::where('id',Auth :: user()->id)->first();
        return view('user.profile', compact('title','user'));
    }

    public function update_profile(Request $request)
    {
       $request->validate([
           'photo' => 'mimes : png,jpeg,jpg,svg'
       ]);

       $id_user = Auth::user()->id;
       $user = User::find($id_user);

       if ($request->hasFile('photo')) {
           $photo = $request->file('photo');
           $ubah_nama_photo = time() . '-' . $photo->getClientOriginalName();
           $photo->move('photo',$ubah_nama_photo);

           if ($user->photo != 'user.png') {
            File::delete('photo/' . $user->photo);
           }

           $user->photo = $ubah_nama_photo;
           $user->save();
       }

       $user->name = $request->name == '' ? Auth::user()->name : $request->name;
       $user->email = $request->email == '' ? Auth::user()->email : $request->email;
       $user->save();
       return redirect('/profile')->with('success', 'profil berhasil terupdate');
       
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'password' => 'required|min:3|confirmed'
        ],[
            'password.min' => 'password minimal 3 karakter',
            'password.confirmed' => 'konfirmasi password tidak sama'
        ]);
        $id_user = Auth::user()->id;
        $user = User::find($id_user);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/profile')->with('success', 'Password Berhasil Terupdate');

    }
}