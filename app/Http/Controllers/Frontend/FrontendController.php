<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {

        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->latest()->limit(8)->get();

        // dd($product);

        return view('pages.frontend.index2', compact('category', 'product'));
    }

    public function detailProduct($slug)
    {
        $category = Category::select('id', 'name')->latest()->get();
        $product = Product::with('product_galleries')->where('slug', $slug)->first();
        $recomendation = Product::with('product_galleries')->select('id', 'name', 'slug', 'price')->inRandomOrder()->limit(4)->get();
        return view('pages.frontend.detailProduct', compact('product', 'category', 'recomendation'));
    }
    public function detailCategory($slug)
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $categories = Category::where('slug', $slug)->first();
        $product = Product::with('product_galleries')->where('category_id', $categories->id)->latest()->get();
        return view('pages.frontend.detailCategory', compact('category', 'categories', 'product'));
    }
    public function cart()
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $cart = Cart::with('product')->where('user_id',auth()->user()->id)->get();
        return view('pages.frontend.cart', compact('category','cart'));
    }
    public function addToCart(Request $request,$id)
    {
        try {
            cart::create([
                'product_id'=>$id,
                'user_id'=>auth()->user()->id
                
            ]);
            return redirect()->route('cart');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
     
    }
   
}
