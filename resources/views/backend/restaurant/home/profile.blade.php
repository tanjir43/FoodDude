@extends('backend.restaurant.master')

@section('title')

    - {{auth('restaurant')->user()->name}}
@endsection

@section('body')

    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Profile</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>
            <li class="breadcrumb-item">{{$restaurant->name}}</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-3 col-md-4">
            <div class="ibox">
                <div class="ibox-body text-center">

                    <div class="m-t-20">
                        <img class="img-circle" src="{{$restaurant->image}}" />
                    </div>
                    <h5 class="font-strong m-b-10 m-t-10">{{$restaurant->name}}</h5>
                    <div class="m-b-20 text-muted">{{$restaurant->slogan}}</div>
                    <div class="profile-social m-b-20">
                        <a href="{{$restaurant->twitter_url}}"><i class="fa fa-twitter pr-1"></i></a>
                        <a href="{{$restaurant->facebook_url}}" target="_blank"><i class="fa fa-facebook pr-1"></i></a>
                        <a href="{{$restaurant->pinterest_url}}" target="_blank"><i class="fa fa-pinterest pr-1"></i></a>
                        <a href="{{$restaurant->linkedin_url}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                    <div>
                        <button class="btn btn-primary btn-rounded m-b-5">Message</button>
                    </div>
                </div>
            </div>
            <div class="ibox">
                <div class="ibox-body">

                    <p class="text-center">{!! \Illuminate\Support\Str::limit($restaurant->description,200,'...') !!}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-8">
            <div class="ibox">
                <div class="ibox-body">
                    <div>@include('alert.notification')</div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <ul class="nav nav-tabs tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active " href="#tab-1" data-toggle="tab"><i class="ti-bar-chart"></i> Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tab-2" data-toggle="tab"><i class="ti-settings"></i> Settings</a>

                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active " id="tab-1">
                            <div class="row">
                                <div class="col-md-6" style="border-right: 1px solid #eee;">
                                    In here , I will try to show This admin curriculam activities
                                </div>
                                <div class="col-md-6">
                                    Hi
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tab-2">

                            <form action="{{route('profile.update',['id'=> auth('restaurant')->user()->id])}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-sm-12 form-group">
                                        <label> Restaurant Name</label>
                                        <input class="form-control" type="text" placeholder="Name" name="name" value="{{auth('restaurant')->user()->name}}">
                                        {{--                                                @captcha--}}
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" placeholder="Email address" readonly name="email" value="{{auth('restaurant')->user()->email}}">
                                </div>

                                <div class="form-group">
                                    <label class="text-danger">Password</label>
                                    <input class="form-control text-danger" type="password" name="password" required  placeholder="Password" >
                                </div>

                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" type="number" placeholder="mobile" name="mobile" value="{{auth('restaurant')->user()->mobile}}">
                                </div>

                                <div class="form-group">
                                    <label>Booking price</label>
                                    <input class="form-control" type="number" placeholder="mobile" name="mobile" value="{{auth('restaurant')->user()->booking_price}}">
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
                                    </div>
                                    <div id="holder" style="margin-top:15px;max-height:100px;"><img src="{{auth('restaurant')->user()->image}}" height="80px" alt=""></div>
                                </div>

                                <div class="form-group">
                                    <label>Slogan</label>
                                    <input class="form-control" type="text" placeholder="Slogan" name="slogan" value="{{auth('restaurant')->user()->slogan}}">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" id="summernote" >{{$restaurant->description}}</textarea>
                                </div>



                                <div class="form-group">
                                    <label>Owner</label>
                                    <input class="form-control" type="text" placeholder="Owner name" name="owner" value="{{auth('restaurant')->user()->owner}}">
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
                                    </div>
                                    <div id="holder1" style="margin-top:15px;max-height:100px;"><img src="{{auth('restaurant')->user()->ownerImage}}" height="80px" alt=""></div>
                                </div>

                                <div class="form-group">
                                    <label>Established at</label>
                                    <input class="form-control" type="date" placeholder="Established at" name="established_at" value="{{auth('restaurant')->user()->established_at}}">
                                </div>

                                <div class="form-group">
                                    <label> Region</label>
                                    <input class="form-control" type="text" placeholder=" Region" name="region" value="{{auth('restaurant')->user()->region}}">
                                </div>

                                <div class="form-group">
                                    <label> Physical distancing</label>
                                    <textarea name="physical_distancing" class="form-control" id="summernote1" >{{$restaurant->physical_distancing}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>  Safety cleaning</label>
                                    <textarea name="safety_cleaning" class="form-control" id="summernote2" >{{$restaurant->safety_cleaning}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label> Map link</label>
                                    <input class="form-control" type="text" placeholder=" Map link" name="map_link" value="{{auth('restaurant')->user()->map_link}}">
                                </div>

                                <div class="form-group">
                                    <label> Map address</label>
                                    <input class="form-control" type="text" placeholder=" Map address" name="map_address" value="{{auth('restaurant')->user()->map_address}}">
                                </div>


                                <div class="form-group">
                                    <label> Neighborhood</label>
                                    <input class="form-control" type="text" placeholder=" Neighborhood" name="neighborhood" value="{{auth('restaurant')->user()->neighborhood}}">
                                </div>

                                <div class="form-group">
                                    <label> Hours_of_operation</label>
                                    <textarea name="hours_of_operation" class="form-control" id="summernote" >{{$restaurant->hours_of_operation}}</textarea>
                                </div>


                                <div class="form-group">
                                    <label> Parking details</label>
                                    <input class="form-control" type="text" placeholder="Parking details" name="parking_details" value="{{auth('restaurant')->user()->parking_details}}">
                                </div>


                                <div class="form-group">
                                    <label> payment_option</label>
                                    <input class="form-control" type="text" placeholder=" payment_option" name="payment_option" value="{{auth('restaurant')->user()->payment_option}}">
                                </div>


                                <div class="form-group">
                                    <label> Payment_system</label>
                                    <input class="form-control" type="text" placeholder="  payment_system" name="payment_system" value="{{auth('restaurant')->user()->payment_system}}">
                                </div>

                                <div class="form-group">
                                    <label> Additional</label>
                                    <input class="form-control" type="text" placeholder="  additional" name="additional" value="{{auth('restaurant')->user()->additional}}">
                                </div>

                                <div class="form-group">
                                    <label> website</label>
                                    <input class="form-control" type="text" placeholder="  website" name="website" value="{{auth('restaurant')->user()->website}}">
                                </div>

                                <div class="form-group">
                                    <label> Catering</label>
                                    <input class="form-control" type="text" placeholder=catering" name="catering" value="{{auth('restaurant')->user()->catering}}">
                                </div>

                                <div class="form-group">
                                    <label>Facebook url</label>
                                    <input class="form-control" type="text" placeholder="Facebook url" name="facebook_url" value="{{auth('restaurant')->user()->facebook_url}}">
                                </div>
                                <div class="form-group">
                                    <label>Twitter url</label>
                                    <input class="form-control" type="text" placeholder="Twitter url" name="twitter_url" value="{{auth('restaurant')->user()->twitter_url}}">
                                </div>
                                <div class="form-group">
                                    <label>Pinterest url</label>
                                    <input class="form-control" type="text" placeholder="Pinterest url" name="pinterest_url" value="{{auth('restaurant')->user()->pinterest_url}}">
                                </div>
                                <div class="form-group">
                                    <label>Linkedin url</label>
                                    <input class="form-control" type="text" placeholder="Linkedin url" name="linkedin_url" value="{{auth('restaurant')->user()->linkedin_url}}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{$restaurant->status== 'active' ? 'selected' : ''}}>Active</option>
                                        <option value="inactive" {{$restaurant->status =='inactive' ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-outline-success" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



