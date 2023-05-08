<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\Sale;
use App\Http\Requests\ProductRequest;
use DB;

class ProductController extends Controller
{
    public function index(Request $request) {
        
        $keyword = $request->input('keyword');
        $company_id = $request->input('company_id');
    
        $model_product = new Product();
        $products = $model_product->getProduct($keyword, $company_id);

        $model_company = new Company();
        $companies = $model_company->getCompany();

        return view('index',compact('products','companies','keyword','company_id'));
    }


    public function create()
    {
        //Company Model
        $model_company = new Company();
        $companies = $model_company->getCompany();
        return view('regist',compact('companies'));
    }


    public function store(ProductRequest $request)
    {
        
        try {
            DB::beginTransaction();
            $post = new Product();
            $post->registProduct($request);
            DB::commit();
            return back();
            }catch(\Exception $e){
                DB::rollback();
                return back();
            }
    }


    public function show($id)
    {
        $model_product = new Product();
        $products = $model_product->showProduct($id);
        return view('show',compact('products'));
    }


    public function edit($id)
    {
        $products = Product::with('sale')->find($id);
        $model_company = new Company();
        $companies = $model_company->getCompany();

        return view('edit',compact('products','companies'));
    }


    public function update(ProductRequest $request, $id)
    {
        try{
            DB::beginTransaction();
            $update = new Product();
            $update->updateProduct($request);
            DB::commit();
            return back();
        }catch(\Exception $e){
            DB::rollback();
            return back();
        }
    }


    public function destroy(Request $request,$id)
    {
        try{
            DB::beginTransaction();
            $deleteProduct = new Product();
            $deleteProduct->deleteProduct($id);
            DB::commit();
            return redirect()->route('index');
        }catch(\Exception $e){
            DB::rollback();
            return back();
        }
    }
}
