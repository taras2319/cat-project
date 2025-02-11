@extends('layouts.msd')

@section('title', 'Список постів')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex flex-column justify-content-center align-items-center mb-4">
        <!-- Заголовок -->
        <div class="col-md-8">
            <h1 class="fw-bold text-primary mb-2 mt-2">Список постів</h1>
        </div>
        <!-- Кнопка -->
        <div class="col-md-4 text-md-end text-center">
            <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#postModal">Додати пост</button>
        </div>
    </div>


    <!-- Модальне вікно -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Додати новий пост</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <form id="postForm">
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Заголовок</label>
                            <input type="text" id="postTitle" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="postContent" class="form-label">Контент</label>
                            <textarea id="postContent" name="content" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Додати пост</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Модальне вікно для перегляду поста -->
    <div class="modal fade" id="viewPostModal" tabindex="-1" aria-labelledby="viewPostModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPostModalLabel">Деталі поста</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
                </div>
                <div class="modal-body">
                    <h3 id="viewPostTitle"></h3>
                    <p id="viewPostContent"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Displaying posts in cards -->
    <div class="row" id="postsList">
        @foreach($posts as $post)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h5 class="card-title text-primary">{{ $post->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($post->content, 100, '...')}}</p>

                        <div class="d-flex justify-content-around gap-3 mt-3">
                            <button class="view-post btn btn-info btn-sm" id="postView" data-id="{{ $post->id }}" data-bs-toggle="modal" data-bs-target="#viewPostModal">👀 Переглянути</button>
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">✏️ Редагувати</a>

                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ви впевнені?')">🗑️ Видалити</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div> <!-- Pagination -->

@endsection

