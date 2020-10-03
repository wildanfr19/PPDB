<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Biodata;
use PDF;
use App\User;
use App\Models\Profile_sekolah;
class BiodataController extends Controller
{
    public function index()
    {
    	$title = 'Update Biodata';
    	$dt = Biodata::where('user_id', \Auth::user()->id)->first();
    	$cek = Biodata::where('user_id', \Auth::user()->id)->count();
    	return view('dashboard.biodata.index', compact('title','dt','cek'));
    }

    public function store(Request $request, $id)
    {
       $this->validate($request, [
          'no_hp'=> 'required',
          'tempat_lahir'=>'required',
          'tanggal_lahir'=> 'required',
          'alamat'=> 'required'

      ]);
         // $file = $request->file('ijazah');
         // if($file){
         //      $nama_file = $file->getClientOriginalName();
         //      $file->move('biodata_files',$nama_file);
         //      $data['ijazah'] = 'biodata_files/'.$nama_file;
         //   }
       $file = $request->file('ijazah');
       if ($file) {
        $file->move('biodata_files', $file->getClientOriginalName());
        $data['ijazah'] = 'biodata_files/'. $file->getClientOriginalName();
    }
       $file = $request->file('ktp');
       if ($file) {
        $file->move('biodata_files', $file->getClientOriginalName());
        $data['ktp'] = 'biodata_files/'. $file->getClientOriginalName();
    }


    $data['user_id'] = $id;
    $data['no_hp'] = $request->no_hp;
    $data['tempat_lahir'] = $request->tempat_lahir;
    $data['tanggal_lahir'] = $request->tanggal_lahir;
    $data['alamat'] = $request->alamat;
    $data['created_at'] = date('Y-m-d H:i:s');
    $data['updated_at'] = date('Y-m-d H:i:s');

    Biodata::insert($data);

    \Session::flash('sukses','Data berhasil ditambahkan');
    return redirect()->back();

}

public function update(Request $request, $id)
{
   $this->validate($request, [
      'no_hp'=> 'required',
      'tempat_lahir'=>'required',
      'tanggal_lahir'=> 'required',
      'alamat'=> 'required'

  ]);
   $file = $request->file('ijazah');
        if ($file) {
         $file->move('biodata_files', $file->getClientOriginalName());
         $data['ijazah'] = 'biodata_files/'. $file->getClientOriginalName();
     }
        $file = $request->file('ktp');
        if ($file) {
         $file->move('biodata_files', $file->getClientOriginalName());
         $data['ktp'] = 'biodata_files/'. $file->getClientOriginalName();
     }
        	// $data['user_id'] = $id;
 $data['no_hp'] = $request->no_hp;
 $data['tempat_lahir'] = $request->tempat_lahir;
 $data['tanggal_lahir'] = $request->tanggal_lahir;
 $data['alamat'] = $request->alamat;

        	// $data['created_at'] = date('Y-m-d H:i:s');
 $data['updated_at'] = date('Y-m-d H:i:s');

 Biodata::where('user_id', $id)->update($data);

 \Session::flash('sukses','Data berhasil diupdate');
 return redirect()->back();

}

public function cetak(){
  try {
      $dt = User::where('id', \Auth::user()->id)->with('biodata_r')->first();
      $sk = Profile_sekolah::first();
      $pdf = PDF::loadview('dashboard.biodata.pdf',compact('dt','sk'))->setPaper('a4', 'landscape');
      return $pdf->stream();

  } catch (\Exception $e) {
      \Session::flash('gagal',$e->getMessage().' ! '.$e->getLine());
  }

  return redirect()->back();
}
}
