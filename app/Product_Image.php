<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_Image extends Model
{
  public function users()
  {
    return $this->belongsTo('App/Product');
  }

}
