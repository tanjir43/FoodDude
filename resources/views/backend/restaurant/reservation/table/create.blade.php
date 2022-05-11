@extends('backend.restaurant.master')

@section('title')
    - create table
@endsection

@section('body')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title mx-auto text-black-50">Create Table</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>

        <div class="ibox-body">
            @include('alert.notification')

            <form class="form-horizontal" action="{{route('table.store')}}" method="POST" enctype="multipart/form-data">
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
                        <select name="date_id" class="form-control @error('date_id') is-invalid @enderror" >
                            @foreach($dates as $date)
                                <option value="{{$date->id}}">{{$date->date}}</option>
                            @endforeach
                        </select>
                        @error('date_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Hour</label>
                    <div class="col-sm-10">
                        <select name="hour_id" class="form-control @error('hour_id') is-invalid @enderror" >
                            @foreach($hours as $hour)
                                <option value="{{$hour->id}}">{{$hour->hour}}</option>
                            @endforeach
                        </select>
                        @error('hour_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Name <small>(ex:A1)</small></label>
                    <div class="col-sm-10">
                        <input name="name" type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{old('name')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"> Priority <small>(ex:1)</small></label>
                    <div class="col-sm-10">
                        <input name="priority" type="text"  class="form-control @error('priority') is-invalid @enderror" placeholder="Priority" value="{{old('priority')}}">
                        @error('priority')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                            <input id="thumbnail" class="form-control @error('image') is-invalid @enderror" type="text" name="image"  >

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
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
                        <button class="btn btn-info " type="submit">Create new Table</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
