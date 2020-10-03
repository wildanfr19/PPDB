<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';
    protected $fillable = ['user_id','no_hp','tempat_lahir','tanggal_lahir','alamat','ijazah','ktp'];


    // public function user()
    // {
    // 	return $this->belongsTo(User::class);
    // }
}
