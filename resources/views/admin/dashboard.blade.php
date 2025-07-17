@extends('layouts.admin')
@section('content')
<h1>Welcome, Admin</h1>
<a href="{{ route('products.index') }}" class="btn btn-primary">Manage Products</a>
@endsection
