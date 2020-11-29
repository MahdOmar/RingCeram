<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achat;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AchatController extends Controller
{
    public function index(){
     
        $sales = DB::table('achats')
        ->join('products', 'achats.product_id', '=', 'products.id')
        ->select(
            'products.Designation',
            'products.Type',
            'achats.Quantity',
            'achats.Amount',
            'achats.created_at',
          
        )
        ->get();
            
              return view('Vente.index',['sales' => $sales]);
          }
      
          
          public function create(){
              return view('Vente.create',['error' => '']);
          }
      
      
          public function store(){
      
              $sale = new Achat();
             
      
              

              $product = Product::where('Designation',request('name'))->where('Type',request('type'))->get();
             
              if($product->count() == 0){
                  $error='Product does not exist in stock';
                  return view('Vente.create',['error' => $error]);
                ;
              }
/*
              else{
                  if($product->Quantity < request('Quantity'))
                  {
                    return view('Vente.update',['error' => 'Sale Quantity is sup than Stock Quantity']);
                  }
                  else{
                    $sale->product_id = $product->id;  
                    $sale->Quantity = request('Quantity');
                    $sale->Amount = request('price_a');

                    $sale->save();
           
      
                    return redirect('/sales');
                  }


              }*/


         
             
              
          }
 
          public function showData($id){
             $sale = Achat::find($id);
             return view('Vente.update',['sale' => $sale]);
          }
 
          public function update($id){
 
              $sale = Achat::findOrfail($id);
              
              $sale->Designation = request('name');
              $sale->Type = request('type');    
              $sale->Quantity =request('Quantity');
              $sale->Amount = request('price_a');
              $sale->save();
              return redirect('/sales');
 
          }
      
      
          public function destroy($id){
              $sale = Achat::findOrfail($id);
              $sale->delete();
              return redirect('/sales');
          }
      
}
