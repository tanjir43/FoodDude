@extends('backend.restaurant.master')

@section('title')
    edit- table
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit Table Form</div>
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
                    <form class="form-horizontal" action="{{route('table.update',$table->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Name <small>(ex:A1)</small></label>
                            <div class="col-sm-10">
                                <input name="name" type="text"  class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{$table->name}}">
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
                                <input name="priority" type="text"  class="form-control @error('priority') is-invalid @enderror" placeholder="Priority" value="{{$table->priority}}">
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
                                <div id="holder" style="margin-top:15px;max-height:100px;"><img src="{{asset($table->image)}}" width="100" alt=""> </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Hour</label>
                            <div class="col-sm-10">
                                <input name="hour" type="time"  class="form-control @error('hour') is-invalid @enderror" placeholder="Hour" value="{{$table->hour}}">
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
                                    <option value="active" {{$table->status== 'active' ? 'selected' : ''}}>active</option>
                                    <option value="inactive" {{$table->status== 'inactive' ? 'selected' : ''}}>inactive</option>
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



