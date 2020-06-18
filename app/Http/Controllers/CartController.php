<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }

    public function remove($id)
    {
        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }

            if(session('cart')) {
                return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
            }

            return redirect()->route('home')->with('err', 'Mời bạn mua hàng để có thể đặt hàng !! Thanks');

        };
    }

    public function showCart()
    {
        if(session('cart')) {
            $categories = Category::all();
            return view('client_.checkout', compact('categories'));
        }

        return redirect()->back()->with('err', 'Mời bạn mua hàng để có thể đặt hàng !! Thanks');

    }

    public function addToCart(Request $request, $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
        ]);

        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "id" => $id,
                    "name" => $product->name,
                    "image" => $product->image->url,
                    "quantity" => $request->quantity,
                    "size" => $request->size,
                    "price" => $product->price,
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');
        }

        $cart[$id] = [
            "id" => $id,
            "name" => $product->name,
            "image" => $product->image->url,
            "quantity" => $request->quantity,
            "size" => $request->size,
            "price" => $product->price,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Thêm sản phẩm thành công!');

    }


}
