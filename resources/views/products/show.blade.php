
@extends('layouts.layout')

@section('content')

<div class="wrapper pizza-details">

        <h1>Order for  {{ $pizza->name}}</h1>
        <p class="type"> Type : {{ $pizza->type }}</p>
        <p class="base">Base : {{ $pizza->base }}</p>
        <p class="price">Price : {{ $pizza->price }}$</p>
        
        <p class="toppings">Topppings :
                @if(!is_null($pizza->toppings))
                @foreach($pizza->toppings as $key => $topping)
                {{ $topping }},
                @endforeach
                @else
                nothing
                @endif
        </p>
        <br><br>
        <form action="/pizzas/{{ $pizza->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button>Complete Order</button>
        </form>
        
       
 
</div>
<a href="/pizzas">Back to all pizzas </a>
        
  @endsection
