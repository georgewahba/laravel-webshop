<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_product(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $prod_qty = $request->input('prod_qty');

        if (Auth::check()){
            $prod_check = Product::where('id', $prod_id)->first();
            
            if ($prod_check) {
                if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status'=> "already in cart"]);

                } else {
                $cart_item = new Cart();
                $cart_item->prod_id = $prod_id;
                $cart_item->prod_qty = $prod_qty;
                $cart_item->user_id = Auth::id();
                $cart_item->save();
                return response()->json(['status'=> "added to cart"]);

            }
        } 
    } else {
            return response()->json(['status'=> "login to continue"]);
        }
    }

    public function view_cart()
    {   
        $items = Cart::where('user_id', Auth::id())->get();
        return view('frontend.cart', compact('items'));
    }

    public function removecart(Request $request)
    {
        if (Auth::check()){
            $prod_id = $request->input('prod_id');
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart_item = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart_item->delete();
                return response()->json(['status'=> "deledet from cart"]);

            }
        } else {
            return redirect('/')->with('status', 'Login to continue');
        }

    }

    public function updatecart(Request $request)
    {
        $prod_id = $request->input('prod_id');
        $qty = $request->input('qty');
        if (Auth::check()){
            if (Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('prod_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->prod_qty = $qty;
                $cart->update();
                return response()->json(['status'=> 'quantity updated']);
            }
        }
    }
}
