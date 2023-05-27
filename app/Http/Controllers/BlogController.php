<?php

namespace App\Http\Controllers;

use App\Models\Blog;


class BlogController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Home";
        $viewData["blogs"] = Blog::all();
        return view('blog.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $blog = Blog::findOrFail($id);
        $viewData["title"] = "Blog";
        $viewData["blog"] = $blog;
        $viewData["blogs"] = Blog::all();
        return view('blog.show')->with("viewData", $viewData);
    }
}
