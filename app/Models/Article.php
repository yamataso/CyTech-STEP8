<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Article extends Model
{
    public function getHome() {
        // productsテーブルからデータを取得
        $products = DB::table('products')->get();
        return $products;
    }
}

