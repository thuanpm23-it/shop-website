<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class AdminNewsletterController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin User";
        $viewData["news"] = Newsletter::all();
        return view('admin.news.index')->with("viewData", $viewData);
    }
}
