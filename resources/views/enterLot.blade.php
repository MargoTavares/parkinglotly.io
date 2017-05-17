<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Purchase Ticket</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/margoStyle.css" type="text/css">

    <style>
        input {
            border-radius: 12px;
            background-color: white;
            transition-duration: 0.4s;
        }

        input:hover {
            border-color: #EE783D;
        }

        button {
            border-radius: 12px;
            background-color: white;
            transition-duration: 0.4s;
        }

        button:hover {
            border-color: #EE783D;
        }
    </style>

</head>
<body>
    @if(Request::is('*/*/edit'))
        @include('edit')
    @else
        <h1>Welcome to Vehikl's Parking Lot</h1>

        @include('errors')

        @if ($availableSpaces != 0)
            @include('available')
        @elseif($availableSpaces == 0)
            @include('unavailable')
        @endif
    @endif
</body>
</html>
