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
        $productsNew = Product::orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        $categories = Category::all();
        $productsPromotion = Product::where('promotion_price', '!=', 0)
            ->orderBy('promotion_price', 'desc')
            ->limit(4)
            ->get();
        return view('client_.index', compact('categories', 'productsNew', 'productsPromotion'));
    }

    public function detailProduct($slug) {
        $pro = Product::where('slug','=',$slug)->first();

        $categories = Category::all();

        $productRelated = Product::where('category_id',$pro->category_id)
            ->where('id','!=',$pro->id)
            ->limit(8)
            ->get();
        $proSuggest = Product::all()->random(8);
            return view('client_.product-simple', compact('categories','pro', 'productRelated','proSuggest'));

    }

    public function productCate($slug) {
        $cate = Category::where('slug',$slug)->get();
        return view('client/catalog',compact('cate'));
    }

}
