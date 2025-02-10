<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel App')</title>
    <!-- Підключення стилів -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<!-- Header -->
<header>
    <nav>
        <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="/contact">Contact</a>
    </nav>
</header>

<!-- Основний контент -->
<main>
    @yield('content')
</main>

<!-- Footer -->
<footer>
    <p>&copy; 2025 Laravel App</p>
</footer>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
