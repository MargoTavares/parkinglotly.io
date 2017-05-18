<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        @include('head')

        <title>Parking Lot Challenge</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    </head>
    <body>
        <div class="hero">
            <div class="hero-content">
                <h1 class="hero-lead">Parkinglotly.io</h1>
                <h2 class="hero-sub">An app created by: Margaret Tavares</h2>
                <a href="{{ url('/tickets') }}" class="hero-buttons">Enter Lot</a>
                @if ($availableSpaces == 0)
                    <a href="{{ url('/waitList') }}" class="hero-buttons">Wait List</a>
                @endif
                @if ($availableSpaces <= 4)
                    <a href="{{ url('/index') }}" class="hero-buttons">Exit Lot</a>
                @endif
            </div>
        </div>
    </body>
</html>
