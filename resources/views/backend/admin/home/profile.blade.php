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
                                <img class="img-circle" src="{{$user->image}}" />
                            </div>
                            <h5 class="font-strong m-b-10 m-t-10">{{$user->full_name}}</h5>
                            <div class="m-b-20 text-muted">{{$user->designation}}</div>
                            <div class="profile-social m-b-20">
                                <a href="{{$user->twitter_url}}"><i class="fa fa-twitter pr-1"></i></a>
                                <a href="{{$user->facebook_url}}" target="_blank"><i class="fa fa-facebook pr-1"></i></a>
                                <a href="{{$user->pinterest_url}}" target="_blank"><i class="fa fa-pinterest pr-1"></i></a>
                                <a href="{{$user->linkedin_url}}" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <div>
                                <button class="btn btn-primary btn-rounded m-b-5">Message</button>
                            </div>
                        </div>
                    </div>
                    <div class="ibox">
                        <div class="ibox-body">

                            <p class="text-center">{!!$user->bio !!}</p>
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
                                            In here i will try to show This admin curriculam activities
                                        </div>
                                        <div class="col-md-6">
                                            Hi
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-2">

                                    <form action="{{route('profile.update',['id'=> auth('admin')->user()->id])}}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">

                                            <div class="col-sm-12 form-group">
                                                <label>Full Name</label>
                                                <input class="form-control" type="text" placeholder="Full Name" name="full_name" value="{{auth('admin')->user()->full_name}}">
{{--                                                @captcha--}}
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" type="email" placeholder="Email address" readonly name="email" value="{{auth('admin')->user()->email}}">
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
                                            <textarea name="bio" class="form-control" id="summernote" >{{$user->bio}}</textarea>
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
                                            <label>Status</label>
                                            <select name="status" class="form-control">
                                                <option value="active" {{$user->status== 'active' ? 'selected' : ''}}>Active</option>
                                                <option value="inactive" {{$user->status =='inactive' ? 'selected' : ''}}>Inactive</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="status"  readonly class="form-control">
                                                <option value="active"   selected {{$user->role== 'admin' ? 'selected' : ''}}>Admin</option>
                                                <option value="inactive" disabled {{$user->role =='editor' ? 'selected' : ''}}>Editor</option>
                                                <option value="inactive" disabled {{$user->role =='moderator' ? 'selected' : ''}}>Moderator</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="text-danger">Password</label>
                                            <input class="form-control text-danger" type="password" name="password"  placeholder="Password" >
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



