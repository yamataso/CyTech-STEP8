<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = ['id', 'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public static function dec($productId)
    {
        // 在庫数を減算する
        $product = Product::find($productId);
        $product->stock -= 1;
        $product->save();

        // 減算後の在庫数を取得
        $updatedStock = $product->stock;

        // 在庫数が0以下の場合、エラーをスローする
        if ($updatedStock <= 0) {
            throw new \Exception('在庫が不足しています。');
        }

        // salesテーブルにレコードを追加する
        $sale = new Sale();
        $sale->product_id = $productId;
        $sale->save();
    }
}
