<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="{{asset('admin_/assets/images/faces/face8.jpg')}}" alt="profile image"></div>
                    <div class="text-wrapper">
                        <p class="profile-name">NGO VAN LONG</p>
                        <div>
                            <small class="designation text-muted">Admin</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
                {{--                <button class="btn btn-success btn-block">New Project--}}
                {{--                    <i class="mdi mdi-plus"></i>--}}
                {{--                </button>--}}
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{url('admin')}}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#page-layouts" aria-expanded="false"
               aria-controls="page-layouts">
                <i class="menu-icon mdi mdi-notification-clear-all"></i>
                <span class="menu-title">Products</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="page-layouts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/product/create')}}">Add product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/product')}}">Show product</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#apps-dropdown" aria-expanded="false"
               aria-controls="apps-dropdown">
                <i class="menu-icon mdi mdi-dna"></i>
                <span class="menu-title">Categories</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="apps-dropdown">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/category')}}">Show category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('admin/category/create')}}">Add category</a>
                    </li>
                </ul>
            </div>
        </li>
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{url('admin/comment')}}">--}}
{{--                <i class="menu-icon mdi mdi-trackpad"></i>--}}
{{--                <span class="menu-title">Comment</span>--}}
{{--            </a>--}}
{{--        </li>--}}
    </ul>
</nav>
