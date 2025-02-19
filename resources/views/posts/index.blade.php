@extends('layouts.msd')

@section('title', 'Список постів')

@section('content')

    <div class="d-flex justify-content-center align-items-center flex-column mt-2">
        <!-- Заголовок -->
        <h1>Історії користувачів</h1>
        <!-- Кнопка -->
        <button class="btn btn-outline-primary btn-lg  mb-3" data-bs-toggle="modal" data-bs-target="#postModal">Додати
            історію
        </button>
    </div>

    <!-- Displaying posts in cards -->
    <div class="row" id="postsList">
        @foreach($posts as $post)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm border-0">
                    <img src="{{ asset('storage/'.$post->image) }}" class="card-img-top rounded" alt="Фото котика">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text text-muted">{{ Str::limit(strip_tags($post->content), 100, '...') }}</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#viewStoryModal{{$post->id}}">Переглянути
                            </button>
                            <button class="btn btn-outline-danger btn-sm like-button" data-id="{{ $post->id }}">
                                ❤️ <span class="likes-count">{{ $post->likes }}</span>
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Модальне вікно добавляння постів -->
    <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="postModalLabel">Додати новий пост</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрити"></button>
                </div>
                <div class="modal-body">
                    @csrf
                    <form id="postForm" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="postTitle" class="form-label">Заголовок</label>
                            <input type="text" id="postTitle" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="postContent" class="form-label">Контент</label>
                            <textarea id="postContent" name="content" class="richTextBox"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Фото</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <button type="submit" class="btn btn-success w-50">Опублікувати</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Модальне вікно перегляду історії -->
    @foreach($posts as $post)
        <div class="modal fade" id="viewStoryModal{{$post->id}}" tabindex="-1" aria-labelledby="storyLabel{{$post->id}}"
             aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="storyLabel{{$post->id}}">{{ $post->title }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="modalImg">
                        <div class="d-flex justify-content-center">
                        <img src="{{ asset('storage/'.$post->image) }}" class="img-fluid rounded mb-3"
                             alt="Фото котика">
                        </div>
                        <p>{!! $post->content !!}</p>
                        <p class="text-muted">Опубліковано: {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-danger btn-sm like-button" data-id="{{ $post->id }}">
                            ❤️ <span class="likes-count">{{ $post->likes }}</span>
                        </button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Закрити</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="d-flex justify-content-center mt-4">
        {{ $posts->links() }}
    </div> <!-- Pagination -->

    <script src="{{ asset('js/createPostModal.js') }}"></script>
    <script src="{{ asset('js/viewPostModal.js') }}"></script>
    <script src="{{ asset('js/likesPostModal.js') }}"></script>
    <!-- connect tinymce -->
    <script src="https://cdn.tiny.cloud/1/210cao8wjlufzfingpj8zna58zauj0n8eggbqkv44kh1o88f/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('js/tinyMCE.js') }}?v={{ time() }}"></script>
@endsection









