@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $product->product_name }}</h2>
    @if($product->images)
        @foreach($product->images as $img)
            <img src="{{ asset('storage/'.$img) }}" width="100" height="100" class="m-1">
        @endforeach
    @endif
    <p>{{ $product->description }}</p>
    <p><strong>Price: ₹{{ $product->offer_price ?? $product->price }}</strong></p>
    <form action="{{ route('cart.add', $product->id) }}" method="POST">
        @csrf
        <button class="btn btn-success">Add to Cart</button>
    </form>
    <a href="{{ route('shop.index') }}" class="btn btn-secondary mt-3">Back to Shop</a>
</div>
@endsection
