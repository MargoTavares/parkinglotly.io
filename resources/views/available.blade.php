@if ($availableSpaces > 1)
    <p>There are {{ $availableSpaces }} parking spaces out of {{ $totalSpaces }} available.</p>
@elseif ($availableSpaces == 1)
    <p>There is {{ $availableSpaces }} parking space out of {{ $totalSpaces }} available.</p>
@endif

<p>Please enter the following information:</p>
{{ Form::open(array('action' => 'TicketController@store')) }}
{{ Form::label('titleName', 'Name:') }}
{{ Form::text('name') }}<br>
{{ Form::label('titleLicensePlate', 'License Plate #:') }}
{{ Form::text('licensePlate') }}<br>
{{ Form::label('titleTime', 'Choose Desired Time:') }}
{{ Form::select('rateTime',
    [
        1 => '1hr',
        3 => '3hr',
        6 => '6hr',
        'ALL DAY' => 'ALL DAY'
    ])
}}<br><br>
{{ Form::submit() }}
{{ Form::close() }}


