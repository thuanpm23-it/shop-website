<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{

    public function newsletter(Request $request)
    {
        $newsletter = new Newsletter();
        $newsletter->email = $request->input('email');
        $newsletter->save();
        return redirect()->route('home.index');
    }
}
