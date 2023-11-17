<?php

namespace App\Http\Controllers\admin\product;

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
use App\Models\hoadonnhap;
use App\Models\chitiethoadonnhap;
use App\Models\loaisanpham;
use App\Http\Requests\ImportWarehouseRequest;
class ImportwarehouseController extends Controller
{
    public function importWarehouse(Request $request) {
        $page = $request->query('page',1);
        $data = DB::table('hoadonnhap')
        ->select('hoadonnhap.*')
        ->paginate(5);
        return view ('pages.admin.importwarehouse.importwarehouse',compact('data','page'));
    }
    public function getImportwarehouseDetails(Request $request,$id) {
        $hoadonnhap = DB::table('hoadonnhap')
        ->where('hoadonnhap.HDN_Ma','=' ,$id)
        ->join('chitiethoadonnhap','chitiethoadonnhap.HDN_Ma','=','hoadonnhap.HDN_Ma')
        ->select('hoadonnhap.*','chitiethoadonnhap.*')
        ->first();
        // dd($hoadonnhap);
        $chitiethoadonnhap = DB::table('chitiethoadonnhap')
        ->join('hoadonnhap','chitiethoadonnhap.HDN_Ma', '=','hoadonnhap.HDN_Ma')
        ->where('chitiethoadonnhap.HDN_Ma','=',$id)
        ->get();
        // // dd($chitiethoadonnhap);
        $productDetails = [];
        foreach ($chitiethoadonnhap as $key => $cthdn) {
            $productDetails[$key] = DB::table('sanpham')
            ->join('chitiethoadonnhap','chitiethoadonnhap.SP_Ma','=','sanpham.SP_Ma')
            ->join('chitietsanpham','chitietsanpham.SP_Ma','=','sanpham.SP_Ma')
            ->join('loaisanpham','sanpham.LSP_Ma','=','loaisanpham.LSP_Ma')
            ->join('mausac','chitietsanpham.MS_Ma','=','mausac.MS_Ma')
            ->join('kichthuoc','chitietsanpham.KT_Ma','=','kichthuoc.KT_Ma')
            ->where('sanpham.SP_Ma','=', $cthdn->SP_Ma)
            ->select(
                'sanpham.SP_HinhAnh as link_img', 'sanpham.SP_Ten as name', 'sanpham.SP_ChatLieu as chatlieu','sanpham.SP_Gia as giasp','loaisanpham.LSP_Ten as loaisanpham',
                'mausac.MS_TenMau as mausac','kichthuoc.KT_Ten as kichthuoc',
                'chitiethoadonnhap.CTHDN_SoLuong as soluongnhap','chitiethoadonnhap.CTHDN_Gia as gianhap',
            )
            ->first();
            // dd($productDetails[$key]);
        }
            $totalPrice = 0;
        foreach ($productDetails as $sp) {
            $totalPrice += ($sp->soluongnhap * $sp->gianhap);
        }
       
        return view ('pages.admin.importwarehouse.importwarehouse_details',compact('id','hoadonnhap','productDetails','chitiethoadonnhap','totalPrice'));
    }

