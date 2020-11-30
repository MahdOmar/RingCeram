
@extends('layouts.layout')

@section('content')

<div  class="wrapper create-pizza">
        <h1>Add Sale</h1>

       
        <form action="/sales/update/{{$sale->id}}" method="POST">
                @csrf
                <label for="name">Designation:</label>
                <input type="text" id="name" name="name" value="{{ $sale->product->Designation }}"><br>
                <label for="type">Type:</label>
                <select name="type" id="type" >
                    @if( $sale->product->Type  == 'F')
                    
                        <option value="F">Foncé</option>
                        <option value="C">Claire</option>
                        <option value="X">None</option>
                    
                     @elseif( $sale->Type  == "C") 
                     
                     <option value="C">Claire</option>
                     <option value="F">Foncé</option>
                     <option value="X">None</option>
                     
                     @else
                     
                     <option value="X">None</option>
                     <option value="F">Foncé</option>
                     <option value="C">Claire</option>
                    
                     @endif
                       
                </select><br>
               
                <label for="Quantity">Quantity:</label>
                <input type="number" name="Quantity" id="Quantity" value="{{ $sale->Quantity }}" required>
                       
                <br>
                <label for="price_a">Amount:</label>
                <input type="number" step="0.01" id="amount" name="price_a" value="{{ $sale->Amount }}" required><br>
                <p class="text-danger">{{ $error }}</p>
               
                <input type="submit" value="Update Sale">
                
        </form>
 
</div>
        
  @endsection
