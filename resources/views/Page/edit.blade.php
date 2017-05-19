<h1 class="hero-load-enterLot">Edit Ticket #{{ $ticket->id }}</h1>
    @include('HTMLDefault.errors')

    <p>Edit the following information:</p>
    {{ Form::model($ticket, array('route' => array('ticket.update',
            $ticket->id), 'method' => 'PUT')) }}
    <span class="tickets-label">
        {{ Form::label('titleName', 'Name:') }}
    </span>
        {{ Form::text('name', $ticket->name) }}<br>
    <span class="tickets-label">
        {{ Form::label('titleLicensePlate', 'License Plate #:') }}
    </span>
        {{ Form::text('licensePlate', $ticket->licensePlate) }}<br>
    <span class="tickets-label">
        {{ Form::label('titleTime', 'Choose Desired Time:') }}
    </span>
        {{ Form::select('rateTime',
            [
                1 => '1hr',
                3 => '3hr',
                6 => '6hr',
                'ALL DAY' => 'ALL DAY'
            ], null, ['class' => 'tickets-select'])
        }}
    <br><br>
        {{ Form::submit('Save Changes', array('class' => 'hero-buttons-submit')) }}
    {{ Form::close() }}
