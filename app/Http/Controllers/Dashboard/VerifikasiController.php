<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class VerifikasiController extends Controller
{
    public function index()
    {
    	$title = 'Verikikasi Peserta';
        $data = User::orderBy('name','asc')->whereNull('is_verifikasi')->get();
    	return view('dashboard.verifikasi.index', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'id_pendaftaran'=>'required'
    	]);

    	$id = $request->id_pendaftaran;
    	$cek = User::where('id_registrasi', $id)->count();
    	if ($cek > 0) {
    		User::where('id_registrasi', $id)->update(['is_verifikasi' => 1]);
    		\Session::flash('sukses','ID Pendaftaran Berhasil di verifikasi');
    	} else {
    		\Session::flash('gagal','ID Pendaftaran gagal ditemukan');
    	}

    	return redirect()->back();
    }
}
