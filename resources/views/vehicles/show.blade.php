<!DOCTYPE html>
<html>
<head>
    <title>Vehicle Details</title>
</head>
<body>
    <h1>Vehicle Details</h1>

    <p><strong>Name:</strong> {{ $vehicle->name }}</p>
    <p><strong>Type:</strong> {{ $vehicle->type }}</p>
    <p><strong>Registration Number:</strong> {{ $vehicle->registration_number }}</p>
    <p><strong>Seats:</strong> {{ $vehicle->seats }}</p>

    <a href="{{ route('vehicles.index') }}">Back to list</a>
</body>
</html>
