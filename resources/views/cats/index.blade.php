@extends('layouts.msd')

@section('content')
    <h1>Галерея котиків</h1>

    <!-- Фільтрація -->
    <div class="mb-3">
        <a href="{{ route('cats.index') }}" class="btn btn-secondary">Усі</a>
        <a href="{{ route('cats.index', ['category' => 'Мої котики']) }}" class="btn btn-primary">Мої котики</a>
        <a href="{{ route('cats.index', ['category' => 'Вуличні котики']) }}" class="btn btn-primary">Вуличні котики</a>
        <a href="{{ route('cats.index', ['category' => 'Кумедні моменти']) }}" class="btn btn-primary">Кумедні моменти</a>
    </div>

    <!-- Галерея -->
    <div class="row">
        @foreach($cats as $cat)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $cat->image) }}" class="card-img-top" alt="{{ $cat->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cat->name }}</h5>
                        <p class="card-text">Категорія: {{ $cat->category }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
