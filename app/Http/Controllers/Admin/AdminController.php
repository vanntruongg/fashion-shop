<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view('pages.admin.dashboard');
    }
    public function product(Request $request ) {
        $page = $request->query('page',1);
        $data = DB::table('sanpham')
        ->join('loaisanpham','sanpham.LSP_Ma','loaisanpham.LSP_Ma') 
        ->select('sanpham.*','loaisanpham.LSP_Ten')
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

    public function users(Request $request) {
        $page = $request->query('page', 1);
        $data = DB::table('users')
        ->join('vaitro', 'users.ND_VT', '=', 'vaitro.VT_Ma')
        ->select('users.*','vaitro.VT_Ten')
        ->paginate(5);
        
        return view('pages.admin.users.users',compact('data','page'));
    }
}
