@extends('layouts.msd')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Блог про котиків</h1>

        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text">{{ Str::limit(strip_tags($blog->content), 100, '...') }}</p>
                            <a href="{{ route('blog.show', $blog) }}" class="btn btn-primary">Читати далі</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $blogs->links() }}
        </div>
    </div>
@endsection
