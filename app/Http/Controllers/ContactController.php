<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $contact = ContactMessage::create($request->only('name', 'email', 'message'));

        return response()->json(['message' => 'Message sent successfully.', 'id' => $contact->id], 201);
    }
}
