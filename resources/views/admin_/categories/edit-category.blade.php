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
                      action="{{url('admin/category/'.$cate->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div role="application" class="wizard clearfix vertical" id="steps-uid-1">
                        <div class="content clearfix p-3">
                            <h6>Edit Category</h6>
                            <div class="form-group">
                                <label for="productName">Category name *
                                    <span class="text-danger">
                                        {{$errors->first('name')}}
                                    </span>
                                </label>
                                <input
                                    value="@if(!old('name')){{$cate->name}}@else{{old('name')}}@endif"
                                    name="name"
                                    type="text"
                                    class="form-control">
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

