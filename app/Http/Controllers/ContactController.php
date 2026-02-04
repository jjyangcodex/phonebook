<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $contacts = Contact::when($search, function ($query, $search) {
            $query->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
        })
        ->latest()
        ->get();

        return view('contacts.index', compact('contacts','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'middle_name' => 'nullable|string',
        'phone' => 'required|string|unique:contacts,phone',
        'address' => 'required|string']);

        $contacts = Contact::create($validated);

        return redirect()->route('contacts.index')->with('Success','Contact Created');
    }

    public function edit(string $id)
    {
        $contacts = Contact::findOrFail($id);

        return view('contacts.edit', compact('contacts'));
    }


    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'middle_name' => 'nullable|string',
        'phone' => 'required|string|unique:contacts,phone,' . $id,
        'address' => 'required|string']);

        Contact::findOrFail($id)->update($validated);

        return redirect()->route('contacts.index')->with('Success','Contact Updated');
    }

    public function destroy(string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->deleteOrFail();

        return redirect()->route('contacts.index')->with('Success', 'Contact Deleted');

    }
}
