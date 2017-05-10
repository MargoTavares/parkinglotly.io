<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Waitlist</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/margoStyle.css" type="text/css">
</head>
<body>

    <h1>Welcome to Vehikl's Parking Lot WaitList</h1>
    @if($tickets->count() > 4)
        <table>
            <thead>
                <td>First Name</td>
                <td>Last Name</td>
                <td>Email</td>
            </thead>
            <tbody>
                @foreach($waitList as $key => $value)
                    <tr>
                        <td>{{ $value->firstName }}</td>
                        <td>{{ $value->lastName }}</td>
                        <td>{{ $value->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <p>You will receive an email once a spot becomes available.</p>
    @else
        There is currently no one on the wait list.
    @endif
    <a href="/"><button>Return To Home Page</button></a>

</body>
</html>
