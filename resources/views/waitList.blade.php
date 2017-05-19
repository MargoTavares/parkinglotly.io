<!doctype html>
<html lang="{{ config('app.locale') }}">
@include('head')
<body>
    <div class="hero-enterLot">
        <div class="hero-content">
            <h1 class="hero-load-enterLot">Parkinglotly.io WaitList</h1>
            <br>
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <br>
            @if($tickets->count() > 4)
                @include('waitListTable')
            @else
                There is currently no one on the wait list.
            @endif
            <p><a href="/" class="hero-buttons-submit">Home</a></p>

        </div>
    </div>
</body>
</html>
