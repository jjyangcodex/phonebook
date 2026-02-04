<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Phonebook Directory</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container mt-5">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Phonebook Directory</h2>

                <div class="d-flex gap-2">
                    <a class="btn btn-success" href="{{ route('contacts.create') }}">Add New Contact</a>
                    <form method="GET" action="{{ route('contacts.index') }}">
                        <input type="text" name="search" placeholder="Search..." value="{{ $search }}" />
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>

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
        </div>
    </body>
</html>
