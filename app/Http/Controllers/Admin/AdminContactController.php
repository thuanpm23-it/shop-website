<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Contact";
        $viewData["contacts"] = Contact::all();
        return view('admin.contact.index')->with("viewData", $viewData);
    }

    public function delete($id)
    {
        Contact::destroy($id);
        return back();
    }
}
