<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Vehicle</title>
</head>
<body>
    <h1>Add New Vehicle</h1>
    <a href="{{ route('vehicles.index') }}">Back</a>

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Type:</label>
        <input type="text" name="type" value="{{ old('type') }}"><br><br>

        <label>Registration Number:</label>
        <input type="text" name="registration_number" value="{{ old('registration_number') }}"><br><br>

        <label>Capacity:</label>
        <input type="number" name="capacity" value="{{ old('capacity') }}"><br><br>

        <button type="submit">Add Vehicle</button>
    </form>
</body>
</html>
