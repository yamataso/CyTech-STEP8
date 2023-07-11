<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }
    public function sale(){
        return $this->hasMany('App\Models\Sale');
    }

    protected $fillable = [
        'company_id',
        'product_name',
        'price',
        'stock',
        'comment',
        'img_path',
        'created_at',
        'updated_at',
    ];
    //取得
    public function getProduct($keyword, $company_id, $min_price, $max_price, $min_stock, $max_stock, $sort, $order)
{
    $product = Product::query();

    if (!empty($keyword)) {
        $product->where('product_name', 'LIKE', "%{$keyword}%");
    }

    if (!empty($company_id)) {
        $product->where('company_id', $company_id);
    }

    if (!empty($min_price)) {
        $product->where('price', '>=', $min_price);
    }

    if (!empty($max_price)) {
        $product->where('price', '<=', $max_price);
    }

    if (!empty($min_stock)) {
        $product->where('stock', '>=', $min_stock);
    }

    if (!empty($max_stock)) {
        $product->where('stock', '<=', $max_stock);
    }

    $products = $product->orderBy($sort, $order)->get();
    return $products;
}

    
    
    //詳細ページid取得
    public function showProduct($id){
        $products = Product::find($id);
        return $products;
    }
    //編集ページid取得
    public function editProduct($id){
        $products = Product::find($id);
        return $products;
    }
    // 登録
public function registProduct($data)
{
    DB::table('products')->insert([
        'product_name' => $data['product_name'],
        'company_id' => $data['company_id'],
        'price' => $data['price'],
        'stock' => $data['stock'],
        'comment' => $data['comment'],
        'img_path' => $data->file('img_path')->getClientOriginalName()
    ]);
}

// 更新
public function updateProduct($data)
{
    return $this->where([
        'id' => $data['id']
    ])->update([
        'product_name' => $data['product_name'],
        'company_id' => $data['company_id'],
        'price' => $data['price'],
        'stock' => $data['stock'],
        'comment' => $data['comment'],
        'img_path' => $data->file('img_path')->getClientOriginalName()
    ]);
}


    //削除
    public function deleteProduct($id){
        $products = Product::findOrFail($id);
        $products->delete();
    }
}
