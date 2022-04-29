@extends('backend.admin.master')

@section('title')

    - {{auth('admin')->user()->full_name}}
@endsection

@section('body')

        <!-- START PAGE CONTENT-->
        <div class="page-heading">
            <h1 class="page-title">Profile</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html"><i class="la la-home font-20"></i></a>
                </li>
                <li class="breadcrumb-item">Profile</li>
            </ol>
        </div>

            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="ibox">
                        <div class="ibox-body text-center">
                            <div class="m-t-20">
                                <img class="img-circle" src="{{auth('admin')->user()->image}}" />
                            </div>
                            <h5 class="font-strong m-b-10 m-t-10">{{auth('admin')->user()->full_name}}</h5>
                            <div class="m-b-20 text-muted">{{auth('admin')->user()->designation}}</div>
                            <div class="profile-social m-b-20">
                                <a href="{{auth('admin')->user()->twitter_url}}"><i class="fa fa-twitter"></i></a>
                                <a href="{{auth('admin')->user()->facebook_url}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{auth('admin')->user()->pinterest_url}}"><i class="fa fa-pinterest"></i></a>
                                <a href="{{auth('admin')->user()->linkedin_url}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-rounded m-b-5">Message</button>
                            </div>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-body">

                            <p class="text-center">{!! auth('admin')->user()->bio !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="ibox">
                        <div class="ibox-body">

                                <p class="mb-5 text-primary" ><i class="ti-settings "></i> Settings</p>

                            <form action="{{route('profile.update',['id'=> auth('admin')->user()->id])}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-sm-12 form-group">
                                        <label>Full Name</label>
                                        <input class="form-control" type="text" placeholder="Full Name" name="full_name" value="{{auth('admin')->user()->full_name}}">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" placeholder="Email address" name="email" value="{{auth('admin')->user()->email}}">
                                </div>

                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="form-control" type="number" placeholder="mobile" name="mobile" value="{{auth('admin')->user()->mobile}}">
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
                                    <div id="holder" style="margin-top:15px;max-height:100px;"><img src="{{auth('admin')->user()->image}}" height="80px" alt=""></div>

                                </div>


                                <div class="form-group">
                                    <label>Designation</label>
                                    <input class="form-control" type="text" placeholder="Designation" name="designation" value="{{auth('admin')->user()->designation}}">
                                </div>

                                <div class="form-group">
                                    <label>Bio</label>
                                    <textarea name="bio" class="form-control" id="summernote" >{{auth('admin')->user()->bio}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Facebook url</label>
                                    <input class="form-control" type="text" placeholder="Facebook url" name="facebook_url" value="{{auth('admin')->user()->facebook_url}}">
                                </div>
                                <div class="form-group">
                                    <label>Twitter url</label>
                                    <input class="form-control" type="text" placeholder="Twitter url" name="twitter_url" value="{{auth('admin')->user()->twitter_url}}">
                                </div>
                                <div class="form-group">
                                    <label>Pinterest url</label>
                                    <input class="form-control" type="text" placeholder="Pinterest url" name="pinterest_url" value="{{auth('admin')->user()->pinterest_url}}">
                                </div>
                                <div class="form-group">
                                    <label>Linkedin url</label>
                                    <input class="form-control" type="text" placeholder="Linkedin url" name="linkedin_url" value="{{auth('admin')->user()->linkedin_url}}">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="password"  placeholder="Password" >
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-default" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection
