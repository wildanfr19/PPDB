<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profile_sekolah;
class ProfileController extends Controller
{
    public function index()
    {
    	$title = 'Update Profil Sekolah';
    	$dt = Profile_sekolah::first();
    	return view('dashboard.profile.index', compact('title','dt'));
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'nama'=>'required',
    		'alamat'=>'required',
    		'no_telp'=>'required'
    	]);

    	$dt = Profile_sekolah::first();
    	$dt->nama = $request->nama;
    	$dt->alamat = $request->alamat;
    	$dt->no_telp = $request->no_telp;

    	$file = $request->file('photo');
    	if ($file) {
    		$nama_gambar = $file->getClientOriginalName();
    		$file->move('sekolah_images', $nama_gambar);
    		$dt->photo = 'sekolah_images/'. $nama_gambar;
    	}
    	\Session::flash('sukses','Berhasil Update Profile Sekolah');

    	$dt->save();

    	return redirect()->back();
    }
}
