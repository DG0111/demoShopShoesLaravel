@extends('admin_.layouts.layout_master')
@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h3>Product</h3>
                </div>
                <div class="row">
                    <a class="btn btn-info" href="{{ url('export') }}">
                        Export File
                    </a>
                </div>
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Phone</th>
                            <th> Name</th>
                            <th> Address</th>
                            <th> Email</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="tbody">
                        @if(!empty($order) && $order->count())
                            @foreach($order as $value)
                                <tr>
                                    <td>0{{$value->number_phone}}</td>
                                    <td>{{$value->first_name . ' ' .  $value->last_name}}</td>
                                    <td>{{$value->address}}</td>
                                    <td>{{$value->email}}</td>
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
                                            <a style="font-size: 12px" href="{{route('detailProduct',1)}}"
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
                    {!! $order->appends(Request::all())->links() !!}
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
