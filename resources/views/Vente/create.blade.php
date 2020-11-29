
@extends('layouts.layout')

@section('content')

<div  class="wrapper create-pizza">
        <h1>Add Sale</h1>

       
        <form action="/sales" method="POST">
                @csrf
               
                <label for="name">Designation:</label>
                <input type="text" id="name" name="name"><br>
                <label for="type">Type:</label>
                <select name="type" id="type">
                        <option value="F">Foncé</option>
                        <option value="C">Claire</option>
                        <option value="X">None</option>
                       
                </select><br>
                <label for="Quantity">Quantity:</label>
                <input type="number" name="Quantity" id="Quantity">
                       
                <br>
                <label for="price_a">Amount:</label>
                <input type="number" step="0.01" id="amount" name="price_a"><br>
                <p class="text-danger">{{ $error }}</p>
               
                <input type="submit" value="Add Sale">
                
        </form>
 
</div>
        
  @endsection
