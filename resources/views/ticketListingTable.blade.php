<table>
    <thead>
        <td>Ticket ID</td>
        <td>Name</td>
        <td>License</td>
        <td>Rate Time</td>
        <td>Rate Price</td>
        <td>Status</td>
        <td colspan="2">Options</td>
    </thead>
    <tbody>
        @foreach($tickets as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->name }}</td>
                <td class="caps">{{ $value->licensePlate }}</td>
                <td>
                    @if($value->rateTime == "ALL DAY")
                        ALL DAY
                    @elseif($value->rateTime > 1)
                        {{ $value->rateTime }} hrs
                    @elseif($value->rateTime == 1)
                        {{ $value->rateTime }} hr
                    @endif
                </td>
                <td>
                    ${{ number_format($prices[$value->rateTime] / 100, 2) }}
                </td>
                <td>
                    {{ Form::open([
                            'route' => [
                                'ticket.mark-paid',
                                $value->id
                            ],
                            'method' => 'put'
                        ])
                    }}
                    {{ Form::hidden ('is_valid', $value->is_valid) }}
                    @if($value->is_valid)
                        {{ Form::submit('Paid') }}
                    @else
                        {{ Form::submit('Not Paid') }}
                    @endif
                    {{ Form::close() }}
                </td>
                <td>
                    {{ Form::open([
                            'route' => [
                                'ticket.destroy',
                                $value->id
                            ],
                            'method' => 'delete'
                        ])
                    }}
                    {{ Form::submit('Exit Lot') }}
                    {{ Form::close() }}
                </td>
                <td>
                    {{ Form::open([
                            'route' => [
                                'ticket.edit',
                                $value->id
                             ],
                             'method' => 'get'
                        ])
                    }}
                    {{ Form::submit('Edit') }}
                    {{ Form::close() }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>