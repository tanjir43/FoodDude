<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="{{asset('/')}}FoodDude/frontend/img/logo.png" />

    <title>Restaurant | register</title>
    <link href="{{asset('/')}}FoodDude/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('/')}}FoodDude/assets/css/main.css" rel="stylesheet" />
    <link href="{{asset('/')}}FoodDude/assets/css/pages/auth-light.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    <!-- SwitchToggle-->
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

</head>

<body class="" style="background-image: url('{{asset('/')}}FoodDude/image/food-bg.webp');">
<div class="">
    <div class="brand pt-4 mt-4">
        <h3 class="text-black-50">Welcome to  </h3>
        <a class="link" href="{{route('home')}}"><img src="{{asset('/')}}FoodDude/image/logo.png" alt=""></a>
    </div>

    <div class="row  ">
        <div>@include('alert.notification')</div>
        <div class="col-md-6  pt-3 mx-auto mb-5" style=" background-color: white; ">
            <form action="{{route('restaurant.register')}}" method="post" enctype="multipart/form-data">
                @csrf


                <div class="form-group">
                    <label> Restaurant Name</label>
                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{{old('name')}}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" placeholder="Email address"  name="email" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="text-danger">Password</label>
                    <input class="form-control text-danger" type="password" name="password"  placeholder="Password" >

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Mobile</label>
                    <input class="form-control" type="number" placeholder="mobile" name="mobile" value="{{old('mobile')}}">

                    @error('mobile')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                        <input id="thumbnail" class="form-control" type="text" name="image">

                        @error('image')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"><img src="{{old('image')}}" height="80px" alt=""></div>
                </div>

                <div class="form-group">
                    <label>Slogan</label>
                    <input class="form-control" type="text" placeholder="Slogan" name="slogan" value="{{old('slogan')}}">

                    @error('slogan')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control" id="summernote" ></textarea>
                </div>



                <div class="form-group">
                    <label>Owner</label>
                    <input class="form-control" type="text" placeholder="Owner name" name="owner" value="{{old('owner')}}">

                    @error('owner')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Owner Image</label>
                    <div class="input-group">
                <span class="input-group-btn">
                    <a id="lfm1" data-input="thumbnail1" data-preview="holder1" class="btn btn-primary">
                        <i class="fa fa-picture-o"></i> Choose
                    </a>
                </span>
                        <input id="thumbnail1" class="form-control" type="text" name="ownerImage">

                        @error('ownerImage')
                        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                        @enderror
                    </div>
                    <div id="holder1" style="margin-top:15px;max-height:100px;"><img src="" height="80px" alt=""></div>
                </div>

                <div class="form-group">
                    <label>Established at</label>
                    <input class="form-control" type="date" placeholder="Established at" name="established_at" value="{{old('established_at')}}">

                    @error('established_at')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Region</label>
                    <input class="form-control" type="text" placeholder=" Region" name="region" value="{{old('region')}}">
                    @error('region')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Physical distancing</label>
                    <textarea name="physical_distancing" class="form-control"  id="summernote1" ></textarea>

                </div>

                <div class="form-group">
                    <label>  Safety cleaning</label>
                    <textarea name="safety_cleaning" class="form-control" id="summernote2" >{!! old('safety_cleaning') !!}</textarea>
                    @error('safety_cleaning')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Map link</label>
                    <input class="form-control" type="text" placeholder=" Map link" name="map_link" value="{{old('map_link')}}">
                    @error('map_link')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Map address</label>
                    <input class="form-control" type="text" placeholder=" Map address" name="map_address" value="{{old('map_address')}}">
                    @error('map_address')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label> Neighborhood</label>
                    <input class="form-control" type="text" placeholder=" Neighborhood" name="neighborhood" value="{{old('neighborhood')}}">
                    @error('neighborhood')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Hours_of_operation</label>
                    <textarea name="hours_of_operation" class="form-control" id="summernote" >{{old('hours_of_operation')}}</textarea>

                </div>


                <div class="form-group">
                    <label> Parking details</label>
                    <input class="form-control" type="text" placeholder="Parking details" name="parking_details" value="{{old('parking_details')}}">
                    @error('parking_details')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label> payment_option</label>
                    <input class="form-control" type="text" placeholder=" payment_option" name="payment_option" value="{{old('payment_option')}}">
                    @error('payment_option')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label> Payment_system</label>
                    <input class="form-control" type="text" placeholder="  payment_system" name="payment_system" value="{{old('payment_system')}}">
                    @error('payment_system')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Additional</label>
                    <input class="form-control" type="text" placeholder="  additional" name="additional" value="{{old('additional')}}">
                    @error('additional')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> website</label>
                    <input class="form-control" type="text" placeholder="  website" name="website" value="{{old('website')}}">
                    @error('website')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label> Catering</label>
                    <input class="form-control" type="text" placeholder=catering" name="catering" value="{{old('catering')}}">
                    @error('catering')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Facebook url</label>
                    <input class="form-control" type="text" placeholder="Facebook url" name="facebook_url" value="{{old('facebook_url')}}">
                    @error('facebook_url')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Twitter url</label>
                    <input class="form-control" type="text" placeholder="Twitter url" name="twitter_url" value="{{old('twitter_url')}}">
                    @error('twitter_url')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pinterest url</label>
                    <input class="form-control" type="text" placeholder="Pinterest url" name="pinterest_url" value="{{old('pinterest_url')}}">
                    @error('pinterest_url')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Linkedin url</label>
                    <input class="form-control" type="text" placeholder="Linkedin url" name="linkedin_url" value="{{old('linkedin_url')}}">
                    @error('linkedin_url')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : ''}}>Active</option>
                        <option value="inactive" {{old('status')  =='inactive' ? 'selected' : ''}}>Inactive</option>
                    </select>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-outline-success" type="submit">Submit</button>
                </div>
            </form>

        </div>
    </div>

</div>
</body>

<!-- CORE PLUGINS-->
<script src="{{asset('/')}}FoodDude/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}FoodDude/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}FoodDude/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

<!-- SUMMERNOTE-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote ,#summernote1 ,#summernote2').summernote();
    });
</script>
<!-- FILE MANAGER-->
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
<script>
    $('#lfm1').filemanager('image1');
</script>

<!-- Alert Fade up-->
<script>
    setTimeout(function () {
        $('#alert').slideUp();
    },4000);
</script>


</html>



