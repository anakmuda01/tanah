<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
  protected $fillable = [
     'id_kredit','pembeli_id','total_harga','uang_muka','sisa_angsuran','lama_angsuran','jumlah_angsur','angsuran_perbulan','status'
  ];

  public function pembeli()
  {
    return $this->belongsTo('App\Models\Pembeli');
  }

  public function cart()
  {
    return $this->hasOne('App\Models\Cart');
  }

  public function kasir()
  {
    return $this->hasOne('App\Models\Kasir');
  }
}
