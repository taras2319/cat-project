@extends('layouts.msd')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 p-4">
                <h1 class="text-center mb-4"><i class="bi bi-pencil-square"></i>Реадагувати пост</h1>

                <form action="{{ route('posts.update', $post) }}" method="POST">
                @csrf
                @method('PUT')

                    <div class="mb-3">
                        <label for="title" class="form-label fw-bold">Заголовок</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label fw-bold">Контент</label>
                        <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('posts.index') }}" class="btn btn-outline-dark">
                            <i class="bi bi-arrow-left"></i> Назад
                        </a>
                        <button type="submit" class="btn btn-success px-4">
                            <i class="bi bi-check-lg"></i> Оновити
                        </button>
                    </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

