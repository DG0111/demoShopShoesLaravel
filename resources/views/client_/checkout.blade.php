@extends('client_.layouts.layout_master')

@section('content')
    <div class="page-header">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="{{route('home')}}">Home</a></li>
                <li class="active">Checkout</li>
            </ol>
        </div>
    </div>
    <section class="checkout container">
        <div class="row">
            <section class="billing-address col-md-5">
                <header>
                    <h3 class="section-title"><span class="step-no">1.</span> Địa chỉ giao hàng</h3>
                </header>
                <div class="billing-address-form">
                    <form action="{{route('create-order')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="first-name">Họ</label>
                            <input value="{{ old('first_name') }}" name="first_name" type="text" class="form-control" id="first-name">
                            <span class="text-danger">{{$errors->first('first_name')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="last-name">Tên</label>
                            <input value="{{ old('last_name') }}" name="last_name" type="text" class="form-control" id="first-name">
                            <span class="text-danger">{{$errors->first('last_name')}}</span>

                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input value="{{ old('email') }}" type="email" name="email" class="form-control" id="email">
                            <span class="text-danger">{{$errors->first('email')}}</span>

                        </div>
                        <div class="form-group">
                            <label for="street-address">Địa chỉ</label>
                            <input value="{{ old('address') }}" type="text" name="address" class="form-control" id="street-address">
                            <span class="text-danger">{{$errors->first('address')}}</span>

                        </div>
                        <div class="form-group">
                            <label for="street-address">Số điện thoại</label>
                            <input value="{{ old('number_phone') }}" type="text" name="number_phone" class="form-control" id="street-address">
                            <span class="text-danger">{{$errors->first('number_phone')}}</span>
                        </div>
                        {{--                        <div class="form-group checkbox">--}}
                        {{--                            <label>--}}
                        {{--                                <input type="checkbox"> Create an account for later use--}}
                        {{--                            </label>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="checkbox">--}}
                        {{--                            <label>--}}
                        {{--                                <input type="checkbox"> Ship to the same address--}}
                        {{--                            </label>--}}
                        {{--                        </div>--}}
                        <div class="checkout-action text-right">
                            <button type="submit" class="btn btn-primary">Đặt Hàng Ngay</button>
                        </div>
                    </form>
                </div>
            </section>

            {{--            <div class="col-md-3">--}}
            {{--                <section class="shipping-method">--}}
            {{--                    <header>--}}
            {{--                        <h3 class="section-title"><span class="step-no">3.</span> Payment Method</h3>--}}
            {{--                    </header>--}}
            {{--                    <ul class="payment-methods list-unstyled">--}}
            {{--                        <li class="radio"><label><input type="radio" name="payment-method"> PayPal Express</label></li>--}}
            {{--                        <li class="radio"><label><input type="radio" name="payment-method"> Credit Card</label></li>--}}
            {{--                    </ul>--}}
            {{--                </section>--}}
            {{--            </div>--}}
            <section class="col-md-7">
                <header>
                    <h3 class="section-title"><span class="step-no">2.</span> Xem lại đơn hàng của bạn</h3>
                </header>
                <table class="table order-review-table">
                    <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        @php
                            $total = 0;
                            if(session('cart')) {
                                foreach (session('cart') as $id => $value) {
                                    $total += $value['price']*$value['quantity'];
                                }
                            }
                        @endphp

                        <th>Tổng tiền</th>
                        <td>
                            <div class="prices">VNĐ{{$total}}</div>
                        </td>
                    </tr>
                    </tfoot>
                    <tbody>
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $pro)
                            <tr>
                                <td>
                                    <div class="product media">
                                        <div class="media-left">
                                            <img width="100px" src="{{asset('files/'.$pro['image'])}}"
                                                 alt="Product Name" class="media-object">
                                        </div>
                                        <div class="media-body media-middle">
                                            <h3 class="product-title"><span class="product-quantity">{{$pro['quantity']}} x</span> {{$pro['name']}}
                                            </h3>
                                            <ul class="product-attributes">
                                                <li>
                                                    Quantity
                                                    <input placeholder="quantity"
                                                           onchange="updateQuantity({{$id}}, this)"
                                                           value="{{$pro['quantity']}}" type="number">
                                                </li>
                                                <li>Size : {{$pro['size']}}</li>
                                                <li>
                                                    <form class="delete"
                                                          action="{{route('delete-product-in-cart', $id)}}"
                                                          method="post">
                                                        <button class="btn-warning" type="submit">Xóa</button>
                                                        {{--                                    <input--}}
                                                        {{--                                        style="font-size: 12px"--}}
                                                        {{--                                        id="delete"--}}
                                                        {{--                                        class="remove-link"--}}
                                                        {{--                                        type="submit"--}}
                                                        {{--                                        onclick="deleteProduct()"--}}
                                                        {{--                                        value="Delete"/>--}}
                                                        @method('delete')
                                                        @csrf
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <div class="prices">
                                        VNĐ{{$pro['price']*$pro['quantity']}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </section>
        </div>
    </section>
@stop

@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        function updateQuantity(id, value) {

            if (value.value < 1) {
                value.value = 1;
            } else if (value.value > 10) {
                value.value = 1;
            } else if (Number.isInteger(value.value)) {
                value.value = 1;
            } else {
                axios.post('update-cart', { // <== use axios.post
                    _method: 'patch',
                    id: id,
                    quantity: value.value
                })
                    .then(function (response) {
                        window.location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }
        }
    </script>
@stop
