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
                <form id="example-vertical-wizard" class="formAddProduct" enctype="multipart/form-data"
                      action="{{url('admin/product')}}" method="POST">
                    @csrf
                    <div role="application" class="wizard clearfix vertical" id="steps-uid-1">
                        <div class="content clearfix p-3">
                            <h6>Product</h6>
                            <div class="form-group">
                                <label for="category">Category *
                                    <span class="text-danger">{{$errors->first('category_id')}}
                                    </span>
                                </label>
                                <select value="{{ old('category_id') }}" name="category_id" class="form-control">
                                    @foreach($cate as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="productName">Product name *
                                    <span class="text-danger">
                                        {{$errors->first('name')}}
                                    </span>
                                </label>
                                <input
                                    value="{{ old('name') }}"
                                    name="name"
                                    type="text"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="description">Description *
                                    <span class="text-danger">{{$errors->first('description')}}
                                    </span>
                                </label>
                                <textarea class="form-control" name="description">
                                    {{ old('description') }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label>File upload *
                                    <span class="text-danger">
                                        {{$errors->first('image_id.*')}}
                                    </span>
                                </label>
                                <input
                                    required
                                    name="image_id[]"
                                    id="inputFile" type="file"
                                    multiple="multiple"
                                    class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" id="inputImageText" class="form-control file-upload-info"
                                           disabled=""
                                           placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-info" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="price">Price *
                                    <span class="text-danger">{{$errors->first('price')}}
                                    </span>
                                </label>
                                <input
                                    value="{{ old('price') }}"
                                    id="valuePrice"
                                    name="price"
                                    type="number"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="promotionPrice">Promotion Price *
                                    <span class="text-danger">{{$errors->first('promotion_price')}}
                                    </span>
                                </label>
                                <input
                                    value="{{ old('promotion_price') }}"
                                    name="promotion_price"
                                    id="promotion_price"
                                    type="number"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity *
                                    <span class="text-danger">{{$errors->first('quantity')}}
                                    </span>
                                </label>
                                <input
                                    value="{{ old('quantity') }}"
                                    name="quantity"
                                    type="number"
                                    class="form-control">
                            </div>
                            <span class="text-danger">{{$errors->first('size')}}
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Size Việt Nam</th>
                                    <th>Size US</th>
                                    <th>
                                        <input type="checkbox" onClick="toggle(this)">
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>35</td>
                                    <td>4.5</td>
                                    <td>
                                        <input type="checkbox" name="size[]"
                                               @if(is_array(old('size')) && in_array(35, old('size'))) checked
                                               @endif value="35">
                                    </td>
                                </tr>
                                <tr>
                                    <td>36</td>
                                    <td>5.5</td>
                                    <td>
                                        <input type="checkbox" name="size[]"
                                               @if(is_array(old('size')) && in_array(36, old('size'))) checked
                                               @endif value="36">
                                    </td>
                                </tr>
                                <tr>
                                    <td>37</td>
                                    <td>6.5</td>
                                    <td>
                                        <input type="checkbox" name="size[]"
                                               @if(is_array(old('size')) && in_array(37, old('size'))) checked
                                               @endif value="37">
                                    </td>
                                </tr>
                                <tr>
                                    <td>38</td>
                                    <td>7.5</td>
                                    <td>
                                        <input type="checkbox" name="size[]"
                                               @if(is_array(old('size')) && in_array(38, old('size'))) checked
                                               @endif value="38">
                                    </td>
                                </tr>
                                <tr>
                                    <td>39</td>
                                    <td>8.5</td>
                                    <td>
                                        <input type="checkbox" name="size[]"
                                               @if(is_array(old('size')) && in_array(39, old('size'))) checked
                                               @endif value="39">
                                    </td>
                                </tr>
                                <tr>
                                    <td>40</td>
                                    <td>9.5</td>
                                    <td>
                                        <input type="checkbox" name="size[]"
                                               @if(is_array(old('size')) && in_array(40, old('size'))) checked
                                               @endif value="40">
                                    </td>
                                </tr>
                                <tr>
                                    <td>41</td>
                                    <td>10.5</td>
                                    <td>
                                        <input type="checkbox" name="size[]"
                                               @if(is_array(old('size')) && in_array(41, old('size'))) checked
                                               @endif value="41">
                                    </td>
                                </tr>
                                <tr>
                                    <td>42</td>
                                    <td>11.5</td>
                                    <td>
                                        <input type="checkbox" name="size[]"
                                               @if(is_array(old('size')) && in_array(42, old('size'))) checked
                                               @endif value="42">
                                    </td>
                                </tr>
                                <tr>
                                    <td>43</td>
                                    <td>12</td>
                                    <td>
                                        <input type="checkbox" name="size[]"
                                               @if(is_array(old('size')) && in_array(43, old('size'))) checked
                                               @endif value="43">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="steps clearfix">
                            <ul role="tablist">
                                <li role="tab" class="first current" aria-disabled="false" aria-selected="true">
                                    <div class="">
                                        <h3>Preview Image</h3>
                                        <div class="" id="showImage">
                                        </div>
                                    </div>
                                </li>
                            </ul>
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


        function toggle(source) {
            let checkboxes = document.getElementsByName('size[]');
            for (let k = 0, n = checkboxes.length; k < n; k++) {
                checkboxes[k].checked = source.checked;
            }
        }


        $(document).ready(() => {
            $.validator.addMethod('lessThan', function(value, element, param) {
                var i = parseInt(value);
                var j = parseInt($(param).val());
                return i <= j;
            }, "Giá khuyến mãi phải nhỏ hơn giá sản phẩm");

            $(".formAddProduct").validate({
                debug: false,
                errorClass: "authError",
                errorElement: "span",
                rules: {
                    name: {
                        required: true,
                        minlength: 6,
                        maxlength: 50
                    },
                    description: {
                        required: true,
                        minlength: 6,
                    },
                    price: {
                        required: true,
                        min: 0,
                        number: true
                    },
                    promotion_price: {
                        min: 0,
                        number: true,
                        lessThan: "#valuePrice",
                    },
                    quantity: {
                        required: true,
                        min: 0,
                        number: true
                    }
                },
                messages: {
                    name: {
                        required: 'Sản phẩm phải có tên nhé !',
                        minlength: 'Quá ÍT kí tự !',
                        maxlength: 'Quá NHIỀU kí tự !',
                    },
                    description: {
                        required: 'Sản phẩm phải có mô tả nhé !',
                        minlength: 'Mỏ tả quá ÍT kí tự !',
                    },
                    price: {
                        required: 'Sản phẩm phải có giá nhé !',
                        min: 'Gía âm rồi kia ! Thích gửi giầy còn gửi thêm cho người ta tiền à ?',
                        number: 'Chữ số nhé !'
                    },
                    promotion_price: {
                        min: 'Giảm thì cũng đừng có cho tiền người ta chứ',
                        number: 'Chữ số nhé !',
                    },
                    quantity: {
                        required: 'Số lượng sản phẩm là bao nhiểu ?',
                        min: 'Số lượng âm thì chịu rồi',
                        number: 'Chữ số nhé !'
                    }
                }
            });
        })


        let inputFile = document.querySelector('#inputFile');
        let showImage = document.querySelector('#showImage');
        inputFile.onchange = () => {
            let file = document.querySelector('#inputFile')['files'];

            let inputImageText = document.querySelector('#inputImageText');
            if (file.length > 7) {
                Swal.fire('Bạn chỉ được phép chọn 7 ảnh sản phẩm !!!');
                document.querySelector('#inputFile').value = "";
                showImage.innerHTML = '';
            } else {
                showImage.innerHTML = '';
                var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

                for (var j = 0; j < file.length; j++) {
                    if (!allowedExtensions.exec(file[j].name)) {
                        Swal.fire('Bạn chọn sai tệp (jpg/jpeg/png) !!!');
                        document.querySelector('#inputFile').value = "";
                        showImage.innerHTML = '';
                    }
                }
                ;

                for (var i = 0; i < file.length; i++) {
                    let reader = new FileReader();
                    let baseString;
                    reader.onloadend = function () {
                        baseString = reader.result;
                        showImage.innerHTML += `
                        <img class="m-1" width="100px" src="${baseString}" alt="">
                `;
                    };
                    reader.readAsDataURL(file[i]);
                }
            }
        }

    </script>
@stop

