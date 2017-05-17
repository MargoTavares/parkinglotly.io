 <h1>Edit Ticket #{{ $ticket->id }}</h1>
    @include('errors')

    <p>Edit the following information:</p>
    {{ Form::model($ticket, array('route' => array('ticket.update',
            $ticket->id), 'method' => 'PUT')) }}
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
        {{ Form::submit('Save Changes') }}
    {{ Form::close() }}
