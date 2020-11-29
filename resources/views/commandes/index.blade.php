
@extends('layouts.layout')

@section('content')

<div  class="text-center">
<div class="d-flex justify-content-between">
        <h1 class="m-2">Commandes</h1>
        <input type="text" name="search" id="searchC" placeholder="search" onkeyup='searchCommande(event)'>
        <a href="/commandes/create" class="btn btn-primary btn-sm m-2 p-4 text-white" role="button" >Add Commande</a>
     </div>  
       

  
       <table class="table table-dark table-hover">
        <thead>
          <tr>
              <th>Name</th>
              <th>Phone</th>
            <th>Designation</th>
            <th>Type(F/C)</th>
            <th>Quantity</th>
            
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($Commandes as $commande)
          <tr>
            <td>{{ $commande->Name }}</td>
           <td>{{ $commande->phone }}</td> 
            <td id="name">{{ $commande->Designation }}</td>
            <td>{{ $commande->Type }}</td>
            <td>{{ $commande->Quantity }} m</td>
            
            <td> <a href="/commandes/update/{{ $commande['id'] }}" class="btn btn-secondary text-white" role="button" >Update</a>
              <form action="/commandes/{{ $commande->id }}" method="POST" style="display: inline" >
                @csrf
                @method('DELETE')
                <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
        </form>
              
          </tr>
          @endforeach
      
        </tbody>
       </table>
        
       
   
      
      
       
       


</div>
        
  @endsection
