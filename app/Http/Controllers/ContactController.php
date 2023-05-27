<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Contact";
        return view('contact.index')->with("viewData", $viewData);
    }

    public function contact(Request $request)
    {
        $contact = new Contact();
        $contact->email = $request->input('email');
        $contact->message = $request->input('message');
        $contact->save();
        return redirect()->route('contact.index');
    }
}
