@extends('layouts.msd')

@section('content')
    <h1 class="mt-2">Галерея котиків</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
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
            @if($cat->status === 'approved')
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $cat->image) }}" class="card-img-top" alt="{{ $cat->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $cat->title }}</h5>
                        <p class="card-text">Категорія: {{ $cat->category }}</p>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endsection
