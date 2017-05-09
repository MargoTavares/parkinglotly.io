<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin-right : 1vh;
        }

        thead {
            font-weight: bold;
        }

        td {
            padding-left: 1vh;
            padding-right: 1vh;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>
<body>
    <h1>Members of Vehikl's Parking Lot</h1>
    <table>
        <thead>
            <td>Name</td>
            <td>License</td>
            <td>Rate Time</td>
            <td>Rate Price</td>
        </thead>
        <tbody>
        @foreach($tickets as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->licensePlate }}</td>
                <td>
                    @if($value->rateTime > 1)
                        {{ $value->rateTime }} hrs
                    @elseif($value->rateTime == 1)
                        {{ $value->rateTime }} hr
                    @elseif($value->rateTime == 'ALL DAY')
                        ALL DAY
                    @endif
                </td>
                <td>
                    ${{ number_format($prices[$value->rateTime] / 100, 2) }}
                </td>
                <td>
                    {{
                        Form::open([
                            'route' => [
                                'ticket.update',
                                $value->id
                             ],
                            'method' => 'put'
                        ])
                     }}
                        {{ Form::hidden ('is_valid', $value->is_valid) }}
                            @if($value->is_valid)
                                {{ Form::submit('Validate') }}
                            @else
                                {{ Form::submit('Invalidate') }}
                            @endif
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="/"><button>Return To Home Page</button></a>
</body>
</html>
