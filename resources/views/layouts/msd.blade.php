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
<body >

<!-- Header -->
<header class=" navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container">
        <!-- Логотип і Назва -->
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Cat Logo" style="height: 50px;" class="me-2">
            <span class="fw-bold text-primary">Мій котячий сайт</span>
        </a>

        <!-- Кнопка для мобільних пристроїв -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Навігація -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- Ліва частина: Головна, Про нас, Контакти -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-dark hover-link">Головна</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}#about" class="nav-link text-dark hover-link">Про нас</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('info.index') }}" class="nav-link text-dark hover-link">Контакти</a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-dark" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Меню
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a href="{{ route('cats.index') }}" class="dropdown-item hover-link">Галерея котиків</a></li>
                        <li><a href="{{ route('posts.index') }}" class="dropdown-item hover-link">Котячі історії</a></li>
                        <li><a href="{{ route('blog.index') }}" class="dropdown-item hover-link">Корисні статті</a></li>

                    </ul>
                </li>
            </ul>

            <!-- Права частина: Привітання та кнопки входу/реєстрації -->
            <ul class="navbar-nav ms-auto">
                @if(Auth::check())
                    <!-- Привітання -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Привіт, {{ Auth::user()->name }}!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a href="{{ route('profile') }}" class="dropdown-item hover-link">Профіль</a></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" class="dropdown-item hover-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Вийти</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Кнопки входу та реєстрації -->
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Увійти</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-secondary">Зареєструватися</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>

@yield('content-top')
<!-- Main Content -->

<div class="container">
    @yield('content')
</div>

@yield('content-gallery')

<div class="container">
    @yield('content-tt')
</div>

@yield('content-rr')

    <button id="scrollToTop" class="scroll-to-top me-2 me-lg-4">↑</button>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 ">
    <p>© {{ date('Y') }} Мій сайт. Усі права захищено.</p>
</footer>






<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.31/dist/fancybox.umd.js"></script>
<script src="{{ asset('js/fancybox-init.js') }}"></script>
</body>
</html>

