<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
    public function getHome() {
        // productsテーブルからデータを取得
        $products = Product::get();
        return $products;
    }
}
