<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\hoadon;
use App\Models\chitiethoadon;
use App\Models\chitiethoadonnhap;

class OrderController extends Controller
{
    public function getOrderdetails($id) {
        $hoadon = DB::table('hoadon')
        ->join('users','hoadon.ND_id', '=','users.id')
        ->where('hoadon.HD_Ma','=' ,$id)
        ->select('hoadon.*','users.ND_Ho','users.ND_Ten','users.ND_SDT','users.ND_Diachi')
        ->first();
        // dd($hoadon);
        $chitiethoadon = DB::table('chitiethoadon')
        ->join('hoadon','chitiethoadon.HD_Ma', '=','hoadon.HD_Ma')
        ->where('chitiethoadon.HD_Ma','=',$id)
        ->get();

        $productDetails = [];
        foreach ($chitiethoadon as $key => $cthd) {
            $productDetails[$key] = DB::table('sanpham')
            ->join('chitiethoadon','sanpham.SP_Ma','=','chitiethoadon.SP_Ma')
            ->where('sanpham.SP_Ma','=', $cthd->SP_Ma)
            ->select(
                'sanpham.SP_HinhAnh as link_img', 'sanpham.SP_Ten as name',
                'chitiethoadon.CTHD_SoLuong','chitiethoadon.CTHD_DonGia'
            )
            ->first();
        }
        $totalPrice = 0;
        foreach ($productDetails as $sp) {
        $totalPrice += ($sp->CTHD_SoLuong * $sp->CTHD_DonGia);
        }
        return view('pages.admin.order.order_details', compact( 'hoadon','productDetails', 'totalPrice','id'));
    }

    public function delete(Request $request)
    {
        $order_id = $request->input('order_id');
        
        // Kiểm tra xem có chi tiết sản phẩm nào liên quan không
        $hasDetails = DB::table('chitiethoadon')
            ->where('HD_Ma', '=', $order_id)
            ->exists();
    
        // Nếu có chi tiết sản phẩm, hãy xóa trước
        if ($hasDetails) {
            DB::table('chitiethoadon')
                ->where('HD_Ma', '=', $order_id )
                ->delete();
        }
    
        // Sau đó mới xóa sản phẩm chính
        DB::table('hoadon')
            ->where('HD_Ma', '=', $order_id )
            ->delete();
    
        Session::flash('delete-success', 'Xóa đơn hàng thành công');
        return redirect()->route('admin-orders');
    }

}
