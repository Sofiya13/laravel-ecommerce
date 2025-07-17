@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Product</h1>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Back to List</a>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{ old('product_name', $product->product_name) }}" required>
        </div>
        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type', $product->type) }}" required>
        </div>
        <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="mb-3">
            <label>Offer Price</label>
            <input type="number" step="0.01" name="offer_price" class="form-control" value="{{ old('offer_price', $product->offer_price) }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Current Images:</label><br>
            @if($product->images)
                @foreach($product->images as $img)
                    <img src="{{ asset('storage/'.$img) }}" width="60" height="60" style="border-radius:5px; margin:5px;">
                @endforeach
            @endif
        </div>
        <div class="mb-3">
            <label>Add More Images</label>
            <input type="file" name="images[]" class="form-control" multiple>
        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
@endsection
