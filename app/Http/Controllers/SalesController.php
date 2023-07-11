<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Http\Controllers\SalesController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function createSale(Request $request)
    {
        try {
            DB::beginTransaction();

            $productId = $request->input('product_id');

            Sale::dec($productId);

            DB::commit();
            return response()->json(['message' => '購入処理が完了しました。'], 200);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
