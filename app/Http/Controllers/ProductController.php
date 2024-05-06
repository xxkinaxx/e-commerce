<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        $products = Product::select( 'id', 'category_id', 'name', 'slug', 'description', 'price')->latest()->get();
        return view('pages.admin.products.index', compact('products', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::all();
        $category = Category::all();
        return view('pages.admin.products.create-product', compact('product', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        try {
            $data = $request->all();

            $data['slug'] = Str::slug($request->name);

            Product::create($data);

            return redirect()->route('admin.product.index')->with('success', 'Product successfully created');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product');
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
        $category = Category::all();
        $product = Product::findOrFail($id);
        return view('pages.admin.products.edit-product', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        try {
            $product = Product::find($id);

            $data = $request->all();

            $data['slug'] = Str::slug($request->name);

            $product->update($data);

            return redirect()->route('admin.product.index')->with('success', 'Product successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to edit product');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // find Product by id
            $product = Product::find($id);

            // delete Product
            $product->delete();

            return redirect()->back()->with('success', 'Product successfully deleted');
        } catch (Exception $e) {
            return redirect()->back()->with('errors', 'Something went wrong');
        }
    }
}
