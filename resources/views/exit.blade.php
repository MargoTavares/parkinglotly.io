<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Exit Parking Lot</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/margoStyle.css" type="text/css">

</head>
<body>
    <h2>Please enter the id of the ticket you would like to pay:</h2>
        {{ Form::open
            ([
                'route' =>
                    [
                        'ticket.edit',
                        $value->id
                    ],
                'method' => 'get'
            ])
        }}
        {{ Form::close() }}
    <a href="/"><button>Return To Home Page</button></a>

</body>
</html>
