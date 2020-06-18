@extends('client_.layouts.layout_master')
@section('content')
    <div class="wrapper">
        <main>
            <div class="catalog-content">
                <div class="container">
                    <div class="row row-no-margin">
                        <div class="col-md-9 col-sm-10">
                            <div class="control-bar">
                                <ul class="breadcrumb">
                                    <li><a href="{{route('home')}}">Home</a></li>
                                    <li class="active">{{$cate->name}}</li>
                                </ul><!-- /.breacrumb -->
                                {{--                                <ul class="listing-options">--}}
                                {{--                                    <li class="sort-by">--}}
                                {{--                                        <label for="sort-by">Sort by:</label>--}}
                                {{--                                        <select id="sort-by">--}}
                                {{--                                            <option value="">Newest</option>--}}
                                {{--                                            <option value="aye">Aye</option>--}}
                                {{--                                            <option value="eh">Eh</option>--}}
                                {{--                                            <option value="ooh">Ooh</option>--}}
                                {{--                                            <option value="whoop">Whoop</option>--}}
                                {{--                                        </select>--}}
                                {{--                                    </li><!-- /.sort-by -->--}}
                                {{--                                    <li class="show-count">--}}
                                {{--                                        <select id="no-of-items">--}}
                                {{--                                            <option value="60">60</option>--}}
                                {{--                                            <option value="100">100</option>--}}
                                {{--                                        </select>--}}
                                {{--                                    </li><!-- /.show-count -->--}}
                                {{--                                </ul><!-- /.listing-options -->--}}
                            </div><!-- /.control-bar -->
                            <div class="catalog-products clearfix">
                                @if(!empty($product) && $product->count())
                                    @foreach($product as $value)
                                        <div class='col-md-6 col-sm-6 col-lg-4 col-xs-12 product-holder'>
                                            <div class="product">

                                                <div class="image">
                                                    <a href="{{route('detailProduct',$value->slug)}}">
                                                        <img class="img-responsive"
                                                             width="258"
                                                             src="{{asset('files/'.$value->image->url)}}"
                                                             alt="">
                                                    </a>
                                                </div><!-- .image -->
                                                <div class="product-info m-t-20 text-center">

                                                    <h5 class="name uppercase"><a
                                                            href="{{route('detailProduct',$value->slug)}}">{{$value->name}}</a>
                                                    </h5>
                                                    <div class="product-price">
                                                        <ins><span class="amount">${{$value->promotion_price}}</span></ins>
                                                    </div><!-- .product-price -->
                                                    <div class="buttons-holder m-t-20">
                                                        <div class="add-cart-holder">
                                                            <a title="Add to cart" href="{{route('detailProduct',$value->slug)}}"
                                                               class="cart-button btn btn-primary">
                                                                <span>Xem chi tiết</span>
                                                            </a>
                                                        </div><!-- .add-cart-holder -->
                                                    </div><!-- .buttons-holder -->
                                                </div><!-- .product-info -->
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    Hiện tại chung tôi đang hết sản phẩm trong danh mục {{$cate->name}}
                                @endif
                            </div><!-- /.catalog-products -->
                        </div>
                        <div class="col-md-3 col-sm-2">
                            <div class="right-sidebar">
                                <div class="sidebar">
                                    <h5 class="sidebar-title uppercase">category</h5>
                                    <div class="body">
                                        <ul>
                                            @foreach($categories as $value)
                                                <li><a href="{{route('product_cate',$value->slug)}}">{{$value->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div><!-- /.body -->
                                </div><!-- /.sidebar -->
                                <div class="sidebar">
                                    <h5 class="sidebar-title uppercase">filter</h5>
                                    <div class="body">
                                        <div class="accordion">
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a href="#collapseOne" data-toggle="collapse"
                                                       class="accordion-toggle collapsed">
                                                        Price
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                                                <div class="accordion-body collapse" id="collapseOne">
                                                    <div class="accordion-inner">
                                                        <div id="slider-range" class="m-t-20"></div>
                                                        <p class="slider-price-range"><input type="text" id="amount">
                                                        </p>
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->

                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a href="#collapseTwo" data-toggle="collapse"
                                                       class="accordion-toggle collapsed">
                                                        Color
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                                                <div class="accordion-body collapse" id="collapseTwo">
                                                    <div class="accordion-inner">
                                                        <div class="color-holder clearfix">
                                                            <ul class="color-picker clearfix">
                                                                <li><input class="le-radio blue checked" type="radio"
                                                                           value="color1" name="sidebar"
                                                                           checked="checked">
                                                                </li>
                                                                <li><input class="le-radio gray" type="radio"
                                                                           value="color2"
                                                                           name="sidebar"></li>
                                                                <li><input class="le-radio red" type="radio"
                                                                           value="color3"
                                                                           name="sidebar"></li>
                                                                <li><input class="le-radio green" type="radio"
                                                                           value="color4" name="sidebar"></li>
                                                                <li><input class="le-radio" type="radio" value="color5"
                                                                           name="sidebar"></li>
                                                            </ul><!-- /.color-picker -->
                                                        </div><!-- /.color-holder -->
                                                    </div><!-- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->
                                            </div><!-- /.accordion-group -->


                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a href="#collapse3" data-toggle="collapse"
                                                       class="accordion-toggle collapsed">
                                                        Size
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                                                <div class="accordion-body collapse" id="collapse3">
                                                    <div class="accordion-inner">
                                                        <div class="size-holder clearfix">
                                                            <ul class="size-picker clearfix">
                                                                <li>
                                                                    <input id="group1" class="attribute-radio"
                                                                           type="radio"
                                                                           value="color1" name="group">
                                                                    <label for="group1"><span>7</span></label>
                                                                </li>
                                                                <li>
                                                                    <input id="group2" class="attribute-radio"
                                                                           type="radio"
                                                                           value="color2" name="group">
                                                                    <label for="group2"><span>8</span></label>
                                                                </li>
                                                                <li>
                                                                    <input id="group3" class="attribute-radio"
                                                                           type="radio"
                                                                           value="color3" name="group">
                                                                    <label for="group3"><span>8.5</span></label>
                                                                </li>
                                                                <li>
                                                                    <input id="group4" class="attribute-radio"
                                                                           type="radio"
                                                                           value="color4" name="group">
                                                                    <label for="group4"><span>9</span></label>
                                                                </li>
                                                                <li>
                                                                    <input id="group5" class="attribute-radio"
                                                                           type="radio"
                                                                           value="color5" name="group">
                                                                    <label for="group5"><span>9.5</span></label>
                                                                </li>
                                                                <li>
                                                                    <input id="group6" class="attribute-radio"
                                                                           type="radio"
                                                                           value="color6" name="group">
                                                                    <label for="group6"><span>10</span></label>
                                                                </li>
                                                            </ul><!-- /.size-picker -->
                                                        </div><!-- /.size-holder -->
                                                    </div><!--- /.accordion-inner -->
                                                </div><!-- /.accordion-body -->

                                            </div><!-- /.accordion-group -->
                                        </div><!-- /.accordion -->
                                    </div><!-- /.body -->
                                </div><!-- /.sidebar -->
                                <div class="free-shipping-ad">Free Standard Shipping <br>at $75</div>
                            </div><!-- /.right-sidebar -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->

                </div><!-- /.container -->
            </div><!-- /.catalog-content -->
            <div class="pagination-holder">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4 text-center center-block">
                            {!! $product->appends(Request::all())->links() !!}
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.pagination-holder --></main><!-- /main -->
    </div>
@stop
