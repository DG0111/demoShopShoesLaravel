@extends('admin_.layouts.layout_master')
@section('content')
    <div class="col-lg-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div>
                        <h3>Categories</h3>
                    </div>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th> Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($cate) && $cate->count())
                            @foreach($cate as $value)
                                <tr>
                                    <td style="font-size: 12px"> {{$value->name}} </td>
                                    <td>
                                        <div class="row mt-1">
                                            <a style="font-size: 12px"
                                               href="{{url('admin/category/'.$value->id.'/edit')}}"
                                               class="btn btn-warning">Edit</a>
                                        </div>
                                        <div class="row mt-1">
                                            <form class="delete" action="{{ url('admin/category/'.$value->id) }}"
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
                                <td colspan="10">KHÔNG CÓ DANH MỤC NÀO</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>

                <div class="row mt-5">
                    {!! $cate->appends(Request::all())->links() !!}
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
