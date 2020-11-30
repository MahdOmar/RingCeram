
@extends('layouts.layout')

@section('content')

<div  class="text-center">
<div class="d-flex justify-content-between">
        <h1 class="m-2">Sales</h1>
        <input type="text" name="search" id="searchP" placeholder="search" onkeyup="searchProduct(event)">
        <a href="/sales/create" class="btn btn-primary btn-sm m-2 p-4 text-white" role="button" >Add sale</a>
     </div>  
       

  
       <table class="table table-dark table-hover">
        <thead>
          <tr>
            
            <th>Designation</th>
            <th>Type(F/C)</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Date</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach($sales as $sale)
          <tr>
            <td>{{ $sale->product->Designation }}</td>
            <td>{{ $sale->product->Type }}</td>
            <td>{{ $sale->Quantity }}</td>
            <td>{{ $sale->Amount }} DA</td>
            <td>{{ $sale->created_at->format('d/m/Y') }} </td>
            <td> <a href="/sales/update/{{ $sale->id }}" class="btn btn-secondary text-white" role="button" >Update</a>
              <form action="/sales/{{ $sale->id }}" method="POST" style="display: inline" >
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
