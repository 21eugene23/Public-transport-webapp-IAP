<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Vehicle</title>
</head>
<body>
    <h1>Edit Vehicle</h1>
    <a href="{{ route('vehicles.index') }}">Back</a>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $vehicle->name) }}"><br><br>

        <label>Type:</label>
        <input type="text" name="type" value="{{ old('type', $vehicle->type) }}"><br><br>

        <label>Registration Number:</label>
        <input type="text" name="registration_number" value="{{ old('registration_number', $vehicle->registration_number) }}"><br><br>

        <label>Capacity:</label>
        <input type="number" name="capacity" value="{{ old('capacity', $vehicle->capacity) }}"><br><br>

        <button type="submit">Update Vehicle</button>
    </form>
</body>
</html>
