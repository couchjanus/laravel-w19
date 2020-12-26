<?php

namespace App\Services;

class PayService
{
    protected $payMy;

    public function processPayment($order)
    {
        return redirect()->route('checkout.payment.complete');
    }
   
}
