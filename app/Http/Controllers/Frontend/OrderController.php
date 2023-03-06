<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.order.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = Order::where('id', $orderId)->where('user_id', Auth::user()->id)->first();
        if ($order) {
            return view('frontend.order.show', compact('order'));
        } else {
            return redirect()->back()->with('error', 'No Order Found');
        }
    }
}
