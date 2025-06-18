<?php

namespace App\Controllers;

class OrderController extends BaseController
{
    public function checkout()
    {

        $session = session();
        $cart = $session->get('cart');
        return view('checkout', ['cart' => $cart]);
    }

    public function placeOrder()
    {
        $session = session();
        $cart = $session->get('cart');

        if (empty($cart)) {
            return redirect()->to('cart/view')->with('message', 'cart is empty');
        }
        $session->remove('cart');
        return redirect()->to('cart/view')->with('message', 'Order place successfully');
    }
}
