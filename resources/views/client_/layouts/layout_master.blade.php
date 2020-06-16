<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','NGO VAN LONG')</title>
    <!-- Bootstrap -->
    <link href="{{asset('client_/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('client_/assets/css/jasny-bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('client_/assets/css/lightbox.css')}}" rel="stylesheet">
    <link href="{{asset('client_/assets/css/bewear-icons.css')}}" rel="stylesheet">
    <link href="{{asset('client_/assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('client_/assets/css/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{asset('client_/assets/css/main.min.css')}}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600,700,800" rel="stylesheet"
          type="text/css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('client_/assets/images/favicon.png')}}">

    @yield('link')
</head>
<body>
<div class="wrapper">
    @include('client_.layouts.header')
    <div class="main-content home-2">
        @yield('content')
    </div>
    <div class="modal fade bs-example-modal-lg quick-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row single-product-row">
                        <div class="col-sm-6 col-lg-6 col-xs-12 gallery-holder">
                            <div class="product-image-slider">
                                <div class="quick-view-slider">
                                    <div class="item">
                                        <img src="assets/images/blank.gif"
                                             data-echo="assets/images/products/quick-product.png" alt=""/>
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/blank.gif"
                                             data-echo="assets/images/products/quick-product.png" alt=""/>
                                    </div>
                                    <div class="item">
                                        <img src="assets/images/blank.gif"
                                             data-echo="assets/images/products/quick-product.png" alt=""/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-6 col-xs-12 body-holder">
                            <div class="product-info">
                                <div class="product-rating-holder">
                                    <a href="#" class="product-rating">
                                        <div class="star-rating gray" title="Rated 5.00 out of 5">
										<span style="width:80%">
											<strong class="rating">5.00</strong>
											out of 5
										</span>
                                        </div>
                                    </a>
                                    <a href="#reviews" class="review-link">(4 reviews)</a>
                                </div>

                                <h1 class="single-product-title">Converse Chuck Taylor</h1>
                                <div class="product-brand">Calvin Klein</div>
                                <div class="product-price">
                                    <ins><span class="amount">$492.00</span></ins>
                                </div>

                                <div class="product-attributes">
                                    <div class="color-holder clearfix">
                                        <span class="key">Color:</span> <span class="value">Black  Native</span>
                                        <ul class="color-picker clearfix">
                                            <li><input class="le-radio blue checked" type="radio" value="color1"
                                                       name="main" checked="checked">
                                            </li>
                                            <li><input class="le-radio gray" type="radio" value="color2" name="main">
                                            </li>
                                            <li><input class="le-radio red" type="radio" value="color3" name="main">
                                            </li>
                                            <li><input class="le-radio green" type="radio" value="color4" name="main">
                                            </li>
                                            <li><input class="le-radio" type="radio" value="color5" name="main">
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="size-holder m-t-20 clearfix">
                                        <span class="key">size:</span>
                                        <ul class="size-picker clearfix">
                                            <li><input id="group1-1" class="attribute-radio" type="radio" value="color1"
                                                       name="group">
                                                <label for="group1-1"><span>7</span></label>
                                            </li>
                                            <li><input id="group2-1" class="attribute-radio" type="radio" value="color2"
                                                       name="group">
                                                <label for="group2-1"><span>8</span></label>
                                            </li>
                                            <li><input id="group3-1" class="attribute-radio" type="radio" value="color3"
                                                       name="group">
                                                <label for="group3-1"><span>8.5</span></label>
                                            </li>
                                            <li><input id="group4-1" class="attribute-radio" type="radio" value="color4"
                                                       name="group">
                                                <label for="group4-1"><span>9</span></label>
                                            </li>
                                            <li><input id="group5-1" class="attribute-radio" type="radio" value="color5"
                                                       name="group">
                                                <label for="group5-1"><span>9.5</span></label>
                                            </li>
                                            <li><input id="group6-1" class="attribute-radio" type="radio" value="color6"
                                                       name="group">
                                                <label for="group6-1"><span>10</span></label>
                                            </li>
                                            <li><input id="group7-1" class="attribute-radio" type="radio" value="color7"
                                                       name="group">
                                                <label for="group7-1"><span>11</span></label>
                                            </li>
                                            <li><input id="group8-1" class="attribute-radio" type="radio" value="color8"
                                                       name="group">
                                                <label for="group8-1"><span>12.5</span></label>
                                            </li>
                                            <li><input id="group9-1" class="attribute-radio" type="radio" value="color9"
                                                       name="group">
                                                <label for="group9-1"><span>13</span></label>
                                            </li>
                                            <li><input id="group10-1" class="attribute-radio" type="radio"
                                                       value="color10" name="group">
                                                <label for="group10-1"><span>13.5</span></label>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                                <div class="qnt-holder">
                                    <form class="cart">
                                        <div class="quantity-holder">
                                            <span class="key">Qty:</span>
                                            <input type="number" class="txt txt-qty" title="Qty" value="1"
                                                   name="quantity" min="1" step="1">
                                        </div>

                                        <button type="submit" class="btn btn-primary single-add-cart-button">Add to
                                            bag
                                        </button>

                                        <a href="#" title="Wishlist" class="btn add-to-wishlist"></a>

                                    </form>
                                </div>

                                <div id="product-simple-tab1" class="hidden-sm">
                                    <div class="tabs">
                                        <ul class="nav nav-tabs nav-tab-cells">
                                            <li class="active"><a data-toggle="tab" href="#modal-description">Description</a>
                                            </li>
                                            <li><a data-toggle="tab" href="#modal-info">Sizing</a></li>
                                            <li><a data-toggle="tab" href="#modal-reviews">Reviews (4)</a></li>
                                        </ul>

                                        <div class="tab-content bewear-tab-content">
                                            <div id="modal-description" class="tab-pane fade in active">
                                                <p class="text">
                                                    Sed quis nunc efficitur, gravida orci sed, gravida felis. Quisque
                                                    non euismod felis. Suspendisse consectetur, tellus in condimentum
                                                    fringilla.</p>
                                                <ul>
                                                    <li>- 98% Cotton, 2% Elastane</li>
                                                    <li>- Zip fly and button fastening</li>

                                                </ul>
                                            </div>
                                            <div id="modal-info" class="tab-pane fade">
                                                <ul class="tabled-data">
                                                    <li>
                                                        <label>weight</label>
                                                        <div class="value">7.25 kg</div>
                                                    </li>
                                                    <li>
                                                        <label>dimensions</label>
                                                        <div class="value">90x60x90 cm</div>
                                                    </li>
                                                    <li>
                                                        <label>size</label>
                                                        <div class="value">one size fits all</div>
                                                    </li>
                                                    <li>
                                                        <label>color</label>
                                                        <div class="value">white</div>
                                                    </li>
                                                    <li>
                                                        <label>guarantee</label>
                                                        <div class="value">5 years</div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="modal-reviews" class="tab-pane fade">
                                                <article class="review">
                                                    <div class="header">
                                                        <div class="star-rating gray" title="Rated 5.00 out of 5">
															<span style="width:80%">
																<strong class="rating">5.00</strong>
																out of 5
															</span>
                                                        </div>
                                                        <h4 class="author">Richard Doe</h4>
                                                        <span class="date">Aug 7, 2013</span>
                                                    </div>
                                                    <p class="text">
                                                        Choupette Mulberry dark red lipstick crop button up chunky sole
                                                        chambray shirt
                                                        maxi skirt vintage Levi shorts. Loafers 90s collar indigo denim
                                                        silver collar
                                                        round sunglasses.
                                                    </p>
                                                </article>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="remove-icon" data-dismiss="modal" aria-label="Close"><span
                            class="icon icon-quickview-close"></span></a>
                </div>
            </div>
        </div>
    </div>
</div><!-- /.wrapper -->
@include('client_.layouts.footer')
<div id="shopping-cart-summary" class="navmenu-shopping-cart navmenu navmenu-default navmenu-fixed-right offcanvas">
    <header>
        <h3 class="section-title">Sản phẩm của bạn
            <span class="item-count">
                @if(session('cart'))
                    @php
                        $quantity = 0;
                    @endphp
                    @foreach(session('cart') as $id => $product)
                        @php
                            $quantity += $product['quantity'];
                        @endphp
                    @endforeach
                    {{$quantity}}
                @else
                    0
                @endif
            </span>
        </h3>
    </header>
    <div class="cart-products">
        <div class="cart-block-list">
            <ul>
                @php $total = 0 @endphp
                @if(session('cart'))
                    @foreach(session('cart') as $id => $pro)
                        @php $total += $pro['price'] * $pro['quantity'] @endphp
                        <li>
                            <div class="product">
                                <div class='row'>
                                    <div class="col-md-4 col-sm-4">
                                        <a href="product-simple.html">
                                            <img src="{{asset('files/'.$pro['image'])}}"
                                                 alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-8 col-sm-8">
                                        <div class="cart-info">
                                            <div class="product-name">
                                                <span class="quantity-formated"><span
                                                        class="quantity">{{ $pro['quantity'] }}</span>x</span>
                                                <a href="product-simple.html">{{ $pro['name'] }}</a>
                                            </div>

                                            <div class="product-price">
                                                <span class='amount'>${{ $pro['price'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form class="delete" action="{{route('delete-product-in-cart', $id)}}"
                                      method="post">
                                    <button style="border: none; background: none;" type="submit"
                                            class="remove-link"></button>
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
                            </div>
                        </li>
                    @endforeach
                @else
                    <i>Chưa có sản phẩm nào</i>
                @endif
            </ul>

            <div class="cart-summary text-center inner-top-50">
                <h5 class="cart-total">Tổng tiền</h5>
                <p class="cart-total-price">${{$total}}</p>
                @if(session('cart'))
                    <a class="btn btn-primary btn-uppercase continue-shopping" href="{{route('check-out')}}">Đặt
                        Hàng</a>
                @endif
            </div>
        </div>
    </div>

</div>

<div class="overlay"></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('client_/assets/js/jquery-1.11.2.min.js')}}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{asset('client_/assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client_/assets/js/jasny-bootstrap.min.js')}}"></script>
<script src="{{asset('client_/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('client_/assets/js/wow.min.js')}}"></script>
<script src="{{asset('client_/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('client_/assets/js/echo.min.js')}}"></script>
<script src="{{asset('client_/assets/js/lightbox.min.js')}}"></script>
<script src="{{asset('client_/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{asset('client_/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('client_/assets/js/jquery.customSelect.min.js')}}"></script>
<script src="{{asset('client_/assets/js/jquery.bxslider.min.js')}}"></script>
<script src="{{asset('client_/assets/js/jquery.isotope.min.js')}}"></script>
<script src="{{asset('client_/assets/js/pace.min.js')}}"></script>
<script src="{{asset('client_/assets/js/odometer.min.js')}}"></script>
<script src="{{asset('client_/assets/js/scripts.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
        @if (Session::get('success'))
    const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            onOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

    Toast.fire({
        icon: 'Thành Công',
        title: '{{Session::get('success')}}'
    });
    @endif
    @if (Session::get('err'))
    Swal.fire({
        title: '{{Session::get('err')}}',
        showClass: {
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        }
    });
    @endif
</script>
@yield('script')
</body>
</html>
