<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;


class ArticleController extends Controller
{
    public function showHome(){
        //インスタンス生成
        $model = new Article();
        $product_information = $model->getHome();
        return view('home',compact('product_information'));
    }
}
