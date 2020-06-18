@extends('admin_.layouts.layout_master')
@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Product</h3>
                </div>
                <div class="row">
                    <input id="key" name="key" placeholder="Tìm kiếm ..." type="text">
                    <button id="btnSearch">Search</button>
                </div>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Name</th>
                            <th> Price</th>
                            <th> Quantity</th>
                            <th> Category</th>
                            <th> Images</th>
                            <th> Create at</th>
                            <th> Size</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        @if(!empty($pro) && $pro->count())
                            @foreach($pro as $value)
                                <tr>
                                    <td title="{{$value->name}}" style="font-size: 12px">
                                        {{substr($value->name, 0, 20)}}
                                    </td>
                                    <td style="font-size: 12px"> VNĐ {{number_format($value->price, 0, '', ',')}} </td>
                                    <td style="font-size: 12px"> {{$value->quantity}} </td>
                                    <td style="font-size: 12px"> {{$value->categories->name}} </td>
                                    {{--                        Định nghĩa relationships--}}
                                    <td><img style="width: 100px;height: 100px;border-radius: 0;"
                                             src="{{asset('files/'.$value->image->url)}}"></td>
                                    {{--                                    quan hệ 1 nhiều :(--}}
                                    {{--                        Định nghĩa relationships--}}
                                    <td style="font-size: 12px"> {{$value->created_at}} </td>
                                    <td>
                                        <select>
                                            @foreach($value->sizes as $size)
                                                <option value="">{{$size->size}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="font-size: 12px">
                                        @if(number_format($value->quantity) <= 0)
                                            <label class="badge badge-danger">Hết Hàng</label>
                                        @else
                                            <label class="badge badge-success">Còn Hàng</label>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="row mt-1">
                                            <a style="font-size: 12px"
                                               href="{{url('admin/product/'.$value->id.'/edit')}}"
                                               class="btn btn-warning">Edit</a>
                                        </div>
                                        <div class="row mt-1">
                                            <form class="delete" action="{{ url('admin/product/'.$value->id) }}"
                                                  method="post">
                                                <input
                                                    style="font-size: 12px"
                                                    id="delete"
                                                    class="btn btn-default btn-danger"
                                                    type="submit"
                                                    onclick="deleteProduct()"
                                                    value="Delete"/>
                                                @method('delete')
                                                @csrf
                                            </form>
                                        </div>
                                        <div class="row mt-1">
                                            <a style="font-size: 12px" href="{{route('detailProduct',$value->slug)}}"
                                               class="btn btn-facebook">View</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10">KHÔNG CÓ SẢN PHẨM NÀO</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>

                <div id="paginate" class="row mt-5">
                    {!! $pro->appends(Request::all())->links() !!}
                </div>
            </div>
        </div>

    </div>
@stop

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>

        @if (Session::get('data'))
        Swal.fire('{{Session::get('data')}}');
            @endif

        let btn = document.querySelector('#btnSearch');
        let key = document.querySelector('#key');
        let paginate = document.querySelector('#paginate');
        let tbody = document.querySelector('#tbody');

        btn.onclick = () => {
            paginate.style.display = "none";
            let keyValue = key.value;
            axios.post('{{route('search-product')}}', { // <== use axios.post
                _method: 'patch',
                key: keyValue
            })
                .then(function (response) {
                    let data = response.data;
                    console.log(data);
                    tbody.innerHTML = '';
                    data.forEach(key => {

                        if (key.quantity <= 0) {
                            key.quantity = 'Hết Hàng';
                        } else {
                            key.quantity = 'Còn Hàng';
                        }

                        let sizes = key.sizes;
                        let htmlSizes = '';
                        sizes.forEach(value => {
                            htmlSizes +=
                                `
                                    <option value="">${value.size}</option>
`;
                        })

                        tbody.innerHTML +=
                            `
                            <tr>
                                <td style="font-size: 12px">
                                            ${key.name}
                            </td>
                            <td style="font-size: 12px"> VNĐ ${key.price} </td>
                            <td style="font-size: 12px"> ${key.quantity} </td>
                            <td style="font-size: 12px"> ${key.categories.name} </td>
                            <td>
                                <img style="width: 100px;height: 100px;border-radius: 0;"
                                    src="../files/${key.image.url}">
                             </td>
{{--                                    quan hệ 1 nhiều :(--}}
                            {{--                        Định nghĩa relationships--}}
                            <td style="font-size: 12px">
                                ${key.created_at}
                            </td>
                            <td>
                                <select>
                                    ${htmlSizes}
                                 </select>
                            </td>
                            <td style="font-size: 12px">
                                ${key.quantity}
                            </td>
                            <td>
                                <div class="row mt-1">
                                    <a style="font-size: 12px" href="/admin/product/${key.id}/edit"
                            class="btn btn-warning">Edit</a>
                     </div>
                     <div class="row mt-1">
                         <form class="delete" action="/admin/product/${key.id}"
                            method="post">
                          <input
                              style="font-size: 12px"
                              id="delete"
                              class="btn btn-default btn-danger"
                              type="submit"
                              onclick="deleteProduct()"
                              value="Delete"/>
                            @method('delete')
                            @csrf
                            </form>
                        </div>
                        <div class="row mt-1">
                            <a style="font-size: 12px" href="{{route('detailProduct',$value->slug)}}"
                                               class="btn btn-facebook">View</a>
                                        </div>
                                    </td>
                                </tr>
                        `
                    })
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

        function deleteProduct() {
            event.preventDefault();
            var form = event.target.form;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                closeOnConfirm: false
            }).then((result) => {
                if (result.value) {
                    form.submit();
                }
            })
        }
    </script>
@stop
