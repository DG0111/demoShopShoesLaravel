<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
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
            ->where('quantity', '>', '0')
            ->limit(4)
            ->get();
        $categories = Category::all();

        $productsPromotion = Product::whereColumn('price', '!=', 'promotion_price')
            ->where('quantity', '>', '0')
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        return view('client_.index', compact('categories', 'productsNew', 'productsPromotion'));
    }

    public function detailProduct($slug)
    {
        $pro = Product::where('slug', '=', $slug)->first();

        $comments = Comment::where('product_id', $pro->id)
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $categories = Category::all();

        $productRelated = Product::where('category_id', $pro->category_id)
            ->where('id', '!=', $pro->id)
            ->where('quantity', '>', '0')
            ->limit(8)
            ->get();
        $proSuggest = Product::all()->random(8);
        return view('client_.product-simple', compact('categories', 'comments', 'pro', 'productRelated', 'proSuggest'));

    }

    public function productCate($slug)
    {
        $cate = Category::where('slug', $slug)->first();
        $categories = Category::all();
        $product = Product::where('category_id', $cate->id)
            ->where('quantity', '>', '0')
            ->orderBy('created_at', 'desc')
            ->paginate(12);
        return view('client_.catalog', compact('categories', 'cate', 'product'));
    }


    //search
    public function search(Request $request)
    {
        $product = Product::where('name', 'LIKE', '%' . $request->key . '%')
            ->orWhere('description', 'LIKE', '%' . $request->key . '%')
            ->paginate(12);

        $categories = Category::all();
        return view('client_.catalog', compact('categories', 'product'));
    }

}
