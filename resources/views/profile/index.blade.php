@extends('layouts.msd')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Мій профіль</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" class="shadow-sm p-4 rounded">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Ваше ім'я</label>
                <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Оновити</button>
        </form>
    </div>

@endsection
