<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Головна сторінка')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.31/dist/fancybox.css">

    <link rel="stylesheet" href="{{ asset('css/msdstyles.css') }}">
</head>
<body>
<!-- Header -->
<header class="navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container">
        <!-- Логотип -->
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Cat Logo" style="height: 50px;" class="me-2">
            <span class="fw-bold text-primary">Мій котячий сайт</span>
        </a>

        <!-- Меню (кнопка для мобільних пристроїв) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Навігація -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link text-dark">Головна</a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link text-dark">Про нас</a>
                </li>
                <li class="nav-item">
                    <a href="#contact" class="nav-link text-dark">Контакти</a>
                </li>
            </ul>
        </div>
    </div>
</header>


<!-- Main Content -->
<div class="container">
    @yield('content')
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-4">
    <p>© {{ date('Y') }} Мій сайт. Усі права захищено.</p>
</footer>






<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.31/dist/fancybox.umd.js"></script>
<script src="{{ asset('js/fancybox-init.js') }}"></script>
<script src="{{ asset('js/createPostModal.js') }}"></script>
<script src="{{ asset('js/viewPostModal.js') }}"></script>
</body>
</html>

