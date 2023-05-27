<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class AdminBlogController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Blog";
        $viewData["blogs"] = Blog::all();
        return view('admin.blog.index')->with("viewData", $viewData);
    }
    public function new()
    {
        $viewData = [];
        $viewData["title"] = "Admin Add Blog";
        return view('admin.blog.new')->with("viewData", $viewData);
    }
    public function add(Request $request)
    {
        $request->validate([
            "title" => "required|max:255",
            'image' => 'image',
            "shortDesc" => "required",
            "longDesc" => "required",
        ]);
        $newBlog = new Blog();
        $newBlog->setTitle($request->input('title'));
        $newBlog->setShortDesc($request->input('shortDesc'));
        $newBlog->setLongDesc($request->input('longDesc'));
        $newBlog->setImage("");
        $newBlog->save();

        if ($request->hasFile('image')) {
            $imageName = $newBlog->getId() . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newBlog->setImage($imageName);
            $newBlog->save();
        }

        return redirect()->route('admin.blog.index');
    }
    public function delete($id)
    {
        Blog::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Edit Blog";
        $viewData["blog"] = Blog::findOrFail($id);
        return view('admin.blog.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|max:255",
            'image' => 'image',
            "shortDesc" => "required",
            "longDesc" => "required",
        ]);
        $newBlog = Blog::findOrFail($id);
        $newBlog->setTitle($request->input('title'));
        $newBlog->setShortDesc($request->input('shortDesc'));
        $newBlog->setLongDesc($request->input('longDesc'));
        if ($request->hasFile('image')) {
            $imageName = $newBlog->getId() . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newBlog->setImage($imageName);
            $newBlog->save();
        }
        $newBlog->save();
        return redirect()->route('admin.blog.index');
    }
}
