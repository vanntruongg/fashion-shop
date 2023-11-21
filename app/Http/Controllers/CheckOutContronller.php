<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $userId = Auth::id();
        $user = DB::table("users")
        ->select("ND_Ho", "ND_Ten", "ND_SDT", "ND_Diachi", "email")
        ->where('id', $userId)->first();

        return view('pages.guest.checkout', ['products' => $products, 'totalPrice' => $totalPrice, "user" => $user]);
    }

    function createOrder(Request $request) {
        dd($request);
    }

    function handleCheckout(Request $request) {
        $products = json_decode($request->products);
        $totalPrice = $request->totalPrice;
        $userId = Auth::id();
        $currentDate = Carbon::today();
        $formattedDate = $currentDate->format('Y-m-d H:i:s');
        // dd($totalPrice);
        $data = [
            'ND_id' =>  $userId,
            'HD_Ngay' => $formattedDate,
            'HD_TongTien' => $totalPrice,
        ];
        
        $orderId = DB::table('hoadon')->insertGetId($data);
        foreach ($products as $product) {
            $data = [
                'CTHD_SoLuong' => $product->CTGH_SoLuong,
                'CTHD_DonGia' => $product->SP_Gia,
                'SP_Ma' => $product->SP_Ma,
                'HD_Ma' => $orderId ,
            ];
            DB::table('chitiethoadon')->insert($data);
            DB::table('chitietgiohang')->where('CTGH_Ma', $product->CTGH_Ma)->delete();
        }
        return redirect()->route('order-success');
    }

    function orderSuccess() {
        return view('pages.guest.order-success');
    }
}
