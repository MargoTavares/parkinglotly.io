<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Parking Lot Challenge</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/margoStyle.css" type="text/css">
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
