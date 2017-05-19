<table>
    <thead>
        <td>#</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Email</td>
    </thead>
    <tbody>
    @foreach($waitList as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->firstName }}</td>
            <td>{{ $value->lastName }}</td>
            <td>{{ $value->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>