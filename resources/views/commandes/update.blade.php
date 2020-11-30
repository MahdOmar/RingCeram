
@extends('layouts.layout')

@section('content')

<div  class="wrapper create-pizza">
        <h1>Update Commande</h1>

       
        <form action="/commandes/update/{{$commande->id}}" method="POST">
                @csrf

                <label for="nm">Name:</label>
                <input type="text" id="nm" name="name" value="{{ $commande->Name }}" required><br>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" pattern="[0-9]+" minlength="10" maxlength="10" value="{{ $commande->phone }}" required><br>


                <label for="name">Designation:</label>
                <input type="text" id="name" name="des" value="{{ $commande->Designation }}" required><br>
                <label for="type">Type</label>
                <select name="type" id="type" required>
                    @if( $commande->Type  == 'F')
                    
                        <option value="F">Foncé</option>
                        <option value="C">Claire</option>
                        <option value="X">None</option>
                    
                     @elseif( $commande->Type  == "C") 
                     
                     <option value="C">Claire</option>
                     <option value="F">Foncé</option>
                     <option value="X">None</option>
                     
                     @else
                     
                     <option value="X">None</option>
                     <option value="F">Foncé</option>
                     <option value="C">Claire</option>
                    
                     @endif
                       
                </select><br>
                <label for="Quantity">Quantity</label>
                <input type="number" name="Quantity" id="Quantity" value="{{ $commande->Quantity }} required">
                       
                <br>
                
               
                <input type="submit" value="Update Commande">
                
        </form>
 
</div>
        
  @endsection
