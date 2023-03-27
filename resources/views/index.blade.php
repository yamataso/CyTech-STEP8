@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>商品一覧画面表示</h1>
            
            <div class="card">
                <form  method="GET">
                    <div class="card-header">検索機能</div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" name="keyword" value="{{ $keyword }}">
                                <select name="company_id" id="company">
                                @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->company_name}}</option>
                                @endforeach
                                </select>
                                <input type="submit" value="検索">
                            </div>
                    </div>
                </form>
            </div>
        
            <div class="card">
                <div class="card-header">商品情報</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>商品画像</th>
                                <th>商品名</th>
                                <th>価格</th>
                                <th>在庫数</th>
                                <th>メーカー名</th>
                                <th>詳細ページ</th>
                                <th>削除ボタン</th>
                            </tr>

                        <div>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td><img src="{{ asset('storage/'.$product->img_path)}}" alt="" width="100"></td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>{{$product->company->company_name}}</td>
                                    <td><a href="{{url('show', $product->id)}}" class="button">詳細</a></td>
                                    <td>
                                        <form action="{{route('index.destroy' ,$product->id)}}" method="POST" onclick='return confirm("削除しますか？")'>
                                            @csrf
                                            <button type="submit" class="button">削除</button>
                                        </form>
                                    </td>
                                </tr>
                                </div>
                                @endforeach
                            <div>
                            </div>
                        </thead>
                    </div>
                    </table>
            </div>
        </div>
        
        <input type="button" onclick="location.href='http://localhost:8888/STEP7/public/create'" value="新規登録">
    </div>
</div>
@endsection
