<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckOutContronller extends Controller
{
    
    function index() {
        return view('pages.guest.checkout');
    }

    function createOrder(Request $request) {
        dd($request);
    }
}
