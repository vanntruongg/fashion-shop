<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\danhmuc;
class PortfolioConTroller extends Controller
{
    public function newPortfolio() {

    $danhmuc = DB::table('danhmuc')
    ->select('danhmuc.*')
    ->get();
       
       
    return view('pages.admin.product.new-portfolio',compact('danhmuc'));
    }
    
    public function createPortfolio(Request $request) {
        danhmuc::create([
            'DM_Ten' => $request->input('DM_Ten')
        ]);

        Session::flash('add-success', 'Thêm danh mục thành công');
        return redirect()->route('new-portfolio');
    }

    public function getUpdatePortfolio($id) {
        $danhmuc = DB::table('danhmuc')
        ->where('danhmuc.DM_STT','=',$id)
        ->first();

        return view('pages.admin.product.update-portfolio', compact('danhmuc'));
    }

    public function updatePortfolio($id, Request $request) {
        DB::table('danhmuc')
        ->where('danhmuc.DM_STT', '=', $id)
        ->update([
            'DM_Ten' => $request->DM_Ten,
            
        ]);
        Session::flash('update-success', 'Cập nhật danh mục thành công');
        return redirect()->route('admin-portfolio',compact('id'));
    }
    public function delete(Request $request)
    {
      $portfolio_id = $request->input('portfolio_id');
      danhmuc::where('DM_STT', $portfolio_id )->delete();
      Session::flash('delete-success', 'Xóa danh mục thành công');
      return redirect()->route('admin-portfolio');
    }
}
