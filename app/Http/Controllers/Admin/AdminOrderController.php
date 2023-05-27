<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin User";
        $viewData["order"] = Order::all();
        return view('admin.order.index')->with("viewData", $viewData);
    }
}
