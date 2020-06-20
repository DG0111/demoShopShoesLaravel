<?php

namespace App\Http\Controllers;

use App\Exports\ExportOrder;
use App\Http\Requests\CheckFormCheckout;
use App\Order;
use App\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    public function create(CheckFormCheckout $request)
    {
        if (Auth::check()) {
            $order = new Order();
            $order->user_id = Auth::id();
            $order->number_phone = $request->number_phone;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->date = Carbon::now();
            $order->number_phone = $request->number_phone;
            $order->save();

            foreach (session('cart') as $id => $value) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $id;
                $orderDetail->price = $value['price'];
                $orderDetail->quantity = $value['quantity'];
                $orderDetail->save();
            }

            $request->session()->forget('cart');

            return redirect()->route('home')->with('success','Đặt hàng thành công');

        } else {
            $order = new Order();
            $order->number_phone = $request->number_phone;
            $order->first_name = $request->first_name;
            $order->last_name = $request->last_name;
            $order->email = $request->email;
            $order->address = $request->address;
            $order->date = Carbon::now();
            $order->number_phone = $request->number_phone;
            $order->save();

            foreach (session('cart') as $id => $value) {
                $orderDetail = new OrderDetail();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $id;
                $orderDetail->price = $value['price'];
                $orderDetail->quantity = $value['quantity'];
                $orderDetail->save();
            }

            $request->session()->forget('cart');

            return redirect()->route('home')->with('success','Đặt hàng thành công');
        }
    }

    public function export() {
        return Excel::download(new ExportOrder, 'recipes.xlsx');
    }

}