    public function newImportwareHouse() {
        $hoadonnhap = DB::table('hoadonnhap')
        ->select('hoadonnhap.*')
        ->get();
        $chitiethoadonnhap = DB::table('chitiethoadonnhap')
        ->select('chitiethoadonnhap.*')
        ->get();
        $chitietsanpham = DB::table('chitietsanpham')
        ->select('chitietsanpham.*')
        ->get();
        $loaisanpham = DB::table('loaisanpham')
        ->select('loaisanpham.*')
        ->get();
        $mausac = DB::table('mausac')->select('mausac.*')
        ->get();
        $kichthuoc = DB::table('kichthuoc')->select('kichthuoc.*')
        ->get();
        return view('pages.admin.importwarehouse.new-importwarehouse',compact('hoadonnhap','chitietsanpham','chitiethoadonnhap','loaisanpham','mausac','kichthuoc'));
    }
    public function createImportwareHouse(ImportWarehouseRequest $request)
    {
    // Tạo hóa đơn mới
    $hoadonnhap = Hoadonnhap::create([
        'HDN_Ngay' => $request->input('HDN_Ngay'),
        'HDN_GhiChu' => $request->input('HDN_GhiChu'),
    ]);

    foreach ($request->input('SP_Ten') as $index => $tenSanPham) {
        // Kiểm tra sản phẩm đã tồn tại hay chưa
        $sanpham = SanPham::where('SP_Ten', $tenSanPham)->first();

        if ($sanpham) {
            // Nếu sản phẩm đã tồn tại, tăng số lượng
            DB::table('chitietsanpham')
                ->where('SP_Ma', $sanpham->SP_Ma)
                ->update([
                    'CTSP_SoLuong' => DB::raw('CTSP_SoLuong + ' . $request->input('SP_Soluong')[$index]),
                ]);

            // Kiểm tra và xóa ảnh cũ
            if ($sanpham->SP_HinhAnh) {
                $oldImagePath = public_path($sanpham->SP_HinhAnh);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Lấy giá trị 'SP_Ma' từ sản phẩm đã tồn tại
            $SP_Ma = $sanpham->SP_Ma;
        } else {
            // Xử lý ảnh cho sản phẩm mới
            $file = $request->file('product-img')[$index] ?? null;

            if ($file) {
                $productImg = $file->getClientOriginalName();
                $avtdb = '/storage/images/products/' . $productImg;
                $path = 'public/storage/images/products/';
                $file->move(base_path($path), $productImg);
                $productImgURL = $avtdb;
            } else {
                $productImgURL = '/storage/images/admin/shirt_default.png';
            }

            // Nếu sản phẩm chưa tồn tại, tạo mới sản phẩm
            $sanpham = SanPham::create([
                'SP_Ten' => $tenSanPham,
                'SP_ChatLieu' => $request->input('SP_Chatlieu')[$index],
                'SP_Gia' => $request->input('SP_Gia')[$index],
                'LSP_Ma' => $request->input('SP_LSP')[$index],
                'SP_HinhAnh' => $productImgURL,
            ]);

            // Lấy giá trị 'SP_Ma' từ sản phẩm mới tạo
            $SP_Ma = $sanpham->id;

            // Tạo chi tiết sản phẩm mới
            ChiTietSanPham::create([
                'CTSP_SoLuong' => $request->input('SP_Soluong')[$index],
                'MS_Ma' => $request->input('SP_Mausac')[$index],
                'KT_Ma' => $request->input('SP_Kichthuoc')[$index],
                'SP_Ma' => $SP_Ma,
            ]);
        }

        // Tạo chi tiết hóa đơn nhập mới
        ChiTietHoaDonNhap::create([
            'CTHDN_SoLuong' => $request->input('SP_Soluong')[$index],
            'CTHDN_Gia' => $request->input('SP_Gia')[$index],
            'SP_Ma' => $SP_Ma,
            'HDN_Ma' => $hoadonnhap->HDN_Ma,
        ]);
    }

    Session::flash('add-success', 'Thêm hóa đơn nhập thành công');
    return redirect()->route('new-importwarehouse');
    }

    public function getUpdateimportwarehouse($id) {
        $hoadonnhap = DB::table('hoadonnhap')
        ->where('hoadonnhap.HDN_Ma', '=', $id)
        ->first();
        $chitiethoadonnhap = DB::table('chitiethoadonnhap')
        ->join('sanpham','chitiethoadonnhap.SP_Ma','=','sanpham.SP_Ma')
        ->join('chitietsanpham','sanpham.SP_Ma','=','chitietsanpham.SP_Ma')
        ->where('HDN_Ma','=', $id)
        ->get();
        $loaisanpham = DB::table('loaisanpham')
        ->select('loaisanpham.*')
        ->get();
        $mausac = DB::table('mausac')->select('mausac.*')
        ->get();
        $kichthuoc = DB::table('kichthuoc')->select('kichthuoc.*')
        ->get();
        return view('pages.admin.importwarehouse.update-importwarehouse',compact('id','hoadonnhap','chitiethoadonnhap','loaisanpham','mausac','kichthuoc'));
    }

    public function updateImportwarehouse($id, ImportWarehouseRequest $request)
    {
    $hoadonnhap = Hoadonnhap::find($id);
    $hoadonnhap->update([
        'HDN_Ngay' => $request->input('HDN_Ngay'),
        'HDN_GhiChu' => $request->input('HDN_GhiChu'),
    ]);

    foreach ($request->input('SP_Ten') as $index => $tenSanPham) {
        $sanpham = SanPham::where('SP_Ten', $tenSanPham)->first();

        $file = $request->file('product-img')[$index] ?? null;

        if ($sanpham) {
            if ($file) {
                $productImg = $file->getClientOriginalName();
                $avtdb = '/storage/images/products/' . $productImg;
                $path = 'public/storage/images/products/';
                $file->move(base_path($path), $productImg);
                $productImgURL = $avtdb;

                // Kiểm tra và xóa ảnh cũ
                if ($sanpham->SP_HinhAnh) {
                    $oldImagePath = public_path($sanpham->SP_HinhAnh);
                    if (file_exists($oldImagePath)) {
                        unlink($oldImagePath);
                    }
                }
            } else {
                $productImgURL = $sanpham->SP_HinhAnh;
            }

            $sanpham->update([
                'SP_ChatLieu' => $request->input('SP_Chatlieu')[$index],
                'SP_Gia' => $request->input('SP_Gia')[$index],
                'LSP_Ma' => $request->input('SP_LSP')[$index],
                'SP_HinhAnh' => $productImgURL,
            ]);

            DB::table('chitietsanpham')
                ->where('SP_Ma', $sanpham->SP_Ma)
                ->update([
                    'CTSP_SoLuong' => DB::raw('CTSP_SoLuong + ' . $request->input('SP_Soluong')[$index]),
                    'MS_Ma' => $request->input('SP_Mausac')[$index],
                    'KT_Ma' => $request->input('SP_Kichthuoc')[$index],
                ]);

            $SP_Ma = $sanpham->SP_Ma;
        } else {
            if ($file) {
                $productImg = $file->getClientOriginalName();
                $avtdb = '/storage/images/products/' . $productImg;
                $path = 'public/storage/images/products/';
                $file->move(base_path($path), $productImg);
                $productImgURL = $avtdb;
            } else {
                $productImgURL = '/storage/images/admin/shirt_default.png';
            }

            $sanpham = SanPham::create([
                'SP_Ten' => $tenSanPham,
                'SP_ChatLieu' => $request->input('SP_Chatlieu')[$index],
                'SP_Gia' => $request->input('SP_Gia')[$index],
                'LSP_Ma' => $request->input('SP_LSP')[$index],
                'SP_HinhAnh' => $productImgURL,
            ]);

            $SP_Ma = $sanpham->id;

            ChiTietSanPham::create([
                'CTSP_SoLuong' => $request->input('SP_Soluong')[$index],
                'MS_Ma' => $request->input('SP_Mausac')[$index],
                'KT_Ma' => $request->input('SP_Kichthuoc')[$index],
                'SP_Ma' => $SP_Ma,
            ]);
        }

        chitiethoadonnhap::where('HDN_Ma', $id)
            ->where('SP_Ma', $SP_Ma)
            ->update([
                'CTHDN_SoLuong' => $request->input('SP_Soluong')[$index],
                'CTHDN_Gia' => $request->input('SP_Gia')[$index],
                // Cập nhật các trường khác của chi tiết hóa đơn nhập nếu có
            ]);
    }

    Session::flash('update-success', 'Cập nhật hóa đơn nhập thành công');
    return redirect()->route('update-importwarehouse', compact('id'));
        }
    
    public function deleteImportwarehouse(Request $request) {
       
        // $hoadonnhap = hoadonnhap::find($id);
        // DB::table('chitiethoadonnhap')->where('HDN_Ma', $id)->delete();
        // foreach ($hoadonnhap->chitiethoadonnhap as $chitiet) {
        //     $chitiet->sanpham->chitietsanpham->delete();
        //     $chitiet->sanpham->delete();
        // }
        // $hoadonnhap->delete();
              
        $import_id = $request->input('importwarehouse_id');

        // Kiểm tra xem có chi tiết hóa đơn nhập nào liên quan không
        $hasDetails = chitiethoadonnhap::where('HDN_Ma', $import_id)->exists();

        // Nếu có chi tiết hóa đơn nhập
        if ($hasDetails) {
            chitiethoadonnhap::where('HDN_Ma', $import_id)->delete();
        }

        // Sau đó mới xóa hóa đơn nhập chính
        hoadonnhap::destroy($import_id);

        Session::flash('delete-success', 'Xóa hóa đơn nhập thành công');
        return redirect()->route('admin-importwarehouse');
    }

}
