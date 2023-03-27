@extends('layouts.app')

@section('title', '編集画面')

@section('content')
    <div class="container">
        <h1>商品情報編集画面</h1>
        <div class="row">
                <form class="form-group" action="{{ route('index.update',$products->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="id">商品情報ID</label>
                    <td>{{optional($products)->id}}</td>
                </div>

                <div class="form-group">
                    <label for="product_name">商品名</label>
                    <input value="{{old('product_name',optional($products)->product_name)}}"type="text" class="form-control" id="product_name" name="product_name">
                    @if($errors->has('product_name'))
                    <p>{{ $errors->first('product_name') }}</p>
                    @endif
                </div>
 

                <div class="form-group">
                    <label for="company">メーカー</label>
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
                    <input value="{{old('price',optional($products)->price)}}" type="text" class="form-control" id="price" name="price"  >
                    @if($errors->has('price'))
                    <p>{{ $errors->first('price') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="stock">在庫数</label>
                    <input value="{{old('stock',optional($products)->stock)}}" type="text" class="form-control" id="stock" name="stock" >
                    @if($errors->has('stock'))
                    <p>{{ $errors->first('stock') }}</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="comment">コメント</label>
                    <textarea value="{{old('comment')}}" class="form-control" id="comment" name="comment" >{{optional($products)->comment}}</textarea>
                </div>

                <div class="form-group">
                    <label for="img_path">商品画像</label>
                    <input type="file" class="form-control" id="img_path" name="img_path" placeholder="img_path" >
                </div>
                <button type="submit" class="btn">更新</button>
            </form>

            </div>
            <a href="{{url('show', optional($products)->id)}}" class="button">戻る</a>
    </div>
@endsection