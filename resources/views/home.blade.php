@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>商品一覧画面表示</h1>
            
            <div class="card">
                <div class="card-header">検索機能</div>
                    <div class="card-body">
                    <div>商品名</div>
                    <input type="text">
                    <div>メーカー名</div>
                    <input type="text">
                    <input type="button" onclick="location.href='./'" value="検索">
                </div>
            </div>
        
            <div class="card">
                <div class="card-header">商品情報</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>会社のid</th>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>在庫数</th>
                                <th>メーカー名</th>
                                <th>詳細ページ</th>
                            </tr>
                        <div>
                            
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>{{$product->img_path}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->company->company_name}}</td>
                                    <td><img src="{{\Storage::url($product->img_path)}}" alt=""></td>
                                </tr>
                                <div class="form-row">
                                    </div>
                                </div>
                                @endforeach
                            <div>
                            <input type="button" value="詳細表示">
                            </div>
                        </thead>
                    </div>
                    
                    </table>
            </div>
        </div>
        
        <input type="button" onclick="location.href='http://localhost:8888/STEP7/public/post/create'" value="新規登録">
        <input type="button" value="削除">
    </div>
</div>
@endsection
