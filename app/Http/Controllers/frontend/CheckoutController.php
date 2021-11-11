<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Doctrine\CarbonType;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartitems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartitems as $item){
            if (!Product::where('id', $item->prod_id)->where('qty', ">=", $item->prod_qty)->exists()) {
                $removeitem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeitem->delete();
            }
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cartitems'));
    }

    public function placeoreder(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->name;
        $order->lname = $request->lname;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->adress1 = $request->adress1;
        $order->adress2 = $request->adress2;
        $order->city = $request->city;
        $order->state = $request->state;
        $order->country = $request->country;
        $order->zip = $request->zip;

        //calculate total price
        $cartitems = Cart::where('user_id', Auth::id())->get();
        $totalprice = 0;
        foreach($cartitems as $item){
            $totalprice += $item->products->selling_price * $item->prod_qty;
        }
        $order->total_price = $totalprice;

        $order->save();

        $cartitems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartitems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'qty' => $item->prod_qty,
                'price' => $item->products->selling_price,
            ]);
            $prod = Product::where('id', $item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        
        if (Auth::user()) {
            $user = User::where('id', Auth::id())->first();
            $user->lname = $request->lname;
            $user->phone = $request->phone;
            $user->adress1 = $request->adress1;
            $user->adress2 = $request->adress2;
            $user->city = $request->city;
            $user->state = $request->state;
            $user->country = $request->country;
            $user->zip = $request->zip;
            $user->update();
        }
        $cartitems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartitems);
        return redirect('/')->with('status', 'Order Placed Successfully');
    }
}
