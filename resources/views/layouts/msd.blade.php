<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Головна сторінка')</title>
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- FANCYBOX CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.31/dist/fancybox.css">
    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="{{ asset('css/msdstyles.css') }}">
</head>

<body>
<!-- HEADER -->
<header class=" navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container">
        <!-- LOGO AND NAME -->
        <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center">
            <img src="{{ asset('images/logo.png') }}" alt="Cat Logo" style="height: 50px;" class="me-2">
            <span class="fw-bold text-primary">Мій котячий сайт</span>
        </a>
        <!-- MOBILE BUTTON -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- NAVIGATION -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <!-- MAIN MENU -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link text-dark hover-link">Головна</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}#about" class="nav-link text-dark hover-link">Про нас</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('info.index') }}" class="nav-link text-dark hover-link">Контакти</a>
                </li>
                <!-- DROPDOWN MENU -->
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-dark" id="userDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Меню
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li><a href="{{ route('cats.index') }}" class="dropdown-item hover-link">Галерея котиків</a>
                        </li>
                        <li><a href="{{ route('posts.index') }}" class="dropdown-item hover-link">Котячі історії</a>
                        </li>
                        <li><a href="{{ route('blog.index') }}" class="dropdown-item hover-link">Корисні статті</a></li>
                    </ul>
                </li>
            </ul>

            <!-- LOGIN, WELCOME, AND REGISTRATION BUTTONS -->
            <ul class="navbar-nav ms-auto">
                @if(Auth::check())
                    <!-- WELCOME BUTTON -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-dark" id="userDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            Привіт, {{ Auth::user()->name }}!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a href="{{ route('profile') }}" class="dropdown-item hover-link">Профіль</a></li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" class="dropdown-item hover-link"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Вийти</a>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- LOGIN BUTTON -->
                    <li class="nav-item">
                        <a href="#" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Увійти</a>
                    </li>
                    <!-- REGISTRATION BUTTON -->
                    <li class="nav-item">
                        <a href="#" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#registerModal">Зареєструватися</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
<!-- CONTENT1 -->
<div class="container content-top">
@yield('content')
</div>
<!-- CONTENT -->
@yield('content-top')

<div class="container">
    @yield('main-content')
</div>

@yield('content-gallery')

<div class="container">
    @yield('extra-content')
</div>

@yield('footer-content')
<!-- SCROLL BUTTON -->
<button id="scrollToTop" class="scroll-to-top me-2 me-lg-4">↑</button>

<!-- FOOTER -->
<footer class="mt-auto bg-dark text-white text-center py-3"">
    <p>© {{ date('Y') }} Мій сайт. Усі права захищено.</p>
</footer>
<!-- MODAL WINDOW -->
@include('auth.login')
@include('auth.register')
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0.31/dist/fancybox.umd.js"></script>
<script src="{{ asset('js/fancybox-init.js') }}"></script>
</body>
</html>

