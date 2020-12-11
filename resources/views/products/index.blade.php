
@extends('layouts.layout')

@section('content')

<div  class="text-center">
<div class="d-flex justify-content-between">
        <h1 class="m-2">Stock</h1>
        <input type="text" name="search" id="searchP" placeholder="search" onkeyup="searchProduct(event)">
        <a href="/products/create" class="btn btn-primary btn-sm m-2 p-4 text-white" role="button" >Add Product</a>
     </div>  
       

  
       <table class="table table-dark table-hover">
        <thead>
          <tr>
            <th>Designation</th>
            <th>Type(F/C)</th>
            <th>Meter/C</th>
            <th>Quantity</th>
            <th>Price_A</th>
            <th>Price_V</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($products as $product)
          <tr>
            <td>{{ $product->Designation }}</td>
            <td>{{ $product->Type }}</td>
            <td>{{ $product->meter }}</td>

            <td>{{ $product->Quantity }}</td>
            <td>{{ $product->Price_A }} DA</td>
            <td>{{ $product->Price_V }} DA</td>
            <td> <a href="/products/update/{{ $product['id'] }}" class="btn btn-secondary text-white" role="button" >Update</a>
              <form action="/products/{{ $product->id }}" method="POST" style="display: inline" >
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
