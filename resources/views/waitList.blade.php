<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('head')

    <title>Waitlist</title>

    <style>
        html {
            margin-left: 5vh;
        }

        table {
            border-collapse: collapse;
            width: 80%;
        }
        table, th {
            font-weight: 300;
            color: black;
        }
        table, th, td {
            border: 1px solid black;
            padding: 5px;
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
    <p><a href="/"><button>Return To Home Page</button></a></p>

</body>
</html>
