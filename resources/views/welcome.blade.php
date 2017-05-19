<!doctype html>
<html lang="{{ config('app.locale') }}">
        @include('head')
    <body>
        <div class="hero">
            <div class="hero-content">
                <h1 class="hero-lead">Parkinglotly.io</h1>
                <h2 class="hero-sub">An app created by: Margaret Tavares</h2>
                @if ($availableSpaces == 0)
                    <div class="hero-sub-waitlist">
                        There is currently a waitlist. To join, enter the parking lot now.
                    </div>
                @endif
                <a href="{{ url('/tickets') }}" class="hero-buttons">Enter Lot</a>
                @if ($availableSpaces <= 4)
                    <a href="{{ url('/index') }}" class="hero-buttons">Exit Lot</a>
                @endif
            </div>
        </div>
    </body>
</html>
