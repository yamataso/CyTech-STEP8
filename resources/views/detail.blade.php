@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>商品情報詳細画面</h1>
                <div class="card">
                <div class="card-header">詳細情報</div>
                    <div class="card-body">
                        <table  class="table">
                            <hr>
                                <div class="row">
                                    <div class="card-body">商品情報ID</div>
                                    <div class="card-body">商品情報IDデータ</div>
                                    </div>
                            <hr>
                                <div class="row">
                                    <div class="card-body">商品画像</div>
                                    <div class="card-body">商品画像データ</div>
                                </div>
                            <hr>
                            <div class="row">
                            <div class="card-body">商品名</div>
                            <div class="card-body">商品名データ</div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="card-body">メーカー</div>
                            <div class="card-body">メーカーデータ</div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="card-body">価格</div>
                            <div class="card-body">価格データ</div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="card-body">在庫数</div>
                            <div class="card-body">在庫数データ</div>
                            </div>
                            <hr>
                            <div class="row">
                            <div class="card-body">コメント</div>
                            <div class="card-body">コメントデータ</div>
                            </div>
                            <hr>
                        </table>
                    </div>
                    
                </div>
        </div>
    </div>

   <button>編集</button>
   <button>戻る</button>
</div>
@endsection
