<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '0')->get();
        return view('admin.orders.index', compact('orders'));
    }
    
    public function view($id)
    {
        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('status');
        $order->update();
        return redirect('orders')->with('status', 'Order status updated successfully');
    }

    public function showcompleted()
    {
        $orders = Order::where('status', '1')->get();
        return view('admin.orders.completed', compact('orders'));
    }
}
