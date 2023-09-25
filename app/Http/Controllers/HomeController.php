<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {
        $jacket_category = [
            (object)[
                'id' => 1,
                'name' => 'Vest xanh đen kẻ sọc',
                'price' => 2890000,
                'image' => '/storage/images/products/vest-1.jpg',
            ],
            (object)[
                'id' => 2,
                'name' => 'Áo Vest đen bóng',
                'price' => 4790000,
                'image' => '/storage/images/products/vest-2.jpg',
            ],
            (object)[
                'id' => 3,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 4,
                'name' => 'Vest Đen Trơn',
                'price' => 1700000,
                'image' => '/storage/images/products/vest-4.jpg',
            ],
        ];
        $t_shirt_category = [
            (object)[
                'id' => 5,
                'name' => 'Áo Vest đen bóng',
                'price' => 4790000,
                'image' => '/storage/images/products/vest-2.jpg',
            ],
            (object)[
                'id' => 6,
                'name' => 'Vest xanh đen kẻ sọc',
                'price' => 2890000,
                'image' => '/storage/images/products/vest-1.jpg',
            ],
            (object)[
                'id' => 7,
                'name' => 'Vest Đen Trơn',
                'price' => 1700000,
                'image' => '/storage/images/products/vest-4.jpg',
            ],
            (object)[
                'id' => 8,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
        ];
        $jean_category = [
            (object)[
                'id' => 9,
                'name' => 'Áo Vest đen bóng',
                'price' => 4790000,
                'image' => '/storage/images/products/vest-2.jpg',
            ],
            (object)[
                'id' => 10,
                'name' => 'Vest Đen Trơn',
                'price' => 1700000,
                'image' => '/storage/images/products/vest-4.jpg',
            ],
            (object)[
                'id' => 11,
                'name' => 'Vest xanh đen kẻ sọc',
                'price' => 2890000,
                'image' => '/storage/images/products/vest-1.jpg',
            ],
            (object)[
                'id' => 12,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
        ];
        return view('pages.guest.home', compact('jacket_category', 't_shirt_category', 'jean_category'));
    }
}
