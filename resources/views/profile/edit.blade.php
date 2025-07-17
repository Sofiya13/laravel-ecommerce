@extends('layouts.user')

@section('content')
<div class="container">
    <h1>Update Profile</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
         @method('PATCH') 

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Address</label>
            <input type="text" name="address" value="{{ old('address', auth()->user()->address) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Profile Photo</label>
            <input type="file" name="user_profile_photo" class="form-control">
            @if(auth()->user()->user_profile_photo)
                <img src="{{ asset('storage/' . auth()->user()->user_profile_photo) }}" width="100" class="mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection
