<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckFormCheckout;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function create(CheckFormCheckout $request)
    {
//        if (Auth::check()) {
//            $order = new OrderDetail();
//            $order->user_id = Auth::id();
//            $order->number_phone = $request->number_phone;
//            $order->first_name = $request->first_name;
//            $order->last_name = $request->last_name;
//            $order->email = $request->email;
//            $order->address = $request->address;
//            $order->number_phone = $request->number_phone;
//            $order->save();
//
//            foreach (session('cart') as $id => $value) {
//                $orderDetail = new OrderDetail();
//                $orderDetail->user_id = Auth::id();
//                $orderDetail->product_id = $id;
//                $orderDetail->number_phone = $request->number_phone;
//                $orderDetail->first_name = $request->first_name;
//                $orderDetail->last_name = $request->last_name;
//                $orderDetail->email = $request->email;
//                $orderDetail->address = $request->address;
//                $orderDetail->number_phone = $request->number_phone;
//                $orderDetail->save();
//            }
//
//        }
    }
}
