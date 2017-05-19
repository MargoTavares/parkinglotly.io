<!doctype html>
<html lang="{{ config('app.locale') }}">

@include('HTMLDefault.head')

<body>
    <div class="hero-enterLot">
        <div class="hero-content">
            <h1 class="hero-load-enterLot">Members of Vehikl's Parking Lot</h1>
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <br>
                @include('HTMLDefault.errors')
                @include('Table.ticketListingTable')
            <br>
            <a href="/" class="hero-buttons-submit">Home</a>
        </div>
    </div>
</body>
</html>
