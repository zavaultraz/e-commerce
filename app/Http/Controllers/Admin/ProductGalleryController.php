<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $gallery = $product->product_galleries;
        return view('pages.admin.Product.gallery.index', compact('product', 'gallery'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
      
        try {
            
            $files = $request->file('files');

            foreach ($files as $file) {
                // upload image
                $file->storeAs('public/product/gallery',$file->hasName());
                // insert data ke database
              $product->product_galleries()->create([
                'products_id'=> $product->id,
                'image'=>$file->hashName()
              ]);
        
            }
            return redirect()->route('admin.product.gallery.index',$product->id)->with('succsess', 'GAGAL MENAMBAHKAN 😭');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.product.gallery.index',$product->id)->with('error', 'GAGAL MENAMBAHKAN 😭');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Product $product)
    {
        try {

            // get gallery by id
            $gallery = $product->product_galleries()->findOrFail($id);

            //delete image from storage
            $gallery->delete();

            return redirect()->route('admin.product.gallery.index', $product->id)->with('success', 'Image deleted successfully');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('admin.product.gallery.index', $product->id)->with('error', 'Failed to delete image');
        }
    }
}
