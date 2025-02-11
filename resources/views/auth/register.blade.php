@extends('layouts.msd')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Реєстрація</h1>
        <form method="POST" action="{{ route('register') }}" class="shadow-sm p-4 rounded">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Ваше ім'я</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Підтвердження пароля</label>
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Зареєструватися</button>
        </form>
    </div>
@endsection
