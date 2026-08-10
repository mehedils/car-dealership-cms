<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'car_id'  => ['nullable', 'exists:cars,id'],
            'name'    => ['required', 'string', 'max:255'],
            'email'   => ['nullable', 'email', 'max:255'],
            'phone'   => ['required', 'string', 'max:50'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        if (empty($validated['message'])) {
            $validated['message'] = 'Callback / Test Drive Request from Hero Section';
        }

        Inquiry::create($validated);

        return back()->with('success', 'Thank you! Your inquiry has been sent to our sales team.');
    }
}
