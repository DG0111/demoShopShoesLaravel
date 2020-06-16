@extends('client_.layouts.layout_master')
@section('content')
    <div class="wrapper">
        <div class="breadcrumb-holder">
            <div class="container">
                <ul class="breadcrumb pull-left">
                    <li><a href="{{url('')}}">Home</a></li>
                    <li class='active'>{{$pro->name}}</li>
                </ul><!--breadcrumb-->
            </div><!--container-->
        </div><!--breadcrumb-holder-->

        <div id="single-product" class="inner-top-50">
            <div class="container">
                <div class="row single-product-row wow fadeIn">
                    <div class="col-sm-6 col-lg-6 gallery-holder">
                        <div class="product-image-slider">
                            <section class="slider wow fadeIn">
                                <div class="row">
                                    <div class="col-md-10 col-xs-10">
                                        <ul id="product-images">
                                            @foreach($pro->images as $value2)
                                                <li>
                                                    <a href="assets/images/products/big-image.jpg" data-title="Gallery"
                                                       data-lightbox="image-1">
                                                        <img
                                                            style="display: block;margin-left: auto;margin-right: auto;width: 50%;"
                                                            src="{{asset('files/'.$value2->url)}}" data-title="Gallery"
                                                            data-lightbox="image-1"
                                                            data-echo="{{asset('files/'.$value2->url)}}" alt=""/>
                                                        <span class="zoom-overlay"></span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 body-holder body-holder-style-1">
                        <div class="product-info">
                            <h1 class="single-product-title">{{$pro->name}}</h1>
                            <div class="social-icons-holder">
                                <ul class="social-icon-list clearfix">
                                    <li><a class="icon icon-facebook31" title="Facebook"
                                           href="http://www.facebook.com/transvelo"></a></li>
                                    <li><a class="icon icon-twitter21" title="Twitter" href="#"></a></li>
                                    <li><a class="icon icon-linkedin11" title="Pinterest" href="#"></a></li>
                                    <li><a class="icon icon-google29" title="Instagram" href="#"></a></li>

                                </ul>
                            </div>
                            <br>
                            <form class="cart" method="post" action="{{route('add-cart',$pro->id)}}">
                                @csrf
                                <div class="product-attributes">
                                    <div class="size-holder m-t-20 clearfix">
                                        <div class="quantity-holder">
                                            <span class="key">size giầy:</span>
                                            <select name="size">
                                                @foreach($pro->sizes as $value)
                                                    <option value="{{$value->id}}">{{$value->size}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="qnt-holder">
                                    <div class="quantity-holder">
                                        <span class="key">Số lượng:</span>
                                        <input type="number" class="txt txt-qty" title="Qty" value="1" name="quantity"
                                               min="1" max="10" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary single-add-cart-button">Thêm vào giỏ
                                        hàng
                                    </button>
                                </div>
                            </form>
                            <div id="product-simple-tab">
                                <div class="tabs">
                                    <ul class="nav nav-tabs nav-tab-cells">
                                        <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
                                        <li><a data-toggle="tab" href="#reviews">Reviews (4)</a></li>
                                    </ul>

                                    <div class="tab-content bewear-tab-content">
                                        <div id="description" class="tab-pane in active">
                                            <p class="text">
                                                {{$pro->description}}
                                            </p>
                                        </div>
                                        <div id="reviews" class="tab-pane">
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
                                                    round sunglasses. Cashmere skirt peach Miu Miu Bag 'N' Noun leather
                                                    shorts
                                                    oversized printed clashing patterns. Tulle printed jacket sheer
                                                    Prada Saffiano
                                                    white Converse.
                                                </p>
                                            </article>
                                            <article class="review">
                                                <div class="header">
                                                    <div class="star-rating gray" title="Rated 5.00 out of 5">
												<span style="width:80%">
													<strong class="rating">5.00</strong>
													out of 5
												</span>
                                                    </div>
                                                    <h4 class="author">Richard Doe</h4>
                                                    <span class="date">Aug 3, 2013</span>
                                                </div>
                                                <p class="text">
                                                    Leather jacket pastels backpack neutral green white. Strong eyebrows
                                                    washed out
                                                    Chanel. leggings skinny jeans Missoni capsule clutch cotton.
                                                </p>
                                            </article>
                                            <form class="review-form">
                                                <label class="raty-label">
                                                    Your rating for this item
                                                </label>
                                                <div class="star-rating gray" title="Rated 5.00 out of 5">
											<span style="width:80%">
												<strong class="rating">5.00</strong>
												out of 5
											</span>
                                                </div>

                                                <div class="form-group">
                                                    <label for="review">Your review</label>
                                                    <textarea rows="6" name="review" id="review"
                                                              class="form-control"></textarea>
                                                </div>
                                                <button class="btn btn-primary" type="submit">Submit review</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container inner-top-sm">
            <div role="tabpanel">
                <div class="tab-nav-holder single-product-tab inner-bottom-50">
                    <ul id="single-product-tabs" class="nav nav-tabs uppercase" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#wear-with" data-transition-type="backSlide" role="tab"
                               data-toggle="tab">Sản phẩm cùng hãng</a>
                        </li>
                        <li role="presentation"><a href="#related-products"
                                                                  data-transition-type="backSlide" role="tab"
                                                                  data-toggle="tab">Gợi ý cho bạn</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane" id="wear-with">
                        <div class="single-product-wear-it wow fadeInUp">
                            @foreach($productRelated as $value)
                                <div class="item wear-products">
                                    <div class='product-holder'>
                                        <div class="product">
                                            <div class="image">
                                                <a href="{{route('detailProduct',$value->slug)}}">
                                                    <img class="img-responsive"
                                                         width="252"
                                                         src="{{asset('files/'.$value->image->url)}}"
                                                         alt="">
                                                </a>
                                            </div><!-- .image -->
                                            <div class="product-info m-t-20 text-center">

                                                <h5 class="name uppercase">
                                                    <a href="{{route('detailProduct',$value->slug)}}">{{$value->name}}</a>
                                                </h5>
                                                <div class="product-price">
                                                    <ins><span class="amount">${{$value->price}}</span></ins>
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
                                        </div><!-- .product -->
                                    </div><!-- .product-holder -->
                                </div><!-- /.wear-products -->
                            @endforeach
                        </div>
                    </div><!-- /.tab-pane -->
                    <div role="tabpanel" class="tab-pane active" id="related-products">
                        <div class="single-product-related-products wow fadeInUp">
                            @foreach($proSuggest as $value)
                                <div class="item wear-products">
                                    <div class='product-holder'>
                                        <div class="product">
                                            <div class="image">
                                                <a href="{{route('detailProduct',$value->slug)}}">
                                                    <img class="img-responsive"
                                                         width="252"
                                                         src="{{asset('files/'.$value->image->url)}}"
                                                         alt="">
                                                </a>
                                            </div><!-- .image -->
                                            <div class="product-info m-t-20 text-center">

                                                <h5 class="name uppercase">
                                                    <a href="{{route('detailProduct',$value->slug)}}">{{$value->name}}</a>
                                                </h5>
                                                <div class="product-price">
                                                    <ins><span class="amount">${{$value->price}}</span></ins>
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
                                        </div><!-- .product -->
                                    </div><!-- .product-holder -->
                                </div><!-- /.wear-products -->
                            @endforeach
                        </div>
                    </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
            </div><!-- /.tabpanel -->
        </div><!-- /.containers -->
@stop
