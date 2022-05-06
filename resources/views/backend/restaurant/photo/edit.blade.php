@extends('backend.restaurant.master')

@section('title')
    edit photo
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit Photo Form</div>
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
                    <form class="form-horizontal" action="{{route('photo.update',$photo->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row" hidden>
                            <label class="col-sm-2 col-form-label">Restaurant name <span class=text-danger>*</span></label>
                            <div class="col-sm-10">
                                <input name="restaurant_id"   class="form-control @error('restaurant_id') is-invalid @enderror"  placeholder="Period" value="{{auth('restaurant')->user()->id}}"></input>
                                @error('restaurant_id')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Images</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                      </a>
                                    </span>
                                    <input id="thumbnail" class="form-control @error('images') is-invalid @enderror" type="text" name="images" accept="image/*" required>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"><img src="{{asset($photo->images)}}" height=100 alt=""> </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Condition<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="condition" class="form-control  @error('condition') is-invalid @enderror">
                                    <option value="interior" {{$photo->condition== 'interior' ? 'selected' : ''}}>Interior</option>
                                    <option value="exterior" {{$photo->condition== 'exterior' ? 'selected' : ''}}>Exterior</option>
                                </select>
                                @error('condition')
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
                                    <option value="active" {{$photo->status== 'active' ? 'selected' : ''}}>active</option>
                                    <option value="inactive" {{$photo->status== 'inactive' ? 'selected' : ''}}>inactive</option>
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
                                <button class="btn btn-info " type="submit">Update photo</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



