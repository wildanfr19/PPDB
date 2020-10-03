<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class Ppdb_controller extends Controller
{
    public function index()
    {
    	$title = 'PPDB Online';
    	return view('ppdb.index', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required',
    		'nisn' => 'required',
    		'email' => 'required'
    	]);

    	$data['name'] = $request->name;
    	$data['nisn'] = $request->nisn;
    	$data['email'] = $request->email;
    	$data['id_registrasi'] = "REG-". date('YmdHis');
    	$data['password'] = bcrypt('123456');

    	// cek foto

    	$file = $request->file('foto');
    	if ($file) {
    		$file->move('uploads', $file->getClientOriginalName());
    		$data['foto'] = 'uploads/'. $file->getClientOriginalName();
    	}

    	User::insert($data);

    	\Session::flash('berhasil','Mendaftarkan');		

    	return redirect()->back();
    }
}
