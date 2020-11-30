
@extends('layouts.layout')

@section('content')

<div  class="wrapper create-pizza">
        <h1>Add Sale</h1>

       
        <form action="/sales" method="POST">
                @csrf
               
                <label for="name">Designation:</label>
               
                <select name="name" id="name">
                      @foreach ($names as $name )
                      <option value="{{ $name->Designation }}">{{ $name->Designation }}</option>
                    
                   
               @endforeach
                       
                </select><br>

                <label for="type">Type:</label>
                <select name="type" id="type">
                        <option value="F">Foncé</option>
                        <option value="C">Claire</option>
                        <option value="X">None</option>
                       
                </select><br>
                <label for="Quantity">Quantity:</label>
                <input type="number" name="Quantity" id="Quantity" required>
                       
                <br>
                <label for="price_a">Amount:</label>
                <input type="number" step="0.01" id="amount" name="price_a" required><br>
                <p class="text-danger">{{ $error }}</p>
               
                <input type="submit" value="Add Sale">
                
        </form>
 
</div>
        
  @endsection
