@extends('admin_.layouts.layout_master')
@section('link')
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <style>
        .authError {
            color: red;
        }
    </style>
@stop
@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <form id="example-vertical-wizard" class="formAddProduct"
                      action="{{url('admin/admin/'.$admin->id)}}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div role="application" class="wizard clearfix vertical" id="steps-uid-1">
                        <div class="content clearfix p-3">
                            <h6>Admin</h6>
                            <input type="password" name="id" hidden value="{{$admin->id}}" id="">
                            <div class="form-group">
                                <label for="productName">Full name *
                                    <span class="text-danger">
                                        {{$errors->first('full_name')}}
                                    </span>
                                </label>
                                <input
                                    value="@if(!old('full_name')){{$admin->full_name}}@else{{old('full_name')}}@endif"
                                    name="full_name"
                                    type="text"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="productName">Address *
                                    <span class="text-danger">
                                        {{$errors->first('address')}}
                                    </span>
                                </label>
                                <input
                                    value="@if(!old('address')){{$admin->address}}@else{{old('address')}}@endif"
                                    name="address"
                                    type="text"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="productName">Email *
                                    <span class="text-danger">
                                        {{$errors->first('email')}}
                                    </span>
                                </label>
                                <input
                                    value="@if(!old('email')){{$admin->email}}@else{{old('email')}}@endif"
                                    name="email"
                                    type="text"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="productName">Password *
                                    <span class="text-danger">
                                        {{$errors->first('password')}}
                                    </span>
                                </label>
                                <input
                                    name="password"
                                    type="password"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>

                            <div class="form-group">
                                <label for="productName">Role *
                                </label>
                                <select class="form-control" value="{{$idRole->id}}" name="role">
                                    @foreach($role as $value)
                                        <option @if($value->id == $idRole->id) selected @endif value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                        <div class="actions clearfix">
                            <ul role="menu" aria-label="Pagination">
                                <li class="disabled" aria-disabled="true">
                                    <a href="{{url()->previous()}}" role="menuitem">Back</a>
                                </li>
                                <li aria-hidden="false" aria-disabled="false">
                                    <button type="submit" class="btn btn-facebook" role="menuitem">Save</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@stop
@section('script')
    <!-- End custom js for this page-->
    <script src="{{asset('admin_/assets/js/shared/dropify.js')}}"></script>
    <script src="{{asset('admin_/assets/js/shared/file-upload.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        $(".formAddProduct").validate({
            debug: false,
            errorClass: "authError",
            errorElement: "span",
            rules: {
                name: {
                    required: true,
                    minlength: 6,
                    maxlength: 50
                }
            },
            messages: {
                name: {
                    required: 'Danh mục phải có tên nhé !',
                    minlength: 'Quá ÍT kí tự !',
                    maxlength: 'Quá NHIỀU kí tự !',
                }
            }
        });


    </script>
@stop

