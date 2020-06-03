<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateProduct;
use App\Image;
use App\Product;
use App\Size;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pro = Product::select()
            ->orderBy('products.created_at', 'desc')
            ->paginate(10);

        return view('admin_.products.index', compact('pro'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cate = Category::all();

        return view('admin_.products.add-product', compact('cate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProduct $request)
    {
        // product
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->promotion_price = $request->promotion_price;
        $product->quantity = $request->quantity;
        $product->status = 1;
        $product->slug = Product::slugify($request->name);
        $product->save();
        $productNew = Product::select('id')->where('name', '=', $request->name)->get(); //sản phẩm vừa thêm
        $idProduct = $productNew[0]->id;

        //image
//        $image = new Image;
//        $files = $request->image_id;

        foreach ($request->file('image_id') as $file) {
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path() . '/files/', $name);
            $image = new Image;
            $image->product_id = $idProduct;
            $image->url = $name;
            $image->save();
        }

        foreach ($request->size as $value) {
            $size = new Size;
            $size->size = $value;
            $size->product_id = $idProduct;
            $size->save();
        }

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
        $cate = Category::all();
        $pro = Product::find($id);

        foreach ($pro->sizes as $sizes) {
            $size [] = $sizes->size;
        }
        return view('admin_/products/edit-product', compact('pro', 'cate', 'size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateProduct $request, $id)
    {
        // product
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->promotion_price = $request->promotion_price;
        $product->quantity = $request->quantity;
        $product->status = 1;
        $product->slug = Product::slugify($request->name);
        $product->save();
        //image

        $imageDelete = Image::where('product_id','=',$id)->delete();
        $sizeDelete = Size::where('product_id','=',$id)->delete();

        foreach ($request->file('image_id') as $file) {
            $name = time() . '.' . $file->getClientOriginalName();
            $file->move(public_path() . '/files/', $name);
            $image = new Image;
            $image->product_id = $id;
            $image->url = $name;
            $image->save();
        }

        foreach ($request->size as $value) {
            $size = new Size;
            $size->product_id = $id;
            $size->size = $value;
            $size->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::where('product_id', $id)->delete();
        Size::where('product_id', $id)->delete();
        Product::destroy($id);
        return redirect('admin/product');
    }
}
