@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>商品情報詳細画面</h1>
                <div class="card">
                <div class="card-header">詳細情報</div>
                    <div class="card-body">
                        <table  class="table">
                            <tr>
                                <th>商品情報id</th>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>在庫数</th>
                                <th>コメント</th>
                            </tr>
                            <tr>
                                <td>{{optional($products)->id}}</td>
                                <td><img src="{{ asset('storage/'.optional($products)->img_path)}}" alt="" width="25%"></td>
                                <td>{{optional($products)->product_name}}</td>
                                <td>{{optional($products)->price}}</td>
                                <td>{{optional($products)->stock}}</td>
                                <td>{{optional($products)->comment}}</td>
                                <td><a href="{{url('edit', $products->id)}}" class="button">編集</a></td>
                            </tr>
                        </table>
                    </div>
                </div>
        </div>
    </div>
   <button type="submit" class="btn" onclick="location.href='http://localhost:8888/STEP7/public/index'"  >戻る</button>
</div>
@endsection
