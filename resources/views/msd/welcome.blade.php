@extends('layouts.msd')

@section('title', 'Головна сторінка')

@section('content')
    <section class="hero bg-light py-5">
        <div class="container d-flex flex-column-reverse flex-md-row align-items-center justify-content-between">
            <!-- Текстова частина -->
            <div class="text-center text-md-start">
                <h1 class="display-4 fw-bold text-primary">Дізнайся більше про котиків 🐾</h1>
                <p class="lead text-muted mb-4">Все, що ти хотів знати про котиків, на одному сайті: поради, історії, і наймиліші фото!</p>
                <a href="#about" class="btn btn-primary btn-lg me-2">Про нас</a>
                <a href="#contact" class="btn btn-outline-primary btn-lg">Зв'язатися</a>
            </div>

            <!-- Зображення -->
            <div>
                <img src="{{ asset('images/hero-cat.png') }}" alt="Cute Cat" class="img-fluid" style="max-height: 300px;">
            </div>
        </div>
    </section>

    <!-- Секція "Про нас" -->
    <section id="about" class="py-5 bg-white">
        <div class="container text-center">
            <h2 class="fw-bold text-primary mb-4">Про нас</h2>
            <p class="text-muted mb-5">
                Ми створили цей сайт для того, щоб об'єднати всіх любителів котиків 🐱. Тут ви знайдете корисні поради, цікаві факти та зможете поділитися історіями про своїх улюбленців!
            </p>
            <div class="row align-items-center">
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center equal-height">
                            <i class="bi bi-heart text-danger fs-1 mb-3"></i>
                            <h5 class="fw-bold">Любов до котиків</h5>
                            <p class="text-muted">Коти — наші найкращі друзі. Ми ділимося любов'ю через історії та фото.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center equal-height">
                            <i class="bi bi-lightbulb text-warning fs-1 mb-3"></i>
                            <h5 class="fw-bold">Поради</h5>
                            <p class="text-muted">Корисні поради для догляду, виховання та утримання ваших улюбленців.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0">
                        <div class="card-body text-center equal-height">
                            <i class="bi bi-people text-primary fs-1 mb-3"></i>
                            <h5 class="fw-bold">Спільнота</h5>
                            <p class="text-muted">Приєднуйтесь до спільноти любителів котиків, спілкуйтесь і діліться історіями.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Секція "Галерея котиків" -->
    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center text-primary mb-4">Галерея котиків</h2>
            <p class="text-muted text-center mb-5">
                Подивись на наймиліших котиків з нашої спільноти 🐾
            </p>
            <div class="row g-4 gallery">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <a href="{{ asset('images/cat-1.jpg') }}" data-fancybox="gallery" data-title="Мій милий котик 1">
                        <img src="{{ asset('images/cat-1.jpg') }}" class="card-img-top rounded" alt="Cute Cat 1">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <a href="{{ asset('images/cat-2.jpg') }}" data-fancybox="gallery" data-title="Мій милий котик 2">
                        <img src="{{ asset('images/cat-2.jpg') }}" class="card-img-top rounded" alt="Cute Cat 2">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <a href="{{ asset('images/cat-3.jpg') }}" data-fancybox="gallery" data-title="Мій милий котик 3">
                        <img src="{{ asset('images/cat-3.jpg') }}" class="card-img-top rounded" alt="Cute Cat 3">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <a href="{{ asset('images/cat-4.jpg') }}" data-fancybox="gallery" data-title="Мій милий котик 4">
                        <img src="{{ asset('images/cat-4.jpg') }}" class="card-img-top rounded" alt="Cute Cat 4">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <a href="{{ asset('images/cat-5.jpg') }}" data-fancybox="gallery" data-title="Мій милий котик 5">
                        <img src="{{ asset('images/cat-5.jpg') }}" class="card-img-top rounded" alt="Cute Cat 5">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <a href="{{ asset('images/cat-6.jpg') }}" data-fancybox="gallery" data-title="Мій милий котик 6">
                        <img src="{{ asset('images/cat-6.jpg') }}" class="card-img-top rounded" alt="Cute Cat 6">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Секція "Контакти" -->
    <section id="contact" class="py-5 bg-white">
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <div class="container">
            <h2 class="fw-bold text-center text-primary mb-4">Контакти</h2>
            <p class="text-muted text-center mb-5">
                Зв’яжіться з нами, якщо у вас є запитання або ви хочете поділитися історією про свого улюбленця 🐾
            </p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('contact.submit') }}" method="POST" class="shadow-sm p-4 rounded">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Ваше ім’я</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Введіть своє ім’я" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Ваш email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Введіть свою email-адресу" required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Ваше повідомлення</label>
                            <textarea name="message" id="message" rows="5" class="form-control" placeholder="Напишіть своє повідомлення" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100">Надіслати</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container text-center">
            <h2 class="fw-bold text-primary mb-4">Список наших котиків</h2>
            <p class="text-muted mb-3">
                Ми створили форму, щоб ви змогли добавити свої котиків🐱
            </p>
            <div class="align-items-center">
                <a href="{{ route('posts.index') }}" class="btn btn-outline-primary btn-lg">Заповнити</a>
            </div>
        </div>
    </section>

    <!-- Секція "Галерея кото-гусі" -->
    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-center text-primary mb-4">Галерея кото-гусів</h2>
            <p class="text-muted text-center mb-5">
                Подивись на наймиліших кото-гусів 🐾
            </p>
            <div class="row g-4 gallery">
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <a href="{{ asset('images/goose-1.jpg') }}" data-fancybox="gallery" data-title="Мій милий гусь 1">
                            <img src="{{ asset('images/goose-1.jpg') }}" class="card-img-top rounded" alt="Cute goose 1">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <a href="{{ asset('images/goose-2.jpg') }}" data-fancybox="gallery" data-title="Мій милий гусь 2">
                            <img src="{{ asset('images/goose-2.jpg') }}" class="card-img-top rounded" alt="Cute goose 2">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm border-0">
                        <a href="{{ asset('images/goose-3.jpg') }}" data-fancybox="gallery" data-title="Мій милий гусь 3">
                            <img src="{{ asset('images/goose-3.jpg') }}" class="card-img-top rounded" alt="Cute goose 3">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <section>
    <h1>Додати фото котика</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('cats.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Ім'я котика</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Категорія</label>
            <select class="form-select" id="category" name="category" required>
                <option value="Мої котики">Мої котики</option>
                <option value="Вуличні котики">Вуличні котики</option>
                <option value="Кумедні моменти">Кумедні моменти</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Фото</label>
            <input type="file" class="form-control" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
    </section>
@endsection

