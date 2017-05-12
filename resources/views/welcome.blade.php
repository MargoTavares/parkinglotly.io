<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Parking Lot Challenge</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/margoStyle.css" type="text/css">

        <style>
            .m-b-md {
                color: #000;
            }
            img {
                width: 30%;
                height: 10%;
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
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    <img src="/img/vehikl_blog_logo.png">
                    <br>
                    Parking Lot Challenge
                </div>

                <div class="links">
                    <a href="{{ url('/tickets') }}"><button>Enter Lot</button></a>
                    <a href="{{ url('/waitList') }}"><button>Wait List</button></a>
                    <a href="{{ url('/index') }}"><button>Exit Lot</button></a>
                </div>
            </div>
        </div>
    </body>
</html>
