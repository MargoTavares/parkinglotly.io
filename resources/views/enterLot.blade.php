<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('head')
    <title>Purchase Ticket</title>

</head>
<body>
    <div class="hero-enterLot">
        <div class="hero-content">
            @if(Request::is('*/*/edit'))
                @include('edit')
            @else
                <h1 class="hero-load-enterLot">Welcome to parkinglotly.io</h1>
                <h2 class="hero-sub">A Premium Parking Service</h2>

                @include('errors')

                @if ($availableSpaces != 0)
                    @include('available')
                @elseif($availableSpaces == 0)
                    @include('unavailable')
                @endif
            @endif
        </div>
    </div>
</body>
</html>
