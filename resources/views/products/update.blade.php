
@extends('layouts.layout')

@section('content')

<div  class="wrapper create-pizza">
        <h1>Update Product</h1>

       
        <form action="/products/update/{{$product->id}}" method="POST">
                @csrf
                <label for="name">Designation:</label>
                <input type="text" id="name" name="name" value="{{ $product->Designation }}" required><br>
                <label for="type">Type:</label>
                <select name="type" id="type" required>
                    @if( $product->Type  == 'F')
                    
                        <option value="F">Foncé</option>
                        <option value="C">Claire</option>
                        <option value="X">None</option>
                    
                     @elseif( $product->Type  == "C") 
                     
                     <option value="C">Claire</option>
                     <option value="F">Foncé</option>
                     <option value="X">None</option>
                     
                     @else
                     
                     <option value="X">None</option>
                     <option value="F">Foncé</option>
                     <option value="C">Claire</option>
                    
                     @endif
                       
                </select><br>
                <label for="meter">Meter/K:</label>
                <input type="number" name="meter" id="meter" step="0.01" value="{{ $product->meter }}" required><br>
                <label for="Quantity">Quantity:</label>
                <input type="number" name="Quantity" step="0.01" id="Quantity" value="{{ $product->Quantity }}" required>
                       
                <br>
                <label for="price_a">Price_Achat:</label>
                <input type="number" step="0.01" id="price_a" name="price_a" value="{{ $product->Price_A }}" required><br>
                <label for="price_v">Price_Vendre:</label>
                <input type="number" step="0.01" id="price_v" name="price_v" value="{{ $product->Price_V }}" required><br>
               
                <input type="submit" value="Update Product">
                
        </form>
 
</div>
        
  @endsection
