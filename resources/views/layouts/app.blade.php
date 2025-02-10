<!DOCTYPE html>
<html lang="en">
<head>
    <script src="{{ asset('js/createPostModal.js') }}"></script>
    <script src="{{ asset('js/viewPostModal.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">  <!-- Bootstrap Connection -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Additional styles -->
</head>
<body>
<!-- Header -->
@yield('header')

<!-- Main Content -->
<div class="container">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

