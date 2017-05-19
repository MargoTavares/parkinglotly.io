<!doctype html>
<html lang="{{ config('app.locale') }}">

@include('head')

</body>
    <div class="hero-enterLot">
        <div class="hero-content">
            <h1 class="hero-load-enterLot">Parkinglotly.io WaitList</h1>

            @include('errors')
            @include('waitListForm')

        </div>
    </div>
</body>
</html>
