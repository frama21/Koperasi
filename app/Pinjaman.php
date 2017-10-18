<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman';

    public function anggota(){
    	return $this->belongsTo('App\Anggota');
    }

    public function angsuran(){
    	return $this->belongsTo('App\Angsuran');
    }
}
