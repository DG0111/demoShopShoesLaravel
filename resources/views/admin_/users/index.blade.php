@extends('admin_.layouts.layout_master')
@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div>
                        <h3>User</h3>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Full name</th>
                            <th> Address</th>
                            <th> State</th>
                            <th> Email</th>
                            <th> Create at</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($user) && $user->count())
                            @foreach($user as $value)
                                <tr>
                                    <td style="font-size: 12px"> {{$value->full_name}} </td>
                                    <td style="font-size: 12px"> {{$value->address}} </td>
                                    <td style="font-size: 12px"> {{$value->state}} </td>
                                    <td style="font-size: 12px"> {{$value->email}} </td>
                                    <td style="font-size: 12px"> {{$value->create_at}} </td>
                                    <td style="font-size: 12px"> {{$value->created_at}} </td>
                                    <td>
                                        {{--                                        <div class="row mt-1">--}}
                                        {{--                                            <a style="font-size: 12px"--}}
                                        {{--                                               href="{{url('admin/user/'.$value->id.'/edit')}}"--}}
                                        {{--                                               class="btn btn-warning">Edit</a>--}}
                                        {{--                                        </div>--}}
                                        <div class="row mt-1">
                                            <form class="delete" action="{{ url('admin/user/'.$value->id) }}"
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

                <div class="row mt-5">
                    {!! $user->appends(Request::all())->links() !!}
                </div>
            </div>
        </div>

    </div>
@stop

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>

        @if (Session::get('data'))
        Swal.fire('{{Session::get('data')}}');

        @endif


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
