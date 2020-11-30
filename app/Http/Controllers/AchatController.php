<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Achat;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class AchatController extends Controller
{

  
  public function __construct(){
    $this->middleware('auth');
  }



    public function index(){
 

      /*  $sales = Achat::join('products','achats.product_id','=','products.id')
        ->select('achats.id','products.Designation','products.Type','achats.Quantity','achats.Amount','achats.created_at')
        ->get();*/
        
        $sales = Achat::with('product')->get();
        $total = $sales->sum('Amount');
        
            
              return view('Vente.index',['sales' => $sales,'total' => $total]);
          }
      
          
          public function create(){
            $names = Product::distinct()->orderBy('Designation', 'ASC')->get(['Designation']);



              return view('Vente.create',['error' => '','names' => $names]);
          }
      
      
          public function store(){
      
              $sale = new Achat();
              $names = Product::distinct()->get(['Designation']);
      
              

              $product = Product::where('Designation',request('name'))->where('Type',request('type'))->get();
              
             
              if($product->count() == 0){
                  $error='Product does not exist in stock';
                  return view('Vente.create',['error' => $error,'names' => $names]);
              }
              
              else{
              
                  if($product[0]->Quantity < request('Quantity'))
                  {
                    return view('Vente.create',['error' => 'Sale Quantity is sup than Stock Quantity','names' => $names]);
                  }

                  elseif(request('Quantity') == 0)
                  {
                    return view('Vente.create',['error' => 'Sale Quantity is 0','names' => $names]);
                  
                  }

                  else{
                    $sale->product_id = $product[0]->id;  
                    $sale->Quantity = request('Quantity');
                    $sale->Amount = request('price_a');
                    $product[0]->Quantity = $product[0]->Quantity - $sale->Quantity;
                    $product[0]->save();

                    $sale->save();
           
      
                    return redirect('/sales');
                  }


              }


         
             
              
          }
 
          public function showData($id){
             $sale = Achat::find($id);
            
             return view('Vente.update',['sale' => $sale,'error' =>'']);
          }
 
          public function update($id){
 
              $sale = Achat::with('product')->findOrfail($id);

             $product = Product::where('Designation',request('name'))->where('Type',request('type'))->get();
              
             if($product[0]->Quantity < request('Quantity'))
             {
               return view('Vente.update',['error' => 'Sale Quantity is greater than Stock Quantity',
               'sale' => $sale]);
             }

             else{


                $sale->product_id = $product[0]->id;  
                $product[0]->Quantity = $product[0]->Quantity + $sale->Quantity - request('Quantity') ;
                $product[0]->save();
                $sale->Quantity = request('Quantity');
                $sale->Amount = request('price_a');
                 

                $sale->save();
       
  
                return redirect('/sales');


             }


              
           
          }
      
      
          public function destroy($id){
              $sale = Achat::findOrfail($id);
              $sale->delete();
              return redirect('/sales');
          }
      
}
