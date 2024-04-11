<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;

class ContactController extends Controller
{
    public function contact()
    {
        $conData = ContactForm::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.pages.contact.contacts', ['conData' => $conData]);
    }

    public function viewContact($id)
    {
        $contact = ContactForm::where('id', '=', $id)->first();
        return view('admin.pages.contact.view-contact', ['con' => $contact]);
    }
}
