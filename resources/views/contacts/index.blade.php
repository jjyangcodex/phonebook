@extends('layout.header')
@section('content')
    <div class="container mt-5 bg-light p-4 rounded">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Contact List</h2>

            <div class="d-flex gap-2">
                <a class="btn btn-success" href="{{ route('contacts.create') }}">Add New Contact</a>
            </div>
        </div>
        <div class="mb-3">
            <form action="{{ route('contacts.index') }}" method="GET" class="d-flex">
                <input
                    type="text"
                    name="search"
                    class="form-control me-2"
                    placeholder="Search by First or Last Name"
                    value="{{ request('search') }}"
                />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
        <div class="mb-3">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Middle Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th width="200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->first_name }}</td>
                            <td>{{ $contact->last_name }}</td>
                            <td>{{ $contact->middle_name }}</td>
                            <td>{{ $contact->phone }}</td>
                            <td>{{ $contact->address }}</td>
                            <td>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                                    <a
                                        class="btn btn-primary btn-sm"
                                        href="{{ route('contacts.edit', $contact->id) }}"
                                    >
                                        Edit
                                    </a>

                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?');"
                                    >
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center mt-3">
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
@endsection
