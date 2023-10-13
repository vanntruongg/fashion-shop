<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartContronller extends Controller
{
    //
    function index() {

        $userId = Auth::id();

        // Sử dụng câu lệnh SQL trực tiếp để lấy tất cả sản phẩm của người dùng đang đăng nhập
        $carts = DB::table('giohang')
        ->join('chitietgiohang', 'giohang.GH_Ma', '=', 'chitietgiohang.GH_Ma')
        ->join('sanpham', 'chitietgiohang.SP_Ma', '=', 'sanpham.SP_Ma')
        ->where('giohang.ND_id', $userId)
        ->select('chitietgiohang.*', 'sanpham.SP_Ten', 'sanpham.SP_Gia')
        ->get();
        dd($carts);

        $carts = DB::table('giohang')->get();
        return view('pages.guest.cart',compact('carts'));
    }

    function requestAddProduct(Request $request) {
        // dd($request);
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

        //  dd($productId, $quantity);
        $userId = Auth::id();
        $cart = DB::table('giohang')
        ->where('ND_id', $userId)
        ->first();

        if (!$cart) {
            // Nếu giỏ hàng chưa tồn tại, hãy tạo giỏ hàng mới
            $cartId = DB::table('giohang')->insertGetId([
                'ND_id' => $userId
            ]);
        } else {
            $cartId = $cart->cart_id;
        }

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay chưa
        $cartProduct = DB::table('chitietgiohang')
        ->where('GH_Ma', $cartId)
        ->where('SP_Ma', $productId)
        ->first();

        if ($cartProduct) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            DB::table('chitietgiohang')
                ->where('GH_Ma', $cartId)
                ->where('SP_Ma', $productId)
                ->update([
                    'CTGH_SoLuong' => $cartProduct->quantity + $quantity
                ]);
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới sản phẩm
            DB::table('chitietgiohang')->insert([
                'GH_Ma' => $cartId,
                'SP_Ma' => $productId,
                'CTGH_SoLuong' => $quantity
            ]);
        }
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }


    function updateQuantity(Request $request) {
        // dd($request);
        return response()->json(['message' => 'Cart updated successfully']);
    }
}
