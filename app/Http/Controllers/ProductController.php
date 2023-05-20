<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            // $reslut = Product::where('title','=',$request->search);
            $data = Product::where('name','LIKE',$request->name.'%')->get();
            $output = '';
            if(count($data) > 0){
                $output ='<ul class="list-group" style="display:block;position:relative;">';
                foreach($data as $row){
                   $output .='<li id="set" class="list-group-item" style="cursor:pointer">'.$row->name.'</li>';
                }
                $output .= '</ul>';
            }else{
                $output .= '<li class="list-form-group">No product found</li>';
            }
            return $output;
        }
        // $products = Product::all();
         return view('welcome');


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

