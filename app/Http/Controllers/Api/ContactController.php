<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ContactForm;

class ContactController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => [
                'required',
                'max:255',
            ],
            'last_name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'max:255',
            ],
            'subject' => [
                'required',
                'max:255',
            ],
            'message' => [
                'nullable',
            ],
        ]);

        $data = Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        try {
            Notification::route('mail', 'rajoniakter.dev@gmail.com')->notify(
                new ContactForm($request->all())
            );
        } catch (\Exception $e) {
            // dd($e->getMessage());

            

            return;
        }

        return response()->JSON([
            'data' => $data,
            'success' => true,
        ], 201);
    }
}
