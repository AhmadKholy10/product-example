@extends('layouts.app')

@section('title') Create @endsection

@section('content')

   
    <form method="POST" action="{{route('product.store')}}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input  type="text" class="form-control" name="name" value="{{old('name')}}">
            {{-- <div class="input-group-append custom">
                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
            </div> --}}
        </div>
        @error('name')
            <div class="d-block text alert-danger" style="margin-top: -25px; margin-bottom: 15px;">
                {{ $message }}
            </div>
        @enderror
        <div class="mb-3">
            <label  class="form-label">Price</label>
            <input name="price" class="form-control"  rows="3" value="{{old('price')}}">
            {{-- <div class="input-group-append custom">
                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
            </div> --}}
        </div>

        @error('price')
            <div class="d-block text alert-danger" style="margin-top: -25px; margin-bottom: 15px;">
                {{ $message }}
            </div>
        @enderror

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" value="{{old('quantity')}}">
            {{-- <div class="input-group-append custom">
                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
            </div> --}}
        </div>
        @error('quantity')
            <div class="d-block text alert-danger" style="margin-top: -25px; margin-bottom: 15px;">
                {{ $message }}
            </div>
        @enderror

        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3">{{old('description')}}</textarea>
        </div>

        <div class="mb-3">
            <label  class="form-label">Category</label>
            <select name="category" class="form-control">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        

        <button class="btn btn-success">Submit</button>
    </form>


@endsection