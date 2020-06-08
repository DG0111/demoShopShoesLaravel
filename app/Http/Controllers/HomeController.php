<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $productsTest = DB::table('products')
            ->join('images', 'images.product_id', '=', 'products.id')
            ->select('name', 'price', 'url')
            ->limit(8)
            ->get();
        $categories = Category::all();
        return view('client_.index',['productsTest' => $productsTest,'categories' => $categories]);
    }
}
