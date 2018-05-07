<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public function kredit()
  {
    return $this->belongsTo('App\Models\Kredit');
  }

  public function cartItems()
  {
    return $this->hasMany('App\Models\CartItem');
  }
}
