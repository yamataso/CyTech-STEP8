@extends('layouts.app')

@section('title', '投稿画面')

@section('content')
    <div class="container">
        <h1>商品情報登録画面</h1>
        <div class="row">
            <form class="form-group" action="{{ route('submit') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="name">商品名</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                    @if($errors->has('name'))
                    <p>{{ $errors->first('name') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="company">会社名を選択してください</label>
                   
                    <select class="form-control" name="company" id="company">
                        @foreach($companies as $company)
                        <tr>
                            <td>{{$companies->id}}</td>
                            <td>{{$companies->company_name}}</td>
                        </tr>
                        @endforeach
                    </select>
                 

                    @if($errors->has('company'))
                    <p>{{ $errors->first('company') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="price">価格</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price" value="{{old('price')}}">
                    @if($errors->has('price'))
                    <p>{{ $errors->first('price') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="stock">在庫数</label>
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" value="{{old('stock')}}">
                    @if($errors->has('stock'))
                    <p>{{ $errors->first('stock') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea class="form-control" id="comment" name="comment" placeholder="Comment">{{ old('comment') }}</textarea>
                    @if($errors->has('comment'))
                    <p>{{ $errors->first('comment') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="title">商品画像</label>
                    <input type="file" class="form-control" id="image" name="image" placeholder="Image" accept="image/*">
                </div>

                <button type="submit" class="btn">登録</button>
                <button type="submit" class="btn" onclick="location.href='http://localhost:8888/STEP7/public/home'"  >戻る</button>

            </form>
        </div>
    </div>
@endsection