<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Add New Contact</h2>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
    
        <div class="mb-3">
            <label class="form-label">First Name:</label>
            <input type="text" name="first_name" class="form-control" placeholder="Enter First Name">
        </div>
        <div class="mb-3">
            <label class="form-label">Last Name:</label>
            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name">
        </div>
        <div class="mb-3">
            <label class="form-label">Middle Name (Optional):</label>
            <input type="text" name="middle_name" class="form-control" placeholder="Enter Middle Name">
        </div>

        <div class="mb-3">
            <label class="form-label">Phone:</label>
            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number">
        </div>

        <div class="mb-3">
            <label class="form-label">Address:</label>
            <input type="address" name="address" class="form-control" placeholder="Enter Address">
        </div>

        <button type="submit" class="btn btn-primary">Save Contact</button>
        <a class="btn btn-secondary" href="{{ route('contacts.index') }}">Back</a>
    </form>
</div>
</body>
</html>