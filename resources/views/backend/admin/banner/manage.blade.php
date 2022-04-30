@extends('backend.admin.master')

@section('title')

    - manage
@endsection

@section('body')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title "><a href="{{route('banner.create')}}" class="text-success"><i class="fa fa-plus-circle"></i> Add new banners</a></div>
            <div class="ibox-title mx-auto text-black-50">Manage Banners & Promos</div>
            <div class="ibox-title mx-right text-primary ">Total Banners :  </div>
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
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Condition</th>
                    <th>Status </th>
                    <th>Action </th>
                </tr>
                </tr>
                </thead>
                @forelse($banners as $banner)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$banner->title}}</td>
                        <td>{!! $banner->description !!}</td>
                        <td>
                            <img src="{{asset($banner->image)}}" width="100px" alt="">
                        </td>
                        <td> @if($banner->condition == 'banner')
                                <h5 class="badge badge-success ml-4">Banner</h5>
                            @else
                                 <h5 class="badge badge-primary ml-5">Promo</h5>
                            @endif
                        </td>
                        <td class="pl-5" >
                            <input type="checkbox" name="toggle" value="{{$banner->id}}" {{$banner->status == 'active' ? 'checked' : ''}} data-toggle="toggle" data-on="active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-size="sm">
                        </td>
                        <td></td>
                        <td>

                            <a href="{{route('banner.edit',$banner->id)}}" class="float-left ml-2 btn btn-outline-info btn-sm"><i class="fa fa-edit"></i></a>

                            <form class="float-left ml-1" action="{{route('banner.destroy',$banner->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="" class="btn btn-outline-danger btn-sm"><i class=" dltBtn fa fa-trash" data-id="{{$banner->id}}"></i></a>
                            </form>
                        </td>
                    </tr>
                @empty
                    <td class="text-center text-danger">No Banner or promos created yet...</td>
                @endforelse
            </table>

        </div>





@endsection
