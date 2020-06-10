<header>
    <div class="navbar navbar-black">
        <div class="navbar-header">
            <div class="container">
                <!-- ============================================================= LOGO MOBILE ============================================================= -->

                <a class="navbar-brand" href="home.html"><img src="{{asset('client_/assets/images/logo2.png')}}" class="logo" alt=""></a>

                <!-- ============================================================= LOGO MOBILE : END ============================================================= -->

                <a class="btn responsive-menu pull-right" data-toggle="collapse" data-target=".navbar-collapse">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </a>
            </div><!-- /.container -->
        </div><!-- /.navbar-header -->

        <div class="yamm">
            <div class="navbar-collapse collapse animate-dropdown">
                <div class="container">
                    <a href="{{route('home')}}" class="navbar-brand"><img src="{{asset('client_/assets/images/logo2.png')}}" class="logo"
                                                          alt=""></a>
                    <ul class="nav navbar-nav">
                        <li class="yamm-fw">
                            <a href="{{url('/')}}" class="dropdown-toggle"
                               data-toggle="dropdown"><span>Trang Chủ</span></a>
                        </li>
                        @foreach($categories as $cate)
                            <li class="yamm-fw">
                                <a href="{{route('product_cate',$cate->slug)}}" class="dropdown-toggle">
                                    <span>{{$cate->name}}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown searchbox bewear-dropdown"><a href="#" data-hover="dropdown"
                                                                          class="no-drop-icon dropdown-toggle"
                                                                          data-toggle="dropdown"><i
                                    class="icon icon-search"></i></a>
                            <div class="dropdown-menu bewear-dropdown-menu">
                                <form id="search" class="navbar-form search" role="search">
                                    <input type="search" class="form-control" placeholder="Type to search">
                                    <button type="submit"
                                            class="btn btn-primary btn-submit icon icon-search"></button>
                                </form>
                            </div><!-- /.dropdown-menu -->
                        </li><!-- /.searchbox -->


                        @if(Auth::check())
                            <li>
                                <a title="" href="#"><i class="icon icon-user"></i></a>
                            </li>
                        @else
                            <li><a href=""><i class="icon icon-user"></i></a></li>
                        @endif

                        <li><a id="menu-toggle" class="navbar-toggle shopping-cart-toggle" data-toggle="offcanvas"
                               data-target="#shopping-cart-summary" href="#"><i class="icon icon-shopbag"></i><span
                                    class="item-count">5</span></a></li>
                    </ul>
                </div>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.yamm -->
    </div><!-- /.navbar -->
</header><!-- /header -->
