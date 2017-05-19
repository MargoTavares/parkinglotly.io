<p>Please enter the following information:</p>

{{ Form::open(array('action' => 'WaitListController@store')) }}

<span class="tickets-label">
    {{ Form::label('titleFirstName', 'First Name:') }}
</span>

{{ Form::text('firstName') }}<br>

<span class="tickets-label">
    {{ Form::label('titleLastName', 'Last Name:') }}
</span>

{{ Form::text('lastName') }}<br>

<span class="tickets-label">
    {{ Form::label('titleEmail', 'Email:') }}
</span>

{{ Form::text('email') }}<br><br>
{{ Form::submit('Email me', array('class' => 'hero-buttons-submit')) }}
{{ Form::close() }}