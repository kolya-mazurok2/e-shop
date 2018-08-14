<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Cart;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
    public function index() {
        $products = Product::paginate(3);

        return view("allProducts", compact("products"));
    }

    public function typeMen() {
        $products = DB::table('products')->where('type', 'Men')->paginate(3);

        return view("allProducts", compact("products"));
    }

    public function typeWomen() {
        $products = DB::table('products')->where('type', 'Women')->paginate(3);

        return view("allProducts", compact("products"));
    }

    public function addProductToCart(Request $request, $id) {
        $prevCart = $request->session()->get('cart');
        $cart = new Cart($prevCart);

        $product = Product::find($id);
        $cart->addItem($id, $product);
        $request->session()->put('cart', $cart);

        return redirect()->route('allProducts');
    }

    public function showCart() {
        $cart = Session::get('cart');

        if($cart) {
            return view('cartProducts', ['cartItems' => $cart]);
        }
        else {
            return redirect()->route('allProducts');
        }
    }

    public function deleteFromCart(Request $request, $id) {
        $cart = $request->session()->get('cart');

        if(array_key_exists($id, $cart->items)) {
            unset($cart->items[$id]);
        }

        $prevCart = $request->session()->get('cart');
        $updatedCart = new Cart($prevCart);
        $updatedCart->updatePriceAndQuantity();

        $request->session()->put('cart', $updatedCart);
        if(!empty($updatedCart->items)) {
            return redirect()->route('cartProducts');
        }
        else {
            return redirect()->route('allProducts');
        }
    }

    public function search(Request $request) {
        $s = $request->get('s');

        $products = DB::table('products')->where('name', 'like', '%'. $s . '%')->paginate(3);

        return view("allProducts", compact("products"));
    }
}
