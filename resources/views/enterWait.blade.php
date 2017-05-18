<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>Waitlist Entry</title>
    @include('head')
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
        {{ Form::text('email') }}<br><br>
        {{ Form::submit() }}
    {{ Form::close() }}
</body>
</html>
