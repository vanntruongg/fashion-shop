<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class CartContronller extends Controller
{
    //
    function index() {
        if(!Auth::check()) {
            return view("pages.login");
        }

        $userId = Auth::id();

        // Sử dụng câu lệnh SQL trực tiếp để lấy tất cả sản phẩm của người dùng đang đăng nhập
        $products = DB::table('giohang')
        ->join('chitietgiohang', 'giohang.GH_Ma', '=', 'chitietgiohang.GH_Ma')
        ->join('sanpham', 'chitietgiohang.SP_Ma', '=', 'sanpham.SP_Ma')
        ->where('giohang.ND_id', $userId)
        ->select('chitietgiohang.*', 'sanpham.SP_Ten', 'sanpham.SP_Gia')
        ->get();
        // dd($carts);

        // $carts = DB::table('giohang')->get();

        // dd($carts)
        return view('pages.guest.cart', compact('products')); 
    }

    function requestAddProduct(Request $request) {
        // dd($request);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        $action = $request->input('action');
        // dd($action, $action === 'add');
        if($action === 'add') {
            $this->addToCart($productId, $quantity);
            return redirect()->route('products');
        } else if ($action === 'add_and_checkout') {
            $this->addToCart($productId, $quantity);
            return redirect()->route('checkout');
        }
    }

    function addToCart($productId, $quantity) {

        // dd($productId, $quantity);
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
            $cartId = $cart->GH_Ma;
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
                    'CTGH_SoLuong' => $cartProduct->CTGH_SoLuong + $quantity
                ]);
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm mới sản phẩm
            DB::table('chitietgiohang')->insert([
                'GH_Ma' => $cartId,
                'SP_Ma' => $productId,
                'CTGH_SoLuong' => $quantity
            ]);
        }
    }


    function updateQuantity(Request $request) {
        // dd($request);
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');
        DB::table('chitietgiohang')
        ->where('SP_Ma', $productId)
        ->update(['CTGH_SoLuong' => $quantity]);

        $products = $this->getDataCart();
        
        return response()->json(['message' => 'Cart updated successfully', 'products' => $products]);
    }

    function getDataCart() {
        $userId = Auth::id();

        return DB::table('giohang')
        ->join('chitietgiohang', 'giohang.GH_Ma', '=', 'chitietgiohang.GH_Ma')
        ->join('sanpham', 'chitietgiohang.SP_Ma', '=', 'sanpham.SP_Ma')
        ->where('giohang.ND_id', $userId)
        ->select('chitietgiohang.*', 'sanpham.SP_HinhAnh', 'sanpham.SP_Ten', 'sanpham.SP_Gia')
        ->get();
    }


    function deleteProduct($productId) {
        DB::table('chitietgiohang')->where('SP_Ma', $productId)->delete();

        $products = $this->getDataCart();
        
        return view('pages.guest.cart', compact('products')); 
    }
}
