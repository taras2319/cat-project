@extends('layouts.msd')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">{{ $blog->title }}</h1>
        <div class="content">
            {!! $blog->content !!}
        </div>
    </div>
@endsection
