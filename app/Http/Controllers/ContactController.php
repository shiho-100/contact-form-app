<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;

class ContactController extends Controller

{
    public function index()
    {
        $categories = Category::all();

        return view('contact.index', compact('categories'));
    }

    public function confirm(StoreContactRequest $request)
    {
        $validated = $request->validated();

        return view('contact.confirm', compact('validated'));
    }

    public function store(StoreContactRequest $request)
    {
        $validated = $request->validated();

        Contact::create($validated);

        return view('contact.thanks');

    }
}
