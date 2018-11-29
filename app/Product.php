<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['sku', 'name', 'description', 'image', 'id_category', 'stock', 'price'];
    
}

