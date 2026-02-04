<header>
    <nav style="background:#f8fafc;padding:0.75rem 1rem;border-bottom:1px solid #e5e7eb;">
        <div style="max-width:1100px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:1rem;">
            <div>
                <a href="{{ url('/contacts') }}" style="font-weight:600;color:#111827;text-decoration:none;font-size:1.1rem;">Phonebook</a>
            </div>

            <div style="display:flex;align-items:center;gap:0.75rem;">
                <a href="{{ route('contacts.index') }}" style="color:#374151;text-decoration:none;">Contacts</a>
                <a href="{{ route('contacts.create') }}" style="color:#374151;text-decoration:none;">Add Contact</a>

                <form action="{{ route('contacts.index') }}" method="GET" style="display:flex;align-items:center;gap:0.5rem;margin-left:0.5rem;">
                    <input name="search" type="search" value="{{ request('search') }}" placeholder="Search by name" style="padding:0.45rem 0.6rem;border:1px solid #d1d5db;border-radius:6px;">
                    <button type="submit" style="padding:0.45rem 0.6rem;background:#2563eb;color:white;border:none;border-radius:6px;">Search</button>
                </form>
            </div>
        </div>
    </nav>
</header>
