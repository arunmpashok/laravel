<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
class Order extends Model
{
    protected $collection='orders'; 

    public function products(){
        return $this->belongsTo(Product::class,'product');
    }
}
