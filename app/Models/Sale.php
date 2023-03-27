<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Sale extends Model
{
    protected $fillable = [
        'id',
        'product_id',
    ];
    public function product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function getSale(){
        $sales = Sale::get();
        return $sales;
    }
}
