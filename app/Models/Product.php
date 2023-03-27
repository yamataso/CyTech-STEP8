<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
    public function sale(){
        return $this->hasMany('App\Models\Sale');
    }

    protected $fillable = [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
        'created_at',
        'updated_at',
    ];
    public function getProduct() {
        // productsテーブルからデータを取得
        $products = Product::get();
        return $products;
    }
}
