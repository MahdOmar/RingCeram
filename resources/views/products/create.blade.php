
@extends('layouts.layout')

@section('content')

<div  class="wrapper create-pizza">
        <h1>Add Product</h1>

       
        <form action="/products" method="POST">
                @csrf
                <label for="name">Designation:</label>
                <input type="text" id="name" name="name" required><br>
                <label for="type">Type:</label>
                <select name="type" id="type" required>
                        <option value="F">Foncé</option>
                        <option value="C">Claire</option>
                        <option value="X">None</option>
                       
                </select><br>
                <label for="meter">Meter/K:</label>
                <input type="number" name="meter" id="meter" step="0.01" required><br>
                <label for="Quantity">Quantity:</label>
                <input type="number" name="Quantity" step="0.01" id="Quantity" required>
                       
                <br>
                <label for="price_a">Price_Achat:</label>
                <input type="number" step="0.01" id="price_a" name="price_a" required><br>
                <label for="price_v">Price_Vendre:</label>
                <input type="number" step="0.01" id="price_v" name="price_v" required><br>
               
                <input type="submit" value="Add Product">
                
        </form>
 
</div>
        
  @endsection
