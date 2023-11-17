<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\sanpham;
use App\Models\chitietsanpham;
use App\Models\mausac;
use App\Models\danhmuc;
use App\Models\kichthuoc;

class ProductController extends Controller
{
    public function newProduct() {

    $loaisanpham = DB::table('loaisanpham')
    ->select('loaisanpham.*')
    ->get();
   
    $mausac = DB::table('mausac')->select('mausac.*')
    ->get();
    $kichthuoc = DB::table('kichthuoc')->select('kichthuoc.*')
    ->get();  
    $soluong = DB::table('chitietsanpham')->select('soluong');
    // dd($loaisanpham,$mausac,$kichthuoc); 
    return view('pages.admin.product.new-product',compact('loaisanpham','mausac','kichthuoc','soluong'));
    }
    public function createProduct(Request $request) {

    if($request->files->has('product-img')) {
      $file = $request->file('product-img');
      $productImg = $request->file('product-img')->getClientOriginalName();

      $avtdb = '/storage/images/products/'. $productImg;
      $path = 'public/storage/images/products/';

      $file->move(base_path($path),$productImg);
      $productImgURL = $avtdb;
    } else {
      $productImgURL = '/storage/images/admin/shirt_default.png';
    }

    $SP_LSP = $request->input('SP_LSP');
    $SP_Ten = $request->input('SP_Ten');
    $SP_Chatlieu = $request->input('SP_Chatlieu');
    $SP_Mausac = $request->input('SP_Mausac');
    $SP_Kichthuoc = $request->input('SP_Kichthuoc');
    $SP_Gia = $request->input('SP_Gia');
    $SP_Soluong = $request->input('SP_Soluong');

    $sanpham = SanPham::create([
        'SP_Ten' => $SP_Ten,
        'SP_ChatLieu' => $SP_Chatlieu,
        'SP_HinhAnh' => $productImgURL,
        'SP_Gia' => $SP_Gia,
        'LSP_Ma' => intval($SP_LSP),
    ]);

    // Lấy ID của sản phẩm vừa thêm
    $SP_Ma = $sanpham->id;

    ChiTietSanPham::create([
        'CTSP_SoLuong' => $SP_Soluong,
        'MS_Ma' => intval($SP_Mausac),
        'KT_Ma' => intval($SP_Kichthuoc),
        'SP_Ma' => $SP_Ma, 
    ]);
      Session::flash('add-success','Thêm sản phẩm thành công');
      return redirect()->route('new-product');
    }

  public function getUpdateProduct($id) {
      
    $loaisanpham = DB::table('loaisanpham')
    ->select('loaisanpham.*')
    ->get();
    $product = DB::table('sanpham')
    ->where('sanpham.SP_Ma', '=', $id)
    ->first();
   
    $product_details = DB::table('chitietsanpham')
    ->where('SP_Ma', '=', $id)
    ->first();
    $mausac = DB::table('mausac')->select('mausac.*')
    ->get();
    $kichthuoc = DB::table('kichthuoc')->select('kichthuoc.*')
    ->get();  
    $soluong = DB::table('chitietsanpham')->select('soluong');
    // dd($id);
    return view('pages.admin.product.update-product',compact('loaisanpham','mausac','kichthuoc','soluong','product','product_details'));
  }

  public function postUpdateProduct($id, Request $request) {

    $product = DB::table('sanpham')
    ->where('sanpham.SP_Ma', '=', $id)
    ->first();
   
    $product_details = DB::table('chitietsanpham')
    ->where('SP_Ma', '=', $id)
    ->first();

    if ($request->hasFile('product-img')) {
      $oldImg = $product->SP_HinhAnh;
      $oldImagePath = public_path('storage/images/products/' . $oldImg);
      if (file_exists($oldImagePath)) {
        unlink($oldImagePath); // Xóa ảnh cũ
    }
      $file = $request->file('product-img');
      $productImg = $file->getClientOriginalName();
  
      // Kiểm tra xem sản phẩm đã có ảnh hay chưa
      $avtdb = '/storage/images/products/'. $productImg;
      $path = 'public/storage/images/products/';

      $file->move(base_path($path),$productImg);
      $productImgURL = $avtdb;
    } else {
      $productImgURL = '/storage/images/admin/shirt_default.png';
    }


    $SP_LSP = $request->input('SP_LSP');
    $SP_Ten = $request->input('SP_Ten');
    $SP_Chatlieu = $request->input('SP_Chatlieu');
    $SP_Mausac = $request->input('SP_Mausac');
    $SP_Kichthuoc = $request->input('SP_Kichthuoc');
    $SP_Gia = $request->input('SP_Gia');
    $SP_Soluong = $request->input('SP_Soluong');

    DB::table('sanpham')
    ->where('SP_Ma','=',$id)
    ->update([
      'SP_Ten' => $SP_Ten,
      'SP_ChatLieu' => $SP_Chatlieu,
      'SP_HinhAnh' => $productImgURL,
      'SP_Gia' => $SP_Gia,
      'LSP_Ma' => intval($SP_LSP)
    ]);

    DB::table('chitietsanpham')
    ->where('SP_Ma','=',$id)
    ->update([
      'CTSP_SoLuong' => $SP_Soluong,
      'MS_Ma' => intval($SP_Mausac),
      'KT_Ma' => intval($SP_Kichthuoc),
    ]);
    Session::flash('update-success', 'Cập nhật sản phẩm thành công');
    return redirect()->route('admin-product',compact('id','product','product_details'));
  }
  public function delete(Request $request)
{
    $product_id = $request->input('product_id');
    
    // Kiểm tra xem có chi tiết hóa đơn nhập nào liên quan không
    $hasDetailsInInvoice = DB::table('chitiethoadonnhap')
        ->where('SP_Ma', '=', $product_id)
        ->exists();

    // Nếu có chi tiết hóa đơn nhập,Xóa
    if ($hasDetailsInInvoice) {
        //dschitiethoadonnhap
        $relatedInvoices = DB::table('chitiethoadonnhap')
            ->where('SP_Ma', '=', $product_id)
            ->pluck('HDN_Ma');
            
        DB::table('chitiethoadonnhap')
            ->where('SP_Ma', '=', $product_id)
            ->delete();

        DB::table('hoadonnhap')
            ->whereIn('HDN_Ma', $relatedInvoices)
            ->delete();
    }

    $hasDetails = DB::table('chitietsanpham')
    ->where('SP_Ma', '=', $product_id)
    ->exists();

// Nếu có chi tiết sản phẩm, hãy xóa chúng trước
    if ($hasDetails) {
    DB::table('chitietsanpham')
        ->where('SP_Ma', '=', $product_id)
        ->delete();
    }

    // Xóa sản phẩm chính
    DB::table('sanpham')
        ->where('SP_Ma', '=', $product_id)
        ->delete();

    Session::flash('delete-success', 'Xóa sản phẩm thành công');
    return redirect()->route('admin-product');
}
  public function searchProduct(Request $request) {
    $SP_Ten = $request->input('SP_Ten');
    $results = DB::table('sanpham')
        ->join('loaisanpham','sanpham.LSP_Ma','loaisanpham.LSP_Ma')
        ->join('chitietsanpham','sanpham.SP_Ma','chitietsanpham.SP_Ma') 
        ->where('sanpham.SP_Ten', 'LIKE', '%'. $SP_Ten .'%')
        ->select('sanpham.*','loaisanpham.LSP_Ten','chitietsanpham.CTSP_SoLuong')
        ->get();
    return view('pages.admin.product.search-product',compact('results','SP_Ten'));
  }







}
