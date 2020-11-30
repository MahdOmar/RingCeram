<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function achat()
    {
    return $this->hasMany('App\Models\Achat','product_id','id');
    }
}
