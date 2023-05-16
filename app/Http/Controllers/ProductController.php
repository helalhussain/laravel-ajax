<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(5);
        return view('welcome',compact('products'));
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'price'=>'required'
        ],
        [
            'name.required'=>'Name is require',
            'price.required'=>'Price is require'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            'status'=>'success',
        ]);

    }

    public function update(Request $request){
        $request->validate([
            'name'=>'required|unique:products,name,'.$request->up_id,
            'price'=>'required'
        ],
        [
            'name.required'=>'Name require',
            'price.required'=>'Price require'
        ]);

        Product::where('id',$request->up_id)->update([
            'name'=>$request->up_name,
            'price'=>$request->up_price

        ]);
        return response()->json([
            'status'=>'success',
        ]);
    }
}

