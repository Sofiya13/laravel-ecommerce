<!DOCTYPE html>
<html>
<head>
    <title>User Home - E-Commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">MyShop</a>
        <ul class="navbar-nav ms-auto">
           <li class="nav-item">
    <a class="nav-link" href="{{ route('cart.index') }}">
        Cart ({{ \App\Models\Cart::where('user_id', auth()->id())->count() }})
    </a>
</li>
@if(Auth::check())
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            @if(Auth::user()->user_profile_photo)
                <img src="{{ asset('storage/' . Auth::user()->user_profile_photo) }}" width="30" height="30" style="border-radius:50%">
            @else
                {{ Auth::user()->name }}
            @endif
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item">Logout</button>
                </form>
            </li>
        </ul>
    </li>
@endif


        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
