@extends('backend.restaurant.master')

@section('title')
    edit- {{$menu->period}}
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit Menu Form</div>
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
                    <form class="form-horizontal" action="{{route('menu.update',$menu->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Period</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('period') is-invalid @enderror" name="period" type="text" placeholder="Title" value="{{$menu->period}}" >
                                @error('period')
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
                                    <option value="active" {{$menu->status== 'active' ? 'selected' : ''}}>active</option>
                                    <option value="inactive" {{$menu->status== 'inactive' ? 'selected' : ''}}>inactive</option>
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
                                <button class="btn btn-info " type="submit">Update menu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



