<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
  protected $fillable = [
     'id_pembeli','nama_pembeli','alamat_pembeli','no_telpon','foto'
  ];

  public function kredits(){
    return $this->hasMany('App\Models\Kredit');
  }

}
