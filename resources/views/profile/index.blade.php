@extends('layouts.msd')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Мій профіль</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Форма оновлення інформації профілю -->
        <div class="mt-2 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Форма оновлення пароля -->
        <div class="mt-2 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Форма видалення користувача -->
        <div class="mt-2 p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
@endsection
