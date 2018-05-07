<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function tanahs()
  {
    return $this->belongsToMany('App\Models\Tanah');
  }
}
