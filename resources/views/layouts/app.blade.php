<!DOCTYPE html>
<html>
<head>
    <title>E-Commerce Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">E-Commerce</a>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">Dashboard</a>
                <a href="{{ route('products.index') }}" class="nav-link text-white">Products</a>
            </div>
        </div>
    </nav>

    <div class="py-4">
        @yield('content')
    </div>
</body>
</html>
