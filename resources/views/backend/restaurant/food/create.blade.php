@extends('backend.restaurant.master')

@section('title')
    - create food
@endsection

@section('body')
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title mx-auto text-black-50">Create food</div>
            <div class="ibox-tools">
                <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
            </div>
        </div>

        <div class="ibox-body">
            @include('alert.notification')

            <form class="form-horizontal" action="{{route('food.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
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
                    <label class="col-sm-2 col-form-label"> Verity name <span class=text-danger>*</span></label>
                    <div class="col-sm-10">
                        <select name="variation_id" class="form-control @error('variation_id') is-invalid @enderror">
                            @foreach($verities as $verity)
                                <option  value="{{$verity->id}}" >{{$verity->verity}}</option>
                            @endforeach
                        </select>
                        @error('variation_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Food name <small>(ex:burger)</small></label>
                    <div class="col-sm-10">
                        <input name="name"  type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Food name" value="{{old('name')}}">
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
                        <input name="price" type="number" step="any"  class="form-control @error('price') is-invalid @enderror" placeholder="Price" value="{{old('price')}}">
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
                        <textarea name="description"  id="summernote" class="form-control @error('description') is-invalid @enderror" > {!! old('description') !!} </textarea>
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
                        <input name="nutrition"  type="number" step="any" class="form-control @error('nutrition') is-invalid @enderror" value="{{old('nutrition')}}" >
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
                        <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
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
