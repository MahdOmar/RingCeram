
@extends('layouts.layout')

@section('content')

<div  class="wrapper create-pizza">
        <h1>Add Commande</h1>

       
        <form action="/commandes" method="POST">
                @csrf

                <label for="nm">Name:</label>
                <input type="text" id="nm" name="name" required><br>

                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" pattern="[0-9]+" minlength="10" maxlength="10" required><br>

                <label for="name">Designation:</label>
                <input type="text" id="name" name="des" required><br>
                <label for="type">Type</label>
                <select name="type" id="type" required>
                        <option value="F">Foncé</option>
                        <option value="C">Claire</option>
                        <option value="X">None</option>
                       
                </select><br>
                <label for="Quantity" >Quantity</label>
                <input type="number" name="Quantity" id="Quantity" required>
                       
                <br>
               
               
               
                <input type="submit" value="Add Commande">
                
        </form>
 
</div>
        
  @endsection
