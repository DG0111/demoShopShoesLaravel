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
                                                    <img
                                                        style="display: block;margin-left: auto;margin-right: auto;width: 50%;"
                                                        src="{{asset('files/'.$value2->url)}}" data-title="Gallery"
                                                        data-lightbox="image-1"
                                                        data-echo="{{asset('files/'.$value2->url)}}" alt=""/>
                                                    <span class="zoom-overlay"></span>
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
                                        <input type="number" class="txt txt-qty" title="Qty" value="1" name="quantity" min="1" max="10" required>
                                        <span class="text-danger">{{$errors->first('quantity')}}</span>
                                    </div>
                                    <button type="submit" class="btn btn-primary single-add-cart-button">Thêm vào giỏ
                                        hàng
                                    </button>
                                </div>
                            </form>
                            <div id="product-simple-tab">
                                <div class="tabs">
                                    <ul class="nav nav-tabs nav-tab-cells">
                                        <li class="active"><a data-toggle="tab" href="#description">Mô tả</a></li>
                                        <li><a data-toggle="tab" href="#reviews">Đánh giá ({{$comments->count()}})</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content bewear-tab-content">
                                        <div id="description" class="tab-pane in active">
                                            <p class="text">
                                                {{$pro->description}}
                                            </p>
                                        </div>
                                        <div id="reviews" class="tab-pane">
                                            <div id="commentDiv">
                                                @if(!empty($comments) && $comments->count())
                                                    @foreach($comments as $c)
                                                        <article class="review">
                                                            <div class="header">
                                                                <h4 class="author">
                                                                    {{$c->user->full_name}}</h4>
                                                                <span
                                                                    class="date">{{date('M d, Y', strtotime($c->create_date))}}</span>
                                                            </div>
                                                            <p class="text">
                                                                {{$c->content}}
                                                            </p>
                                                        </article>
                                                    @endforeach
                                                @else
                                                    Không có đánh giá nào cho sản phẩm này
                                                @endif
                                            </div>

                                            {{ $comments->links() }}
                                            <hr>
                                            @if(Auth::check())
                                                <div>
                                                    <label class="raty-label">
                                                        Bạn hãy cho đánh giá về sản phẩm
                                                    </label>
                                                    <div class="form-group">
                                                        <label for="review">Đánh giá của bạn <span class="text-danger"
                                                                                                   id="err"></span></label>
                                                        <textarea rows="6" name="review" id="review"
                                                                  class="form-control texComment"></textarea>
                                                    </div>
                                                    <button class="btn btn-primary submit" type="submit">Đánh giá
                                                    </button>
                                                </div>
                                            @endif
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
                        <li role="presentation"><a href="#related-products"
                                                   data-transition-type="backSlide" role="tab"
                                                   data-toggle="tab">Gợi ý cho bạn</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="related-products">
                        <div class="single-product-related-products wow fadeInUp">
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
                                                    <ins><span class="amount">VNĐ{{$value->promotion_price}}</span>
                                                    </ins>
                                                </div><!-- .product-price -->
                                                <div class="buttons-holder m-t-20">
                                                    <div class="add-cart-holder">
                                                        <a title="Add to cart"
                                                           href="{{route('detailProduct',$value->slug)}}"
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
    </div>
@stop
@section('script')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment-with-locales.min.js"
            integrity="sha256-4HOrwHz9ACPZBxAav7mYYlbeMiAL0h6+lZ36cLNpR+E=" crossorigin="anonymous"></script>

    <script>

        let comment = document.querySelector('.submit');
        comment.onclick = () => {
            let dateNow = Date.now();
            let formatted = moment(dateNow).format("MMM d, YYYY");

            let commentDiv = document.querySelector('#commentDiv');
            let err = document.querySelector('#err');
            let texComment = document.querySelector('.texComment');
            if (texComment.value < 6) {
                err.innerText = 'Đánh giá sản phẩm quá ngắn';
            } else {
                axios.post('{{route('save-comment')}}', { // <== use axios.post
                    idUser: '{{Auth::id()}}',
                    idProduct: '{{$pro->id}}',
                    content2: texComment.value
                })
                    .then(function (response) {
                        commentDiv.innerHTML += `
                        <article class="review">
                            <div class="header">
                                <h4 class="author">{{Auth::user()->full_name}}</h4>
                                <span class="date">${formatted}</span>
                            </div>
                            <p class="text">
                                ${texComment.value}
                            </p>
                        </article>
                    `;
                        err.innerText = '';
                        texComment.value = null;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            }


        }
    </script>
@stop
