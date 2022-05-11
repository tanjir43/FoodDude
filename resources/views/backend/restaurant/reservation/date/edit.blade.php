@extends('backend.restaurant.master')

@section('title')
    edit- date
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit  date</div>
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
                    <form class="form-horizontal" action="{{route('date.update',$date->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Date</label>
                            <div class="col-sm-10">
                                <input name="date" type="date"  class="form-control @error('date') is-invalid @enderror" placeholder="Date" value="{{$date->date}}">
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
                                <select name="status" class="form-control  @error('status') is-invalid @enderror">
                                    <option value="active" {{$date->status== 'active' ? 'selected' : ''}}>active</option>
                                    <option value="inactive" {{$date->status== 'inactive' ? 'selected' : ''}}>inactive</option>
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
                                <button class="btn btn-info " type="submit">Update Date</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



