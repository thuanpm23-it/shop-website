<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class AdminUserController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin User";
        $viewData["users"] = User::all();
        return view('admin.user.index')->with("viewData", $viewData);
    }
}
