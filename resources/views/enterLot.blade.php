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
        html {
            margin-left: 5vh;
        }

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

        @if (count($errors) > 0)
            <div class="alert alert-danger error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if ($availableSpaces != 0)
            @if ($availableSpaces > 1)
                <p>There are {{ $availableSpaces }} parking spaces out of {{ $totalSpaces }} available.</p>
            @elseif ($availableSpaces == 1)
                <p>There is {{ $availableSpaces }} parking space out of {{ $totalSpaces }} available.</p>
            @endif
            <p>Please enter the following information:</p>
            {{ Form::open(array('action' => 'TicketController@store')) }}
                {{ Form::label('titleName', 'Name:') }}
                {{ Form::text('name') }}<br>
                {{ Form::label('titleLicensePlate', 'License Plate #:') }}
                {{ Form::text('licensePlate') }}<br>
                {{ Form::label('titleTime', 'Choose Desired Time:') }}
                {{ Form::select('rateTime',
                    [
                        1 => '1hr',
                        3 => '3hr',
                        6 => '6hr',
                        'ALL DAY' => 'ALL DAY'
                    ])
                }}<br><br>
                {{ Form::submit() }}
            {{ Form::close() }}
        @elseif($availableSpaces == 0)
            <p>Parking Lot is full.</p>
            <p>Let us notify you when a parking space becomes available by clicking the button below:</p>
            <a href="/waitList/create">
                <button>Notify Me</button>
            </a>
        @endif
    @endif
</body>
</html>
