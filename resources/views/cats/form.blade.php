@extends('layouts.msd')

@section('content')
    <h1>Додати фото котика</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('cats.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Ім'я котика</label>
            <input type="text" class="form-control" id="title" name="title" required>
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
@endsection
