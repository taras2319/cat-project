@extends('layouts.msd') <!-- Якщо використовуєте layout -->

@section('title', 'Контакти') <!-- Заголовок сторінки -->

@section('content')
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif
        <h1 class="text-primary text-center mt-5 mb-4">Контакти</h1>
        <div class="container">
            <div class="row align-items-start  justify-content-center gap-4">
                <!-- Форма -->
                <div class="col-md-6 shadow-sm tt">
                    <h4 class=" fw-bold text-muted text-center mt-3 mb-2">
                        Ваші ідеї та відгуки важливі для нас 🐾
                    </h4>
                    <form action="{{ route('contact.submit') }}" method="POST" class="p-4 rounded bg-white">
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

                <!-- Контактна інформація -->
                <div class="col-md-6 shadow-sm tt">
                    <h4 class=" fw-bold text-muted text-center mt-3 mb-2">Зв'яжіться з нами</h4>
                    <p>Телефон: +380 12 345 6789</p>
                    <p>Email: info@catsite.com</p>
                    <p>Адреса: вул. Муркотиків, 10, Київ, Україна</p>
                </div>
            </div>
        </div>
@endsection
