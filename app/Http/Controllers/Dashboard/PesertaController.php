<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Biodata;
use Carbon\Carbon;
class PesertaController extends Controller
{
    public function index(){
    	$title = 'Data Peserta';
    	$data = User::withCount('biodata_r')->whereNull('role')->orderBy('name','ASC')->get();
    	return view('dashboard.peserta.index', compact('title','data'));
    }
    public function diverifikasi()
    {
    	$title = 'Data peserta yang sudah di verifikasi';
    	 $data = User::withCount('biodata_r')->where('is_verifikasi', 1)->whereNull('role')->orderBy('name','asc')->get();
    	 return view('dashboard.peserta.index',compact('title','data'));
    }
    public function belom_verifikasi()
    {
    	$title = 'Data peserta yang belom di verifikasi';
    	 $data = User::withCount('biodata_r')->whereNull('is_verifikasi')->orderBy('name','asc')->get();
    	 return view('dashboard.peserta.index',compact('title','data'));
    }

    public function edit($id)
    {
       $title = 'Data Peserta';
       $dt = User::with('biodata_r')->find($id);
       return view('dashboard.peserta.edit', compact('title','dt'));
    }

    public function update(Request $request, $id)
    {
       try {
           $user['email'] = $request->email;
           $user['name'] = $request->name;
           $user['nisn'] = $request->nisn;

           $file = $request->file('foto');
           if ($file) {
               $nama_gambar = $file->getClientOriginalName();
               $file->move('uploads', $nama_gambar);
               $user['foto'] = 'uploads/' . $nama_gambar;

           }

           User::where('id', $id)->update($user);

           $biodata['no_hp'] = $request->no_hp;
           $biodata['alamat'] = $request->alamat;
           $biodata['tempat_lahir'] = $request->tempat_lahir;
           $biodata['tanggal_lahir'] = $request->tanggal_lahir;
           $biodata['updated_at'] = Carbon::now();

           $ijazah = $request->file('ijazah');
           if ($ijazah) {
            $ijazah->move('biodata_files', $ijazah->getClientOriginalName());
            $biodata['ijazah'] = 'biodata_files/'. $ijazah->getClientOriginalName();
           }
           $ktp = $request->file('ktp');
           if ($ktp) {
            $ktp->move('biodata_files', $ktp->getClientOriginalName());
            $biodata['ktp'] = 'biodata_files/'. $ktp->getClientOriginalName();
           }
           Biodata::where('id', $id)->update($biodata);

           \Session::flash('sukses','Berhasil Mengupdate Data');

       } catch (Exception $e) {
           \Session::flash('gagal', $e->getMessage());
       }
       return redirect()->back();
    }

    public function delete($id)
    {
        try {
            User::where('id',$id)->delete();
             \Session::flash('sukses','Berhasil Dihapus Data');
        } catch (Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }

    public function luluskan($id)
    {
      try {
        User::where('id',$id)->update([
            'islulus' => 1
        ]);
        \Session::flash('sukses','Berhasil Meluluskan');
      } catch (Exception $e) {
        \Session::flash('gagal', $e->getMessage());
      }
      return redirect()->back();
    }


}
