@extends('backend.restaurant.master')

@section('title')
    - create verity
@endsection

@section('body')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title mx-auto text-black-50">Create Verity</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>

        <div class="ibox-body">
            @include('alert.notification')

            <form class="form-horizontal" action="{{route('verity.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Period name <span class=text-danger>*</span></label>
                    <div class="col-sm-10">
                        <select name="menu_id" class="form-control @error('menu_id') is-invalid @enderror">
                            @foreach($menus as $menu)
                            <option  value="{{$menu->id}}" >{{$menu->period}}</option>
                            @endforeach
                        </select>
                        @error('menu_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Verity name <small>(ex:burger)</small></label>
                    <div class="col-sm-10">
                        <input name="verity"   class="form-control @error('verity') is-invalid @enderror" placeholder="Verity food name" value="{{old('verity')}}"></input>
                        @error('verity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option  value="active" {{old('status'== 'active' ? 'selected' : '')}}>active</option>
                            <option value="inactive" {{old('status'== 'inactive' ? 'selected' : '')}}>inactive</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-10 ml-sm-auto">
                        <button class="btn btn-info " type="submit">Create new Verity</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
