<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;


class AdminProductController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin Product";
        $viewData["products"] = Product::all();
        return view('admin.product')->with("viewData", $viewData);
    }
    public function new()
    {
        $viewData = [];
        $viewData["title"] = "Admin Add Product";
        return view('admin.new')->with("viewData", $viewData);
    }
    public function add(Request $request)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            "category" => "required|max:255",
            'image' => 'image',
        ]);
        $newProduct = new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setCategory($request->input('category'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setImage("");
        $newProduct->save();

        if ($request->hasFile('image')) {
            $imageName = $newProduct->getId() . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newProduct->setImage($imageName);
            $newProduct->save();
        }

        return redirect()->route('admin.product');
    }
    public function delete($id)
    {
        Product::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $viewData = [];
        $viewData["title"] = "Admin Edit Product";
        $viewData["product"] = Product::findOrFail($id);
        return view('admin.edit')->with("viewData", $viewData);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|max:255",
            "description" => "required",
            "price" => "required|numeric|gt:0",
            "category" => "required|max:255",
            'image' => 'image',
        ]);
        $product = Product::findOrFail($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setPrice($request->input('price'));
        $product->setCategory($request->input('category'));
        if ($request->hasFile('image')) {
            $imageName = $product->getId() . "." . $request->file('image')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        }
        $product->save();
        return redirect()->route('admin.product');
    }
}
