@extends('layouts.app')

@section('title') Products @endsection

@section('content')
    <div class="text-center">
        <a href="{{ route('product.create') }}" class="btn btn-success">Create Product</a>
    </div>

    <table class="table mt-4">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Category</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)

            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price }}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category_name}}</td>
                <td>
                    <a href="{{ route('product.show', $product->id)}}" class="btn btn-info">View</a>
                </td>
            </tr>
        @endforeach


        </tbody>
    </table>

@endsection