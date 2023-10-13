<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    // dd($loaisanpham,$mausac,$kichthuoc); 
    return view('pages.admin.product.new-product',compact('loaisanpham','mausac','kichthuoc'));
    }
}
