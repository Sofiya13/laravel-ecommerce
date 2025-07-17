@extends('layouts.admin')

@section('content')
<h1>Welcome, Admin!</h1>
<p>This is your dashboard. Use the sidebar to manage products, users, and orders.</p>
<a href="{{ route('products.index') }}" class="btn btn-primary">Manage Products</a>
@endsection
