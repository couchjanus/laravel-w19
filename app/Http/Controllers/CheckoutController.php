<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function getCheckout()
    {
        return view('site.checkout');
    }

    public function placeOrder(Request $request)
    {
        $order = $request->all();
        if ($order) {
            $order = ['order_number'=>12345];
            Cart::clear();
            return view('site.success', compact('order'));
        }
        return redirect()->back()->with('message','Order not placed');
    }

    public function complete(Request $request)
    {
        $order = [];
        Cart::clear();
        return view('site.success', compact('order'));
    }
}
