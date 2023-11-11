<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CheckOutContronller extends Controller
{
    
    function index(Request $request) {
        // dd($request->productIds);
        $products = DB::table('giohang')
        ->join('chitietgiohang', 'giohang.GH_Ma', '=', 'chitietgiohang.GH_Ma')
        ->join('sanpham', 'chitietgiohang.SP_Ma', '=', 'sanpham.SP_Ma')
        ->select('chitietgiohang.*', 'sanpham.SP_HinhAnh', 'sanpham.SP_Ten', 'sanpham.SP_Gia')
        ->whereIn("chitietgiohang.CTGH_Ma", $request->productIds)->get()->toArray();
        // dd($products);
        return response()->json(['data' =>  $products]);
    }

    public function getProducts(Request $request)
    {
        // Lấy danh sách sản phẩm từ query string
        $products = json_decode($request->input('products'))->data;
        // dd($products);
        // Trả về view và truyền danh sách sản phẩm
        $totalPrice = 0;
        foreach($products as $product) {
            $totalPrice += $product->SP_Gia * $product->CTGH_SoLuong;
        }
        return view('pages.guest.checkout', compact('products', 'totalPrice'));
    }

    function createOrder(Request $request) {
        dd($request);
    }
}
