<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class AdminController extends Controller
{
    public function index() {
        return view('pages.admin.dashboard');
    }
    public function product(Request $request ) {
        $page = $request->query('page',1);
        $data = DB::table('sanpham')
        ->join('loaisanpham','sanpham.LSP_Ma','loaisanpham.LSP_Ma')
        ->join('chitietsanpham','sanpham.SP_Ma','chitietsanpham.SP_Ma') 
        ->select('sanpham.*','loaisanpham.LSP_Ten','chitietsanpham.CTSP_SoLuong')
        ->paginate(5);

        return view('pages.admin.product.product',compact('data','page'));
    }

    public function category(Request $request ) {
        $page = $request->query('page',1);
        $data = DB::table('loaisanpham')
        ->join('danhmuc','loaisanpham.DM_STT','danhmuc.DM_STT') 
        ->select('loaisanpham.*','danhmuc.DM_Ten')
        ->paginate(5);
        return view('pages.admin.product.categoryproduct',compact('data','page'));
    }
    public function portfolio(Request $request) {
        $page = $request->query('page',1);
        $data = DB::table('danhmuc')
        ->select('danhmuc.*')
        ->paginate(5);

        return view('pages.admin.product.portfolio',compact('data','page'));

    }

    public function users(Request $request) {
        $page = $request->query('page', 1);
        $data = DB::table('users')
        ->join('vaitro', 'users.ND_VT', '=', 'vaitro.VT_Ma')
        ->select('users.*','vaitro.VT_Ten')
        ->paginate(5);
        
        return view('pages.admin.users.users',compact('data','page'));
    }
    public function orders(Request $request) {
        $page = $request->query('page',1);
        $data = DB::table('hoadon')
        ->join('users','hoadon.ND_id','users.id')
        ->select('hoadon.*','users.ND_Ho','users.ND_Ten')
        ->paginate(5);
        return view ('pages.admin.order.order',compact('data','page'));
    }
   
    
}
