<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckFormAddCategory;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Category::select()
            ->orderBy('categories.created_at', 'desc')
            ->paginate(10);

        return view('admin_.categories.index', compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('admin_.categories/add-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckFormAddCategory $request)
    {
        $cate = new Category;
        $cate->name = $request->name;
        $cate->parent_id = 0;
        $cate->active = 1;
        $cate->slug = Category::url_slug($request->name);
        $cate->save();

        return redirect('admin/category')->with( ['data' => 'Thêm Danh Mục Thành Công !#!#!'] );

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = Category::find($id);
        if($cate == null) {
            return redirect('admin/category')->with( ['data' => 'Sai thông tin sản phẩm !!!'] );
        }
        return view('admin_.categories.edit-category', compact('cate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CheckFormAddCategory $request, $id)
    {
        $cate = Category::find($id);

        if($cate == null) {
            return redirect('admin/category')->with( ['data' => 'Sửa Danh Mục Thất Bại !!!'] );
        }

        $cate->name = $request->name;
        $cate->slug = Category::url_slug($request->name);
        $cate->save();

        return redirect('admin/category')->with( ['data' => 'Sửa Danh Mục Thành Công !+!+!'] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::find($id);

        if ($cate == null) { // kiem tra khong ton tai id
            return redirect()->back()->with( ['data' => 'Xóa Danh Mục thất bại !!!'] );
        }

        $pro = Product::where('category_id', $id)->get();
        foreach ($pro as $value) {
            $idPro = Product::find($value->id);
            $idPro::destroyImageSize();
            $idPro->delete();
        }
        $cate::destroyProduct();
        $cate->delete();
        return redirect()->back()->with( ['data' => 'Xóa Danh Mục Thành Công ^_^'] );;
    }
}
