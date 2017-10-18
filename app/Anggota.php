<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    public function simpanan(){
    	return $this->belongsTo('App\Simpanan');
    }
    public function angsuran(){
    	return $this->belongsTo('App\Angsuran');
    }

    public function pinjaman(){
    	return $this->belongsTo('App\Pinjaman');
    }
}
