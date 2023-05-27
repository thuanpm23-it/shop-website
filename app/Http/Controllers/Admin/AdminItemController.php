<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;

class AdminItemController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin User";
        $viewData["items"] = Item::all();
        return view('admin.item.index')->with("viewData", $viewData);
    }
}
