@extends('layout.header')
@section('content')
    <div class="container mt-5">
        <h2>Edit Contact</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.update', $contacts->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">First Name:</label>
                <input
                    type="text"
                    name="first_name"
                    class="form-control"
                    placeholder="Enter First Name"
                    value="{{ $contacts->first_name }}"
                />
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name:</label>
                <input
                    type="text"
                    name="last_name"
                    class="form-control"
                    placeholder="Enter Last Name"
                    value="{{ $contacts->last_name }}"
                />
            </div>
            <div class="mb-3">
                <label class="form-label">Middle Name (Optional):</label>
                <input
                    type="text"
                    name="middle_name"
                    class="form-control"
                    placeholder="Enter Middle Name"
                    value="{{ $contacts->middle_name }}"
                />
            </div>

            <div class="mb-3">
                <label class="form-label">Phone:</label>
                <input
                    type="text"
                    name="phone"
                    class="form-control"
                    placeholder="Enter Phone Number"
                    value="{{ $contacts->phone }}"
                />
            </div>

            <div class="mb-3">
                <label class="form-label">Address:</label>
                <input
                    type="address"
                    name="address"
                    class="form-control"
                    placeholder="Enter Address"
                    value="{{ $contacts->address }}"
                />
            </div>

            <button type="submit" class="btn btn-primary">Update Contact</button>
            <a class="btn btn-secondary" href="{{ route('contacts.index') }}">Back</a>
        </form>
    </div>
@endsection
