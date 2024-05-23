<?php

namespace App\Http\Controllers\Frontend;

use Exception;
use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TransactionItem;
use App\Http\Controllers\Controller;

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
        $cart = Cart::with('product')->where('user_id', auth()->user()->id)->latest()->get();
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

    public function deleteFromCart($id)
    {
        try{
            Cart::findOrFail($id)->delete();

            return redirect()->route('cart');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Somethings Wrong');
        }
    }

    public function checkout(Request $request)
    {
        try {
            // request data
            $data = $request->all();

            // get data cart user
            $cart = Cart::with('product')->where('user_id', auth()->user()->id)->get();

            // create transaction
            $transaction = Transaction::create([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'email' => $data['email'],
                'address' => $data['address'],
                'phone'  => $data['phone'],
                'total_price' => $cart->sum('product.price')
            ]);

            // create transaction item
            foreach($cart as $item){
                TransactionItem::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $item->product_id,
                    'transaction_id' => $transaction->id
                ]);
            }

            // delete cart
            Cart::where('user_id', auth()->user()->id)->delete();

            // setting midtrans
            // use Midtrans\Config;
            // use Midtrans\Snap;
            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$clientKey = config('services.midtrans.clientKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            // setup variable for midtrans
            $midtrans = [
                'transaction_details' => [
                    'order_id' => 'EK' . $transaction->id,
                    'gross_amount' => (int) $transaction->total_price
                ],
                'customer_details' => [
                    'first_name' => $transaction->name,
                    'email' => $transaction->email,
                    'phone' => $transaction->phone
                ],
                'enable_payments' => ['gopay', 'bank_transfer'],
                'vtweb' => []
            ];

            // create payment url
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;

            // update payment url
            $transaction->update([
                'payment_url' => $paymentUrl
            ]);

            return redirect($paymentUrl);

        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->back()->with('error', 'Somethings Wrong');
        }
    }
}
