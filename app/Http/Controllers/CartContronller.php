<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartContronller extends Controller
{
    //
    function index() {
        return view('pages.guest.cart');
    }

    function requestAddProduct(Request $request) {
        dd($request);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $action = $request->input('product_id');

        if ($action === 'add') {
            $this->addToCart($productId, $quantity);
        } else if ($action === 'add_and_checkout') {
            $this->addToCart($productId, $quantity);
            return redirect()->route('checkout');
        }
    }

    function addToCart($productId, $quantity) {
        // insert into table cart & cart_detail
        dd($productId, $quantity);
    }


    function updateQuantity(Request $request) {
        // dd($request);
        return response()->json(['message' => 'Cart updated successfully']);
    }
}
