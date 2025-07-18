@extends('layouts.admin')

@section('content')
<h1 class="mb-4">All Cart Items</h1>

@if($cartItems->isEmpty())
    <div class="alert alert-info">No cart items found.</div>
@else
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>User</th>
            <th>Product</th>
            <th>Type</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->user->name ?? 'Guest' }}</td>
                <td>{{ $item->product->product_name ?? 'N/A' }}</td>
                <td>{{ $item->product->type ?? '-' }}</td>
                <td>{{ Str::limit($item->product->description ?? '', 40) }}</td>
                <td>₹{{ $item->product->price ?? 0 }}</td>
                <td>{{ $item->quantity }}</td>
                <td>₹{{ ($item->product->price ?? 0) * $item->quantity }}</td>
                <td>
                    @if($item->product && $item->product->images)
                        <img src="{{ asset('storage/'.$item->product->images[0]) }}" width="50" height="50" style="border-radius:5px;">
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
