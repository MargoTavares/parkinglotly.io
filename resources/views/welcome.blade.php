<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Parking Lot Challenge</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/margoStyle.css" type="text/css">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Vehikl's Parking Lot Challenge
                </div>

                <div class="links">
                    <a href="{{ url('/tickets') }}">Enter Lot</a>
                    <a href="{{ url('/index') }}">Ticket Listing</a>
                    <a href="{{ url('/waitList') }}">Wait List</a>
                    <a href="{{ url('/exit') }}">Exit Lot</a>
                </div>
            </div>
        </div>
    </body>
</html>
