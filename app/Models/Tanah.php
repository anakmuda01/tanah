<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tanah extends Model
{
  protected $fillable = [
    'no_kavling','slug_kavling','panjang','lebar','harga_kavling','status','keterangan'
  ];

  function tags()
  {
    return $this->belongsToMany('App\Models\Tag');
  }

  public function cartItem(){
    return $this->hasOne('App\Models\CartItem');
  }
}
