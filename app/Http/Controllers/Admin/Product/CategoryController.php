<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\loaisanpham;
use App\Models\Danhmuc;
class CategoryController extends Controller
{
    public function newCategory() {

        $loaisanpham = DB::table('loaisanpham')
        ->select('loaisanpham.*')
        ->get();
        $danhmucsanpham = DB::table('danhmuc')
        ->select('danhmuc.*')
        ->get();
       
        return view('pages.admin.product.new-category',compact('loaisanpham','danhmucsanpham'));
    }
    public function createCategory(Request $request) {
        loaisanpham::create([
           'LSP_Ten' => $request->LSP_Ten,
           'DM_STT' => $request->DM_STT
        ]);
        Session::flash('add-success', 'Thêm loại sản phẩm thành công');
        return redirect()->route('new-category');
    }

    public function getUpdateCategory($id) {
        $loaisanpham = DB::table('loaisanpham')
        ->where('loaisanpham.LSP_Ma','=', $id)
        ->first();
        // dd($loaisanpham);
        $danhmucsanpham = DB::table('danhmuc')
        ->select('danhmuc.*')
        ->get();
        return view('pages.admin.product.update-category',compact('loaisanpham','danhmucsanpham'));

    }
    
    public function updateCategory($id, Request $request) {
        DB::table('loaisanpham')
        ->where('loaisanpham.LSP_Ma', '=', $id)
        ->update([
            'LSP_Ten' => $request->LSP_Ten,
            'DM_STT' => $request->DM_STT
        ]);
        Session::flash('update-success', 'Cập nhật loại sản phẩm thành công');
        return redirect()->route('admin-category',compact('id'));
    }

    public function delete(Request $request)
    {
      $category_id = $request->input('category_id');
      loaisanpham::where('LSP_Ma', $category_id)->delete();
      Session::flash('delete-success', 'Xóa loại sản phẩm thành công');
      return redirect()->route('admin-category');
    }
   
}
