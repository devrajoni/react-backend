<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();

        return view('admin.notification.index', compact('contacts'));

    }
}
