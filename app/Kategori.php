<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori_pinjaman';

    public function angsuran(){
    	return $this->belongsTo('App\Angsuran');
    }
}
