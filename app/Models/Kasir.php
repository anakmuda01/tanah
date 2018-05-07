<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
  protected $fillable = [
      'pembeli_id','kredit_id','tanggal_bayar','sisa_angsuran','sisa_cicilan','angsuran_ke'
  ];

  public function pembeli()
  {
    return $this->belongsTo('App\Models\Pembeli');
  }

  public function kredit()
  {
    return $this->belongsTo('App\Models\Kredit');
  }
}
