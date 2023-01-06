@extends('layouts.app')

@section('title', '投稿画面')

@section('content')
    <div class="container">
        <h1>商品情報登録画面</h1>
        <div class="row">
            <form class="form-group" action="#" method="post">
                @csrf

                <div class="form-group">
                    <label for="title">商品名</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                </div>

                <div class="form-group">
                    <label for="title">メーカー</label>
                    <input type="text" class="form-control" id="maker" name="maker" placeholder="Maker">
                </div>

                <div class="form-group">
                    <label for="title">価格</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                </div>

                <div class="form-group">
                    <label for="url">在庫数</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Quantity">
                </div>

                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea class="form-control" id="comment" name="comment" placeholder="Comment"></textarea>
                </div>

                <div class="form-group">
                    <label for="title">商品画像</label>
                    <input type="text" class="form-control" id="image" name="image" placeholder="Image">
                </div>

                <button type="submit" class="btn">登録</button>
                <button type="submit" class="btn">戻る</button>

            </form>
        </div>
    </div>
@endsection