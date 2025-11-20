<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Vehicles</title>
</head>
<body>
    <h1>All Vehicles</h1>

    @if(session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('vehicles.create') }}">Add New Vehicle</a>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Registration Number</th>
            <th>Capacity</th>
            <th>Actions</th>
        </tr>
        @foreach($vehicles as $vehicle)
        <tr>
            <td>{{ $vehicle->id }}</td>
            <td>{{ $vehicle->name }}</td>
            <td>{{ $vehicle->type }}</td>
            <td>{{ $vehicle->registration_number }}</td>
            <td>{{ $vehicle->capacity }}</td>
            <td>
                <a href="{{ route('vehicles.edit', $vehicle->id) }}">Edit</a>
                <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this vehicle?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
