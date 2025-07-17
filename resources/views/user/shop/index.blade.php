@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Shop</h1>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                @if($product->images)
                    <img src="{{ asset('storage/'.$product->images[0]) }}" class="card-img-top" height="150">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->product_name }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 40) }}</p>
                    <p><strong>₹{{ $product->offer_price ?? $product->price }}</strong></p>
                    <a href="{{ route('shop.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-primary btn-sm">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
