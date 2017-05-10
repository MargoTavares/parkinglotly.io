 <h1>Edit</h1>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <p>Edit the following information:</p>
    {{ Form::open() }}
        {{ Form::label('titleName', 'Name:') }}
        {{ Form::text('name', $ticket->name) }}<br>
        {{ Form::label('titleLicensePlate', 'License Plate #:') }}
        {{ Form::text('licensePlate', $ticket->licensePlate) }}<br>
        {{ Form::label('titleTime', 'Choose Desired Time:') }}
        {{ Form::select('rateTime',
            [
                1 => '1hr',
                3 => '3hr',
                6 => '6hr',
                9 => 'ALL DAY'
            ])
        }}
        <br>
        {{ Form::submit() }}
    {{ Form::close() }}
