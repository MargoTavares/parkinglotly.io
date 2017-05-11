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
            <td>Paid?</td>
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
                                {{ Form::submit('Yes') }}
                            @else
                                {{ Form::submit('No') }}
                            @endif
                    {{ Form::close() }}
                </td>
                <td>{{ Form::open([
                            'route' => [
                                'ticket.destroy',
                                $value->id
                            ],
                            'method' => 'delete'
                        ])
                    }}
                        {{ Form::submit('Pay') }}
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
    <a href="/"><button>Return To Home Page</button></a>
</body>
</html>
