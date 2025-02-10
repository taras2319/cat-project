<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
</head>
<body>
<h1>Contact Us</h1>

<!-- Відображення повідомлення про успіх -->
@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<!-- Відображення помилок валідації -->
@if ($errors->any())
    <ul style="color: red;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<!-- Форма -->
<form action="{{ route('contact.store') }}" method="POST">
    @csrf <!-- Захист від CSRF -->

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label for="message">Message:</label>
        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
    </div>

    <button type="submit">Send</button>
</form>
</body>
</html>
