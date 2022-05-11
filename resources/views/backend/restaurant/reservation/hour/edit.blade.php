@extends('backend.restaurant.master')

@section('title')
    edit- hour
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit Hour Form</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" action="{{route('hour.update',$hour->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Date</label>
                            <div class="col-sm-10">
                                <select name="date_id" class="form-control @error('date_id') is-invalid @enderror" >
                                    @foreach($dates as $date)
                                        <option value="{{$date->id}}" {{$date->id == $hour->date_id ? 'selected' : ''}}>{{$date->date}}</option>
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
                                <input name="hour" type="time"  class="form-control @error('hour') is-invalid @enderror" placeholder="Hour" value="{{$hour->hour}}">
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
                                <select name="status" class="form-control  @error('status') is-invalid @enderror">
                                    <option value="active" {{$hour->status== 'active' ? 'selected' : ''}}>active</option>
                                    <option value="inactive" {{$hour->status== 'inactive' ? 'selected' : ''}}>inactive</option>
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
                                <button class="btn btn-info " type="submit">Update hour</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



