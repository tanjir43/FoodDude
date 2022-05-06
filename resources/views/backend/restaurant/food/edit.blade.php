@extends('backend.restaurant.master')

@section('title')
    edit- {{$food ->name}}
@endsection

@section('body')
    <div class="row">
        <div class="col-md-12">
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Edit Food Form</div>
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
                    <form class="form-horizontal" action="{{route('food.update',$food->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"> Period name <span class=text-danger>*</span></label>
                            <div class="col-sm-10">
                                <select name="menu_id" class="form-control @error('menu_id') is-invalid @enderror">
                                    @foreach($menus as $menu)
                                        <option  value="{{$menu->id}}" {{$menu->id == $food->menu_id ? 'selected' :'' }} >{{$menu->period}}</option>
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
                            <label class="col-sm-2 col-form-label"> Verity name <span class=text-danger>*</span></label>
                            <div class="col-sm-10">
                                <select name="verity_id" class="form-control @error('verity_id') is-invalid @enderror">
                                    @foreach($verities as $verity)
                                        <option  value="{{$verity->id}}" {{$verity->id == $food->verity_id ? 'selected' :'' }} >{{$verity->verity}}</option>
                                    @endforeach
                                </select>
                                @error('verity_id')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Food name <small>(ex:burger)</small></label>
                            <div class="col-sm-10">
                                <input name="name"  type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Food name" value="{{$food->name}}">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input name="price" type="number" step="any"  class="form-control @error('price') is-invalid @enderror" placeholder="Price" value="{{$food->price}}">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea name="description"  id="summernote" class="form-control @error('description') is-invalid @enderror" > {!! $food->description !!} </textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nutrition</label>
                            <div class="col-sm-10">
                                <input name="nutrition"  type="number" step="any" class="form-control @error('nutrition') is-invalid @enderror" value="{{$food->nutrition}}" >
                                @error('nutrition')
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
                                    <input id="thumbnail" class="form-control @error('image') is-invalid @enderror" type="text" name="image" accept="image/*" required>

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div id="holder" style="margin-top:15px;max-height:100px;"><img src="{{asset($food->image)}}" height=100 alt=""> </div>
                            </div>
                        </div>


                        {{--                <div class="form-group row">--}}
                        {{--                    <label class="col-sm-2 col-form-label">Sub-Images</label>--}}
                        {{--                    <div class="col-sm-10">--}}
                        {{--                        <div class="input-group">--}}
                        {{--                                    <span class="input-group-btn">--}}
                        {{--                                      <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">--}}
                        {{--                                        <i class="fa fa-picture-o"></i> Choose--}}
                        {{--                                      </a>--}}
                        {{--                                    </span>--}}
                        {{--                            <input id="thumbnail1" class="form-control @error('sub_image') is-invalid @enderror" type="text" name="sub_image[]" accept="image/*" >--}}

                        {{--                            @error('image')--}}
                        {{--                            <span class="invalid-feedback" role="alert">--}}
                        {{--                            <strong>{{ $message }}</strong>--}}
                        {{--                            </span>--}}
                        {{--                            @enderror--}}
                        {{--                        </div>--}}
                        {{--                        <div id="holder1" style="margin-top:15px;max-height:100px;"> </div>--}}
                        {{--                    </div>--}}
                        {{--                </div>--}}


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Status <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control  @error('status') is-invalid @enderror">
                                    <option value="active" {{$food->status== 'active' ? 'selected' : ''}}>active</option>
                                    <option value="inactive" {{$food->status== 'inactive' ? 'selected' : ''}}>inactive</option>
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
                                <button class="btn btn-info " type="submit">Update Food</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection



