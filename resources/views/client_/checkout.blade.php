@extends('client_.layouts.layout_master')

@section('content')
    <div class="page-header">
        <div class="container">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Shopping Bag</a></li>
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
                            <input name="first_name" type="text" class="form-control" id="first-name">
                        </div>
                        <div class="form-group">
                            <label for="last-name">Tên</label>
                            <input name="last_name" type="text" class="form-control" id="first-name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="street-address">Địa chỉ</label>
                            <input type="text" name="address" class="form-control" id="street-address">
                        </div>
                        <div class="form-group">
                            <label for="street-address">Số điện thoại</label>
                            <input type="text" name="number" class="form-control" id="street-address">
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
                            <div class="prices">${{$total}}</div>
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
                                            <img src="{{$pro['image']}}"
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
                                                           value="{{$pro['quantity']}}" type="text">
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
                                        ${{$pro['price']*$pro['quantity']}}
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
            console.log(id);
            console.log(value.value);
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
    </script>
@stop
