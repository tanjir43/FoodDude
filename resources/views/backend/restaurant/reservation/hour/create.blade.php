@extends('backend.restaurant.master')

@section('title')
    - create hour
@endsection

@section('body')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title mx-auto text-black-50">Create hour</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>

        <div class="ibox-body">
            @include('alert.notification')

            <form class="form-horizontal" action="{{route('hour.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row" hidden>
                    <label class="col-sm-2 col-form-label">Restaurant name <span class=text-danger>*</span></label>
                    <div class="col-sm-10">
                        <input name="restaurant_id"   class="form-control @error('restaurant_id') is-invalid @enderror"  placeholder="Period" value="{{auth('restaurant')->user()->id}}">
                        @error('restaurant_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

{{--                <div class="form-group row">--}}
{{--                    <label class="col-sm-2 col-form-label"> Name <small>(ex:A1)</small></label>--}}
{{--                    <div class="col-sm-10">--}}
{{--                        <input name="name" type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{old('name')}}">--}}
{{--                        @error('name')--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong>{{ $message }}</strong>--}}
{{--                        </span>--}}
{{--                        @enderror--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Hour</label>
                    <div class="col-sm-10">
                        <input name="hour" type="time"  class="form-control @error('hour') is-invalid @enderror" placeholder="Hour" value="{{old('hour')}}">
                        @error('hour')
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
                        <button class="btn btn-info " type="submit">Create new Hour</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
