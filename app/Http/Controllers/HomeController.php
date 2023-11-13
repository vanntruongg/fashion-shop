<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    function index() {
        $jacket_category = DB::table('sanpham')->where('LSP_Ma', 1)->get()->toArray();
        $t_shirt_category = DB::table('sanpham')->where('LSP_Ma', 2)->get()->toArray();
        $jean_category = DB::table('sanpham')->where('LSP_Ma', 8)->get()->toArray();
        return view('pages.guest.home', compact('jacket_category', 't_shirt_category', 'jean_category'));
    }
}
