@extends('layouts.app')
@section('content')
<body  id="product-table">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <h1>商品一覧画面表示</h1>
            <div class="card">
                <form class="search-form" method="GET">
                    <div class="card-header">検索機能</div>
                    <div class="card-body">
                        <div class="form-group">
                            <input type="text" name="keyword" value="{{ $keyword }}">
                            <select name="company_id" id="company">
                                @foreach($companies as $company)
                                    <option value="{{$company->id}}">{{$company->company_name}}</option>
                                @endforeach
                            </select>
                            <input type="number" name="min_price" placeholder="最低価格" value="{{ $min_price }}">
                            <input type="number" name="max_price" placeholder="最高価格" value="{{ $max_price }}">
                            <input type="number" name="min_stock" placeholder="最低在庫数" value="{{ $min_stock }}">
                            <input type="number" name="max_stock" placeholder="最高在庫数" value="{{ $max_stock }}">
                            <input type="submit" id="search-button" value="検索">
                            <input type="button" onclick="location.href='http://localhost:8888/STEP7/public/create'" value="新規登録">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" >
            <div class="card-header">商品情報</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    <a href="{{ route('index', ['sort' => 'id', 'order' => $sort === 'id' && $order === 'asc' ? 'desc' : 'asc']) }}">
                                        id
                                        @if($sort === 'id')
                                            @if($order === 'asc')
                                                ▲
                                            @else
                                                ▼
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th>商品画像</th>
                                <th>
                                    <a href="{{ route('index', ['sort' => 'product_name', 'order' => $sort === 'product_name' && $order === 'asc' ? 'desc' : 'asc']) }}">
                                        商品名
                                        @if($sort === 'product_name')
                                            @if($order === 'asc')
                                                ▲
                                            @else
                                                ▼
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('index', ['sort' => 'price', 'order' => $sort === 'price' && $order === 'asc' ? 'desc' : 'asc']) }}">
                                        価格
                                        @if($sort === 'price')
                                            @if($order === 'asc')
                                                ▲
                                            @else
                                                ▼
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('index', ['sort' => 'stock', 'order' => $sort === 'stock' && $order === 'asc' ? 'desc' : 'asc']) }}">
                                        在庫数
                                        @if($sort === 'stock')
                                            @if($order === 'asc')
                                                ▲
                                            @else
                                                ▼
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th>
                                    <a href="{{ route('index', ['sort' => 'company_id', 'order' => $sort === 'company_id' && $order === 'asc' ? 'desc' : 'asc']) }}">
                                        メーカー名
                                        @if($sort === 'company_id')
                                            @if($order === 'asc')
                                                ▲
                                            @else
                                                ▼
                                            @endif
                                        @endif
                                    </a>
                                </th>
                                <th>詳細ページ</th>
                                <th>削除ボタン</th>
                            </tr>
                        </thead>
                    <tbody id= product-body>
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
                                <form class="delete-form">
                                    <input data-product-id="{{$product->id}}" type="submit" class="btn-danger" value="削除">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });

            $(document).on("submit", ".search-form", function (e) {
            e.preventDefault(); 

            var formData = $('.search-form').serialize();
            var url = $('.search-form').attr('action');

            $.ajax({
                url: url, 
                type: "GET",
                data: formData,
                success: function (data) {
                // 成功時の処理
                console.log("成功しました。");
                $('#product-table').html(data);  // テーブルのtbody要素を更新
                },
                error: function (xhr, status, error) {
                    // エラー時の処理
                    console.log('検索エラーです');
                },
            });
        });

    // 削除フォームの送信イベントを設定
        $(document).on("submit", ".delete-form", function (e) {
            e.preventDefault(); // デフォルトのフォーム送信をキャンセル

            var deleteConfirm = confirm('削除してよろしいでしょうか？');
            if (deleteConfirm == true) {
                var clickForm = $(this);
                var productId = clickForm.find('input[type="submit"]').attr('data-product-id');

                $.ajax({
                    url: '{{ route("destroy", ["id" => ":id"]) }}'.replace(':id', productId),
                    type: "POST",
                    dataType: 'json',
                    data: {'id': productId},
                    success: function (response) {
                        // 成功時の処理
                        console.log('成功です');
                        clickForm.parents('tr').remove();
                    },
                    error: function (xhr, status, error) {
                        // エラー時の処理
                        console.log('エラーです');
                    }
                });
            }
        });
    });
</script>
</body>
@endsection

