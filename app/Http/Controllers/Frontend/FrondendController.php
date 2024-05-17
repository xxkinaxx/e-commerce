<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;

class FrondendController extends Controller
{
    public function index()
    {
        $product = Product::with('productGallery')->select('id', 'name', 'slug', 'price')->latest()->get();
        $category = Category::select('id', 'name', 'slug')->latest()->limit(8)->get();
        return view('pages.frontend.index', compact('category', 'product'));
    }
    
    public function detailProduct($slug)
    {
        $category = Category::select('id', 'name', 'slug')->latest()->get();
        $product = Product::with('productGallery')->where('slug', $slug)->first();
        $recomendation = Product::with('productGallery')->select('id', 'name', 'price', 'slug')->inRandomOrder()->limit(5)->get();
        return view('pages.frontend.detail-product', compact('product', 'category', 'recomendation'));
    }

    public function detailCategory($slug)
    {
        $category = Category::select('id', 'name', 'slug')->latest()->limit(8)->get();
        $categories = Category::where('slug', $slug)->first();
        $product = Product::with('productGallery')->where('category_id', $categories->id)->latest()->get();
        return view('pages.frontend.detail-category', compact('category', 'categories', 'product'));
    }

    public function cart()
    {
        $category = Category::select('id', 'name', 'slug')->latest()->limit(8)->get();
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        return view('pages.frontend.cart', compact('category', 'cart'));
    }

    public function addToCart(Request $request, $id)
    {
        try{
            Cart::create([
                'product_id' => $id,
                'user_id' => auth()->user()->id
            ]);

            return redirect()->route('cart');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Somethings Wrong');
        }
    }
}
