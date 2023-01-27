<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function showHome(){
        //インスタンス生成
        $model = new Article();
        $products = $model->getHome();
        return view('home',compact('products'));
    }

    // public function registSubmit(ArticleRequest $request){
    //     //トランザクション開始
    //     DB::beginTransaction();

    //     try {
    //         // 登録処理呼び出し
    //         $model = new Article();
    //         $model->registArticle($request);
    //         DB::commit();
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return back();
    //     }
    //     // 処理が完了したらregistにリダイレクト
    //     return redirect(route('regist'));
    // }
    // public function store(Requset $request){
    //     $model = new Article();

    //     $image_path = $request->file('image')->store('public');

    //     $model->image = basename($image_path);

    //     $model->save();

    //     return view('regist');
    // }
    // public function index(){
    //     $model = Article::all();
    //     return view('regist', $model);
    // }
}
