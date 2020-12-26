<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Contracts\OrderContract;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

class CheckoutController extends Controller
{

    protected $orderRepository;

    public function __construct(OrderContract $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout()
    {
        return view('site.checkout');
    }


    public function placeOrder(Request $request)
    {
        $order = $this->orderRepository->storeOrderDetails($request->all());
        if ($order) {
            $this->ship($order->id);
            Cart::clear();
            return view('site.success', compact('order'));
        }
        return redirect()->back()->with('message','Order not placed');
    }

    public function ship($id)
    {
        $order = Order::findOrFail($id);
        Mail::to(\Auth::user())->send(new OrderShipped($order));
        
    }
}
