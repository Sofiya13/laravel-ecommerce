@extends('layouts.user')

@section('content')
<div class="container">
    <h1>Your Cart</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <p>Your cart is empty. <a href="{{ route('home') }}">Continue Shopping</a></p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Type</th>
                <th>Description</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($cartItems as $item)
                @php
                    $product = $item->product;
                    $total = $product->price * $item->quantity;
                    $grandTotal += $total;
                @endphp
                <tr>
                    <td>{{ $product->product_name ?? 'N/A' }}</td>
                    <td>
                       @if($product->images && count($product->images) > 0)
    <img src="{{ asset('storage/' . $product->images[0]) }}" width="80" height="80">
@endif
                    </td>
                    <td>
                        {{ is_array($product->type) ? implode(', ', $product->type) : $product->type }}
                    </td>
                    <td>
                        {{ is_array($product->description) ? implode(', ', $product->description) : $product->description }}
                    </td>
                    <td>₹{{ number_format($product->price, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item->product_id) }}" method="POST" style="display:flex;gap:5px;">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width:70px;">
                            <button class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                    <td>₹{{ number_format($total, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->product_id) }}" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="6" class="text-end"><strong>Grand Total</strong></td>
                <td colspan="2"><strong>₹{{ number_format($grandTotal, 2) }}</strong></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf
        <button class="btn btn-success">Home</button>
    </form>
    @endif
</div>
@endsection
