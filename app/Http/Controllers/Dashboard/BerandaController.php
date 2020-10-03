<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\User;
class BerandaController extends Controller
{
    public function index()
    {
    	$title = 'Halaman Dashboard';

    	$user_id = \Auth::user()->id;
    	$cek = Biodata::where('user_id', $user_id)->count();
    	if ($cek < 1) {
    		$pesan = 'Harap Melengkapi Biodata terlebih dahulu';
    	} else {
    		$pesan = 'Biodata Anda Sudah dilengkapi... Terima Kasih';
    	}

        $cek_verifikasi = User::find($user_id);
        if ($cek_verifikasi->is_verifikasi == 1) {
            $status = 'Status sudah di verifikasi';
        } else {
            $status = 'Belom di verifikasi';   
        }

        $cek_lulus = User::find($user_id);
        if ($cek_lulus->islulus == 1) {
            $pesan_lulus = 'Selamat anda telah lulus';
        } else {
            $pesan_lulus = 'Mohon maaf status anda sedang dalam pertimbangan';
        }

    	return view('dashboard.beranda.index', compact('title','pesan','cek','status','pesan_lulus'));
    }
}
