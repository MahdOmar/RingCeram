<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
     
       $products = Product::orderBy('Designation', 'ASC')->get();;
           
             return view('products.index',['products' => $products]);
         }
     
         
         public function create(){
             return view('products.create');
         }
     
     
         public function store(){
     
             $product = new Product();
     
             $product->Designation = request('name');
             $product->Type = request('type');
             $product->meter = request('meter');
             $product->Quantity = request('Quantity');
             $product->Price_A = request('price_a');
             $product->Price_V = request('price_v');
             $product->save();
          
     
             return redirect('/products');
         }

         public function showData($id){
            $product = Product::find($id);
            return view('products.update',['product' => $product]);
         }

         public function update($id){

             $product = Product::findOrfail($id);
             
             $product->Designation = request('name');
             $product->Type = request('type');
             $product->meter = request('meter');
             $product->Quantity =request('Quantity');
             $product->Price_A = request('price_a');
             $product->Price_V = request('price_v');
             $product->save();
             return redirect('/products');

         }
     
     
         public function destroy($id){
             $product = Product::findOrfail($id);
             $product->delete();
             return redirect('/products');
         }
     
}
