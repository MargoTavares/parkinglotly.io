<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ticket Listing</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/margoStyle.css" type="text/css">

    <style>
        table {
            border-collapse: collapse;
            width: 90%;
        }
        table, th {
            font-weight: 300;
            color: black;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
        }
        html {
            margin-left: 5vh;
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
    <h1>Members of Vehikl's Parking Lot</h1>
    @if (Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    <br>
    @if (count($errors) > 0)
        <div class="alert alert-danger error">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <table>
        <thead>
            <td>Ticket ID</td>
            <td>Name</td>
            <td>License</td>
            <td>Rate Time</td>
            <td>Rate Price</td>
            <td>Status</td>
            <td colspan="2">Options</td>
        </thead>
        <tbody>
        @foreach($tickets as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->licensePlate }}</td>
                <td>
                    @if($value->rateTime == 9)
                        ALL DAY
                    @elseif($value->rateTime > 1)
                        {{ $value->rateTime }} hrs
                    @elseif($value->rateTime == 1)
                        {{ $value->rateTime }} hr
                    @endif
                </td>
                <td>
                    ${{ number_format($prices[$value->rateTime] / 100, 2) }}
                </td>
                <td>
                    {{
                        Form::open([
                            'route' => [
                                'ticket.mark-paid',
                                $value->id
                            ],
                            'method' => 'put'
                        ])
                     }}
                        {{ Form::hidden ('is_valid', $value->is_valid) }}
                            @if($value->is_valid)
                                {{ Form::submit('Paid') }}
                            @else
                                {{ Form::submit('Not Paid') }}
                            @endif
                    {{ Form::close() }}
                </td>
                <td>
                    {{ Form::open([
                            'route' => [
                                'ticket.destroy',
                                $value->id
                            ],
                            'method' => 'delete'
                        ])
                    }}
                        {{ Form::submit('Exit Lot') }}
                    {{ Form::close() }}
                </td>
                <td>
                    {{ Form::open([
                            'route' => [
                                'ticket.edit',
                                $value->id
                             ],
                             'method' => 'get'
                        ])
                    }}
                    {{ Form::submit('Edit') }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <a href="/"><button>Return To Home Page</button></a>
</body>
</html>
