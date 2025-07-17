@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h2>Products List</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success">+ Add Product</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Offer Price</th>
            <th>Images</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->offer_price }}</td>
            <td>
                @if($product->images)
                    @foreach($product->images as $img)
                        <img src="{{ asset('storage/'.$img) }}" width="40" height="40" class="rounded">
                    @endforeach
                @endif
            </td>
            <td>{{ Str::limit($product->description, 50) }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="8" class="text-center">No Products Found</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
