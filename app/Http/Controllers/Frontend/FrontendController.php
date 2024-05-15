<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;

class FrontendController extends Controller
{
    public function index()
    {

        $category = Category::select('id', 'name')->latest()->get();
        $product = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->latest()->get();

        // dd($product);

        return view('pages.frontend.index2',compact('category','product'));
    }
}
