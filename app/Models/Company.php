<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{   
    public function Product(){
        return $this->hasMany('App\Models\Product');
    }
    public function getCompany(){
         // companiesテーブルからデータを取得
        $companies = DB::table('companies')->get();
        return $companies;
    }
}

