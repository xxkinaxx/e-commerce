<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $product = Product::findOrFail($id);
        $gallery = $product->product_galleries;

        return view('pages.admin.products.gallery.index', compact('product', 'gallery'));
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
                // upload gambar (image)
                $file->storeAs('public/product/gallery', $file->hashName());

                // insert ke data base
                $product->product_galleries()->create([
                    'product_id' => $product->id,
                    'image' => $file->hashName()
                ]);
                return redirect()->route('admin.product.gallery.index', $product->id)->with('success', 'Image successfully uploaded');
            }
        } catch (Exception $e) {
            return redirect()->route('admin.product.gallery.index', $product->id)->with('errors', 'Failed to upload image');
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
            Storage::delete('public/product/gallery/' . basename($gallery->image));

            //delete image from storage
            $gallery->delete();

            return redirect()->route('admin.product.gallery.index', $product->id)->with('success', 'Image deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('admin.product.gallery.index', $product->id)->with('errors', 'Failed to delete');
        }
    }
}
