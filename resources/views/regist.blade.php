@extends('layouts.app')

@section('title', '投稿画面')

@section('content')
    <div class="container">
        <h1>商品情報登録画面</h1>
        <div class="row">
            <form class="form-group" action="{{ route('index.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="product_name">商品名</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Name">
                    @if($errors->has('product_name'))
                    <p>{{ $errors->first('product_name') }}</p>
                    @endif
                </div>
                <div class="form-group">
                    <label for="company">会社名を選択してください</label>
                
                    <select class="form-control" name="company_id" id="company">
                    @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->company_name}}</option>
                    @endforeach
                    </select>
                
                    @if($errors->has('company_id'))
                    <p>{{ $errors->first('company_id') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price"  >
                    @if($errors->has('price'))
                    <p>{{ $errors->first('price') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="stock">在庫数</label>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
                    @if($errors->has('stock'))
                    <p>{{ $errors->first('stock') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea class="form-control" id="comment" name="comment" placeholder="Comment"></textarea>
                </div>

                <div class="form-group">
                    <label for="title">商品画像</label>
                    <input type="file" class="form-control" id="img_path" name="img_path" placeholder="Image" >
                </div>

                <button type="submit" class="btn">登録</button>
            </form>
        </div>
        <button type="button" class="btn" onclick="location.href='http://localhost:8888/STEP7/public/index'"  >戻る</button>
    </div>
@endsection