<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">IKF NTT</a>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
    <footer class="bg-primary text-white text-center py-3">
        <p>&copy; 2024 IKF NTT Kabupaten Sorong</p>
    </footer>
</body>
</html>
