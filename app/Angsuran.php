<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Angsuran extends Model
{
 protected $table = 'angsuran';

 public function pinjaman(){
    	return $this->belongsTo('App\Pinjaman');
    }

    public function anggota(){
    	return $this->belongsTo('App\Anggota');
    }
    public function kategori(){
    	return $this->belongsTo('App\Kategori');
    }
}
