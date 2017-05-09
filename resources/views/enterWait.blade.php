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
            margin: 0;
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

        .error {
            color: red;
        }

    </style>
</head>
<body>
<h1>Welcome to Vehikl's Parking Lot WaitList</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger error">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<p>Please enter the following information:</p>
{{ Form::open(array('action' => 'WaitListController@store')) }}

{{ Form::label('titleFirstName', 'First Name:') }}
{{ Form::text('firstName') }}<br>
{{ Form::label('titleLastName', 'Last Name:') }}
{{ Form::text('lastName') }}<br>
{{ Form::label('titleEmail', 'Email:') }}
{{ Form::text('email') }}<br>


<br>
{{ Form::submit() }}
{{ Form::close() }}
</body>
</html>
