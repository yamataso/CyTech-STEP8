<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\Sale;
use DB;

class ProductController extends Controller
{
    public function index(Request $request){   
        
        $keyword = $request->input('keyword');
        $company_id = $request->input('company_id');

        $product = Product::query();

        if(!empty($keyword)){
            $product->where('product_name','LIKE',"%{$keyword}%")
            ->where('company_id',$company_id)
            ->get();
        }elseif(!empty($company_id)){
            $product->where('company_id',$company_id)
            ->get();
        }

        $products = $product->get(); 


        $model_company = new Company();
        $companies = $model_company->getCompany();

        return view('index',compact('products','companies','keyword'));
    }


    public function create()
    {
        //Company Model
        $model_company = new Company();
        $companies = $model_company->getCompany();
        return view('regist',compact('companies'));
    }


    public function store(Request $request)
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
        $products = Product::with('sale')->find($id);
        return view('show',compact('products'));
    }


    public function edit($id)
    {
        $products = Product::with('sale')->find($id);
        $model_company = new Company();
        $companies = $model_company->getCompany();

        return view('edit',compact('products','companies'));
    }


    public function update(Request $request, $id)
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
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('index');
    }
}
