@extends('layouts.msd')

@section('content')
    <div class="d-flex justify-content-center align-items-center mt-3">
        <h1>Додати фото котика</h1>
    </div>
<div class="px-4">
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
            <input type="file" class="form-control form-img" id="image" name="image" required>
        </div>
        <button type="submit" class="btn btn-primary">Додати</button>
    </form>
</div>
@endsection
