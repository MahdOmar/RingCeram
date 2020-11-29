<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;

class CommandeController extends Controller
{

    public function index(){
     
        $Commandes = Commande::all();
            
              return view('commandes.index',['Commandes' => $Commandes]);
          }
      
          
          public function create(){
              return view('commandes.create');
          }
      
      
          public function store(){
      
              $commande = new Commande();
              $commande->Name = request('name');
              $commande->phone = request('phone');
              $commande->Designation = request('des');
              $commande->Type = request('type');
              $commande->Quantity = request('Quantity');
           
             
              $commande->save();
           
      
              return redirect('/commandes');
          }
 
          public function showData($id){
             $Commande = Commande::find($id);
             return view('commandes.update',['commande' => $Commande]);
          }
 
          public function update($id){
 
              $commande = Commande::findOrfail($id);
              $commande->Name = request('name');
              $commande->phone = request('phone');
              $commande->Designation = request('des');
              $commande->Type = request('type');
              $commande->Quantity = request('Quantity');
              $commande->save();
              return redirect('/commandes');
 
          }
      
      
          public function destroy($id){
              $Commande = Commande::findOrfail($id);
              $Commande->delete();
              return redirect('/commandes');
          }
}
