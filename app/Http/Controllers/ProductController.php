<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Company;
use App\Models\Sale;


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

            $post = new Product();
            $post-> product_name = $request->product_name;
            $post-> company_id = $request->company_id;
            $post-> price = $request->price;
            $post-> stock = $request->stock;
            $post-> comment = $request->comment;
            if(request('img_path')){
                $name = request()->file('img_path')->getClientOriginalName();
                $file = request()->file('img_path')->move('storage',$name);
                $post->img_path=$name;
                }

                $this->validate($request,[
                    'product_name' =>  'required',
                    'company_id' => 'required',
                    'price' => 'required',
                    'stock' => 'required',
                    ],
                        [
                            'product_name.required' => '商品名は必須項目です。',
                            'company_id.required' => '会社名は必須項目です。',
                            'price.required' => '価格は必須項目です。',
                            'stock.required' => '在庫数は必須項目です。',
            ]);    
                $post->save();

        return back();
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
        $products = Product::with('sale')->find($id);
        $products->product_name = $request->product_name;
        $products->company_id = $request->company_id;
        $products->price = $request->price;
        $products->stock = $request->stock;
        $products->comment = $request->comment;

        if(request('img_path')){
            $name = request()->file('img_path')->getClientOriginalName();
            $file = request()->file('img_path')->move('storage',$name);
            $products->img_path=$name;
        }
        $this->validate($request,[
            'product_name' =>  'required',
            'company_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            ],
                [
                    'product_name.required' => '商品名は必須項目です。',
                    'company_id.required' => '会社名は必須項目です。',
                    'price.required' => '価格は必須項目です。',
                    'stock.required' => '在庫数は必須項目です。',
    ]);    

        $products->save();
        return redirect()->route('index.edit',$products->id);
    }


    public function destroy(Request $request,$id)
    {
        $products = Product::find($id);
        $products->delete();
        return redirect()->route('index');
    }
}
