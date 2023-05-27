<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public $results;
    public function search(Request $request)
    {
        $query = $request->input('q');
        $this->results = Product::where('name', 'like', '%' . $query . '%')->get();
        $viewData["title"] = "Shop";
        $viewData["products"] = $this->results;
        return view('product.index')->with("viewData", $viewData);
    }
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = "Shop";
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        if ($minPrice && $maxPrice) {
            $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();
        } else {
            $products = Product::all();
        }
        $viewData["products"] = $products;
        return view('product.index')->with("viewData", $viewData);
    }
    public function show($id)
    {
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product->getName() . " - Product Details";
        $viewData["product"] = $product;
        $viewData["products"] = Product::all();
        return view('product.show')->with("viewData", $viewData);
    }

    public function desc()
    {
        $viewData = [];
        $viewData["title"] = "Shop";
        $viewData["products"] = Product::orderBy('price', 'desc')->get();
        return view('product.index')->with("viewData", $viewData);
    }
    public function asc()
    {
        $viewData = [];
        $viewData["title"] = "Shop";
        $viewData["products"] = Product::orderBy('price', 'asc')->get();
        return view('product.index')->with("viewData", $viewData);
    }

    public function newness()
    {
        $viewData = [];
        $viewData["title"] = "Shop";
        $viewData["products"] = Product::orderBy('created_at', 'desc')->get();
        return view('product.index')->with("viewData", $viewData);
    }
}
