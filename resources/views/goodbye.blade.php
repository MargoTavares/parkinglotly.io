<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('head')
    <title>Thank you</title>

</head>
<body>
    <div class="hero">
        <div class="hero-content">
            <h1 class="hero-load-goodbye">Goodbye</h1>
            <h3 class="hero-sub">Thank you for paying. You may now leave.</h3>
            <a href="{{ url('/') }}" class="hero-buttons">Return To Home Page</a>

        </div>

    </div>
</body>
</html>
