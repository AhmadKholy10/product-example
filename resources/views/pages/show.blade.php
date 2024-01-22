@extends('layouts.app')

@section('title') Show @endsection

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            Product Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{$product->name}}</h5>
            <p class="card-text">Price: {{$product->price}}</p>
            <p class="card-text">Quantity: {{$product->quantity}}</p>
            <p class="card-text">Category: {{$product->category_name}}</p>
            <p class="card-text">Description: {{$product->description}}</p>
        </div>
    </div>

    
@endsection


