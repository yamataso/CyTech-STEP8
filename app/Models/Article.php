<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Article extends Model
{
    public function getHome() {
        // product_informationテーブルからデータを取得
        $product_information = DB::table('product_information')->get();

        return $product_information;
    }
}
