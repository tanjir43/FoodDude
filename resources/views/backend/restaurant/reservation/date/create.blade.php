@extends('backend.restaurant.master')

@section('title')
    - create date
@endsection

@section('body')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title mx-auto text-black-50">Create date</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>

        <div class="ibox-body">
            @include('alert.notification')

            <form class="form-horizontal" action="{{route('date.store')}}" method="POST" enctype="multipart/form-data">
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


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Date</label>
                    <div class="col-sm-10">
                        <input name="date" type="date"  class="form-control @error('date') is-invalid @enderror" placeholder="Date" value="{{old('date')}}">
                        @error('date')
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
                        <button class="btn btn-info " type="submit">Create new Date</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
