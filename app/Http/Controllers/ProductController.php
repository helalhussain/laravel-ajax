<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
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
}

