@if ($availableSpaces > 1)
    <p>There are {{ $availableSpaces }} parking spaces out of {{ $totalSpaces }} available.</p>
@elseif ($availableSpaces == 1)
    <p>There is {{ $availableSpaces }} parking space out of {{ $totalSpaces }} available.</p>
@endif

<p>Please enter the following information:</p>
{{ Form::open(array('action' => 'TicketController@store')) }}
<span class="tickets-label">
    {{ Form::label('titleName', 'Name:') }}
</span>
    {{ Form::text('name') }}<br>
<span class="tickets-label">
    {{ Form::label('titleLicensePlate', 'License Plate #:') }}
</span>
    {{ Form::text('licensePlate') }}<br>
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
    {{ Form::submit('Submit', array('class' => 'hero-buttons-submit')) }}
{{ Form::close() }}


