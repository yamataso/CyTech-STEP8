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
    public function getProduct() {
        $products = Product::get();
    }
    //詳細ページid取得
    public function showProduct($id){
        $products = Product::find($id);
        return $products;
    }
    //登録
    public function registProduct($data){
        DB::table('products')->insert([
            'product_name' => $data->product_name,
            'company_id' => $data->company_id,
            'price' => $data->price,
            'stock' => $data->stock,
            'comment' => $data->comment,
            'img_path' => $data->file('img_path')->getClientOriginalName()
        ]);
    }
    //更新
    public function updateProduct($data){
        return $this->where([
            'id'=> $data['id']
            ])->update([
                'product_name' => $data->product_name,
                'company_id' => $data->company_id,
                'price' => $data->price,
                'stock' => $data->stock,
                'comment' => $data->comment,
                'img_path' => $data->file('img_path')->getClientOriginalName()
            ]);
    }
    //削除
    public function deleteProduct($id){
            $products = Product::find($id);
            $products->delete();
    }
}
