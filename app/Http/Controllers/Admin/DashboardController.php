<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard() {
        $countProduct = Product::all()->count();
        $countProductView = Product::select('view_count')->sum('view_count');
        return view('admin_.index',compact('countProduct','countProductView'));
    }
}
