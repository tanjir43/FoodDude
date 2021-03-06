@extends('backend.restaurant.master')

@section('title')

    - manage verities
@endsection

@section('body')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title "><a href="{{route('verity.create')}}" class="text-success"><i class="fa fa-plus-circle"></i> Add new menu</a></div>
            <div class="ibox-title mx-auto text-black-50">Manage Verity</div>
            <div class="ibox-title mx-right text-primary ">Total verities :  </div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
            @include('alert.notification')
        </div>

        <div class="ibox-body">
            <table class="table table-striped table-bordered table-hover " cellspacing="0" width="100%">
                <thead>
                <tr>
                <tr>
                    <th>S.N</th>
                    <th>Period name</th>
                    <th>Verity name</th>
                    <th>Status</th>
                    <th>Action </th>
                </tr>
                </tr>
                </thead>
                @forelse($verities as $verity)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$verity->menu->period}}</td>
                        <td>{{$verity->verity}}</td>
                        <td class="pl-5" >
                            <input type="checkbox" name="toggle" value="{{$verity->id}}" {{$verity->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                        </td>
                        <td >

                            <a href="{{route('verity.edit',$verity->id)}}" class="float-left ml-2 btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>

                            <form class="float-left ml-1" action="{{route('verity.destroy',$verity->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$verity->id}}"></i></a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td class="text-center text-danger">No  Menu has been created yet...</td>
                @endforelse
            </table>
        </div>
        @endsection

        @section('script')
            <!-- change status -->
            <script>
                $('input[name=toggle]').change(function () {
                    var mode = $(this).prop('checked');
                    var id   = $(this).val();
                    $.ajax({
                        url  : "{{route('verity.status')}}",
                        type : "POST",
                        data :{
                            _token : '{{csrf_token()}}',
                            mode : mode,
                            id   : id,
                        },
                        success: function (response) {
                            if(response.status){
                                alert(response.msg)
                            }else{
                                alert('Please try again');
                            }
                        }
                    });
                });
            </script>

            <!-- Delete banner -->
            <script>
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('.dltBtn').click(function (e) {
                    var form   = $(this).closest('form');
                    var dataID = $(this).data('id');
                    e.preventDefault();
                    swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this imaginary file!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                form.submit();
                                swal("Poof! Your imaginary file has been deleted!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Your imaginary file is safe!");
                            }
                        });
                });
            </script>
@endsection
