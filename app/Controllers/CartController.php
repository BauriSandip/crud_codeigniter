<?php

namespace App\Controllers;

use App\Models\ProductModel;

class CartController extends BaseController
{

    public function add($productId)
    {

        $session = session();
        //if the cart does't exit yet,initialize it as an empty array
        $cart = $session->get('cart') ?? [];
        $model = new ProductModel();
        $product = $model->find($productId);

        //if the product is found then it will add/update it in the cart 
        if ($product) {
            $cart[$productId] = [
                'id' => $product['id'],
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => isset($cart[$productId]['quantity']) ? $cart[$productId]['quantity'] + 1 : 1
            ];
            $session->set('cart', $cart);
            return redirect()->to('/cart/view')->with('message', 'Product added to cart!');
        }
        return redirect()->to('/');
    }

    public function view()
    {
        $session = session();
        $data['cart'] = $session->get('cart') ?? [];
        return view('cart/view', $data);
    }

    //cart remove function 
    public function remove($productId)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$productId])) {
            unset($cart[$productId]); //rremov the specefic product cart 
            //update the product cart
            $session->set('cart', $cart);
            return redirect()->to('cart/view')->with('message', 'item remove from cart');
        }
        return redirect()->to('cart/view')->with('message', 'item not found from cart');
    }
    public function update()
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');

        if (isset($cart[$productId])) {
            if ($quantity > 0) {
                $cart[$productId]['quantity'] = $quantity;
            } else {
                unset($cart[$productId]); // Remove if quantity is set to 0
            }
            $session->set('cart', $cart);
            return redirect()->to('/cart/view')->with('message', 'Cart updated successfully!');
        }
        return redirect()->to('/cart/view')->with('message', 'Product not found in cart!');
    }
}
