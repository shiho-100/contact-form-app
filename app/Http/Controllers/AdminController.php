<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::query();

        if ($request->keyword) {
            $contacts->where(function ($query) use ($request) {
                $query->where('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if ($request->gender && $request->gender != 0) {
            $contacts->where('gender', $request->gender);
        }

        if ($request->category_id) {
            $contacts->where('category_id', $request->category_id);
        }

        if ($request->date) {
            $contacts->whereDate('created_at', $request->date);
        }

        $contacts = $contacts->paginate(7);

        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));

    }

    public function show(Contact $contact)
    {
        return view('admin.show', compact('contact'));
    }
}
