<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductsController extends Controller
{
    function index() {
        $products = [
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
            (object)[
                'id' => 13,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 14,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 15,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 16,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 17,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 18,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 19,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 20,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 21,
                'name' => 'Vest xanh đen kẻ sọc',
                'price' => 2890000,
                'image' => '/storage/images/products/vest-1.jpg',
            ],
            (object)[
                'id' => 22,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 23,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 24,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 25,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 26,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 27,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 28,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 29,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 30,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 31,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 32,
                'name' => 'Vest xanh đen kẻ sọc',
                'price' => 2890000,
                'image' => '/storage/images/products/vest-1.jpg',
            ],
            (object)[
                'id' => 33,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 34,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 35,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 36,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 37,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 38,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 39,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 40,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
            (object)[
                'id' => 41,
                'name' => 'Vest Nam đen 1 khuy',
                'price' => 3290000,
                'image' => '/storage/images/products/vest-3.jpg',
            ],
        ];

        $page = 10;

        $currentPage = request()->get('page', 1);

        $panigator = new LengthAwarePaginator(
            array_slice($products, ($currentPage - 1) * $page, $page),
            count($products),
            $page,
            $currentPage,
            ['path' => request()->url()]
        );
        // $data = DB::table('products')->paginate(10);
        return view('pages.guest.products', ['products' => $panigator, 'title_search' => null]);
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


    function search(Request $request) {
        // dd($request);
        $searchTerm = $request->input('key');
        // $results=[];
        // $products =  [
        //     (object)[
        //         'id' => 1,
        //         'name' => 'Áo Vest đen bóng',
        //         'price' => 4790000,
        //         'image' => '/storage/images/products/vest-2.jpg',
        //     ]
        // ];
        $results = DB::table('sanpham')
                        ->where('SP_Ten', 'like', '%' . $searchTerm . '%')
                        ->get()->toArray();
        $page = 10;

        $currentPage = request()->get('page', 1);

        $panigator = new LengthAwarePaginator(
            array_slice($results, ($currentPage - 1) * $page, $page),
            count($results),
            $page,
            $currentPage,
            ['path' => request()->url()]
        );
        
        return view('pages.guest.products', ['products' => $panigator, 'title_search' => 'Kết quả tìm kiếm']);
    }
}