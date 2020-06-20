<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin_/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="admin_/assets/vendors/iconfonts/puse-icons-feather/feather.css">
    <link rel="stylesheet" href="admin_/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="admin_/assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="admin_/assets/css/shared/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="admin_/assets/images/favicon.png"/>
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tạo tài khoản mới</h4>
                            <form class="cmxform" id="signupForm" method="POST" action="{{ route('register') }}"
                                  novalidate="novalidate">
                                @csrf
                                <fieldset>
                                    <div class="form-group">
                                        <label for="firstname">Full name</label>
                                        <input id="full_name" value="{{ old('full_name') }}" class="form-control"
                                               name="full_name" type="text">
                                        @error('full_name')
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" value="{{ old('email') }}" class="form-control" name="email"
                                               type="email">
                                        @error('email')
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" value="{{ old('password') }}" class="form-control"
                                               name="password" type="password">
                                        @error('password')
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_password">Confirm password</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" autocomplete="new-password">
                                        @error('password_confirmation')
                                        <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <input class="btn btn-primary" type="submit" value="Submit"></fieldset>
                            </form>
                        </div>
                    </div>

                    <ul class="auth-footer">
                        <li>
                            <a href="#">Conditions</a>
                        </li>
                        <li>
                            <a href="#">Help</a>
                        </li>
                        <li>
                            <a href="#">Terms</a>
                        </li>
                    </ul>
                    <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="admin_/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="admin_/assets/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- inject:js -->
<script src="admin_/assets/js/shared/off-canvas.js"></script>
<script src="admin_/assets/js/shared/hoverable-collapse.js"></script>
<script src="admin_/assets/js/shared/misc.js"></script>
<script src="admin_/assets/js/shared/settings.js"></script>
<script src="admin_/assets/js/shared/todolist.js"></script>
<!-- endinject -->

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

<script>

    $(".cmxform").validate({
        debug: false,
        errorClass: "authError",
        errorElement: "span",
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                min: 6
            },
            full_name: {
                required: true,
                min: 6
            },
            password_confirmation: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            }
        },
        messages: {
            email: {
                required: 'Mời bạn điền thông tin email',
                email: 'Sai định dạng email'
            },
            password: {
                required: 'Mời bạn điền thông tin mật khẩu',
                min: 'mật khẩu quá ngắn'
            },
            full_name: {
                required: 'Mời bạn điền thông tin Tên',
                min: 'Mời bạn điền thông tin Tên',
            },
            password_confirmation: {
                required: 'Mời bạn nhập lại mật khẩu',
                equalTo: 'Mật khẩu không khớp',
                minlength: 'Mật khẩu không khớp'
            }
        }
    });
</script>
</body>
</html>


