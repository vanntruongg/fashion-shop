<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\chitietsanpham;
use App\Models\chitiethoadon;
use App\Models\hoadon;
use App\Models\loaisanpham;
use App\Models\sanpham;
class AdminController extends Controller
{
    public function getTopProduct( $limit = 2, $isDescending = true) {
        return DB::table('chitiethoadon')
          ->join('sanpham', 'sanpham.SP_Ma', '=', 'chitiethoadon.SP_Ma')
          ->join('loaisanpham', 'sanpham.LSP_Ma', '=', 'loaisanpham.LSP_Ma')
          ->select('sanpham.SP_Ten', 'loaisanpham.LSP_Ten', DB::raw('SUM(CTHD_SoLuong) as totalQuantity'))
          ->groupBy('sanpham.SP_Ten', 'loaisanpham.LSP_Ten')
          ->orderBy('totalQuantity', $isDescending ? 'desc' : 'asc')
          ->take($limit)
          ->get();
    }
    public function getTopCategory( $limit = 2, $isDescending = true) {
        return DB::table('chitiethoadon')
          ->join('sanpham', 'sanpham.SP_Ma', '=', 'chitiethoadon.SP_Ma')
          ->join('loaisanpham', 'sanpham.LSP_Ma', '=', 'loaisanpham.LSP_Ma')
          ->join('danhmuc','loaisanpham.DM_STT','=','danhmuc.DM_STT')
          ->select('sanpham.SP_Ten', 'loaisanpham.LSP_Ten','danhmuc.DM_Ten', DB::raw('SUM(CTHD_SoLuong) as totalQuantity'))
          ->groupBy('sanpham.SP_Ten', 'loaisanpham.LSP_Ten','danhmuc.DM_Ten')
          ->orderBy('totalQuantity', $isDescending ? 'desc' : 'asc')
          ->take($limit)
          ->get();
    }

    public function index() {
        $sanpham = Sanpham::all()->count();
        $totalCustomer = User::where('ND_VT', '=',  2)->count();
        
        $totalNewOrder = hoadon::all()->count();

        $topCustomer = DB::table('users')
        ->join('hoadon', 'users.id', '=', 'hoadon.ND_id')
        ->join('chitiethoadon', 'hoadon.HD_Ma', '=', 'chitiethoadon.HD_Ma')
        ->select('users.ND_Ho', 'users.ND_Ten', 'users.ND_SDT', 'users.email', 'users.ND_Diachi', DB::raw('SUM(chitiethoadon.CTHD_DonGia * chitiethoadon.CTHD_SoLuong) AS total_spent'))
        ->groupBy('users.ND_Ho',  'users.ND_Ten', 'users.ND_SDT', 'users.email', 'users.ND_Diachi')
        ->orderByDesc('total_spent')
        ->limit(2)
        ->get();
        
        $mostProduct = $this->getTopProduct(2, true);
    
        $leastProduct = $this->getTopProduct(2, false);

        $mostCategory = $this->getTopCategory(2, true);
        $leastCategory = $this->getTopCategory(2, false);
        return view('pages.admin.dashboard',compact('sanpham','totalCustomer','totalNewOrder','topCustomer','mostProduct','leastProduct','mostCategory','leastCategory'));

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
