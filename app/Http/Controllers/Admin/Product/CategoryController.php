<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    public function newCategory() {

        $loaisanpham = DB::table('loaisanpham')
        ->select('loaisanpham.*')
        ->get();
       
       
        return view('pages.admin.product.new-category',compact('loaisanpham'));
    }
}
