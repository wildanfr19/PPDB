<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Carbon\Carbon;
class PesanController extends Controller
{
	public function index()
	{
		$title = 'My Pesan';
		if (\Auth::user()->role == 1) {
			$data = Pesan::get();
		} else {
			$data = Pesan::where('id', \Auth::user()->id)->get();
		}
		
		return view('dashboard.pesan.index', compact('title','data')); 
	}

	public function detail($id)
	{
		$title = 'Detail Pesan';
		$data = Pesan::where('id', $id)->first();
		if (\Auth::user()->role == 1) {
			Pesan::where('id', $id)->update([
				'status' => 1
			]);
		}
		return view('dashboard.pesan.detail', compact('title','data'));
	}
    public function add()
    {
    	$title = 'Menambah Pesan';

    	return view('dashboard.pesan.add', compact('title'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'judul' => 'required',
    		'keterangan'=> 'required'
    	]);
    	$data['judul'] = $request->judul;
    	$data['keterangan'] = $request->keterangan;
    	$data['user_id'] = \Auth::user()->id;
    	$data['created_at'] = Carbon::now();
    	$data['updated_at'] = Carbon::now();

    	Pesan::insert($data);

    	\Session::flash('sukses','Berhasil Mengirim Pesan');
    	return redirect()->back();

    }
}
