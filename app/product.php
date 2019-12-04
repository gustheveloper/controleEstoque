<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
  public function user()
  {
    return $this->belongsTo('App\User');
  }

}
