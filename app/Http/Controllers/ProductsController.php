<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    function index() {
        return view('pages.guest.products');
    }


    function product_detail($slug) {
        // dd($slug);
        $product =  (object)[
            'id' => 1,
            'name' => 'Áo Vest đen bóng',
            'price' => 4790000,
            'image' => '/storage/images/products/vest-2.jpg',
        ];
        return view('pages.guest.product-detail', compact('product'));
    }
}