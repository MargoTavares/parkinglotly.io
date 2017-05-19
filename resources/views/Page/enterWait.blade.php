<!doctype html>
<html lang="{{ config('app.locale') }}">

@include('HTMLDefault.head')

</body>
    <div class="hero-enterLot">
        <div class="hero-content">
            <h1 class="hero-load-enterLot">Parkinglotly.io WaitList</h1>

            @include('HTMLDefault.errors')
            @include('Form.waitListForm')

        </div>
    </div>
</body>
</html>
