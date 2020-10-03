<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';
    protected $fillable = ['judul','keterangan','user_id'];

    public function users_r()
    {
    	return $this->belongsTo('App\User','user_id');
    }
}
