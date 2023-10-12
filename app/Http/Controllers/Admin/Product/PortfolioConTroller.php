<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PortfolioConTroller extends Controller
{
    public function newPortfolio() {

    $danhmuc = DB::table('danhmuc')
    ->select('danhmuc.*')
    ->get();
       
       
    return view('pages.admin.product.new-portfolio',compact('danhmuc'));
    }
}
