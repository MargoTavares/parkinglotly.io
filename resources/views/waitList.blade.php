<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('head')

    <title>Waitlist</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/margoStyle.css" type="text/css">
</head>
<body>
<div class="hero-enterLot">
    <div class="hero-content">
        <h1 class="hero-load-enterLot">Parkinglotly.io WaitList</h1>
        <br>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <br>
        @if($tickets->count() > 4)
            <table>
                <thead>
                <td>#</td>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
                </thead>
                <tbody>
                @foreach($waitList as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->firstName }}</td>
                        <td>{{ $value->lastName }}</td>
                        <td>{{ $value->email }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @else
            There is currently no one on the wait list.
        @endif
        <p><a href="/" class="hero-buttons-submit">Home</a></p>

    </div>
</div>

</body>
</html>
