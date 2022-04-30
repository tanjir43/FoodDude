@extends('backend.admin.master')

@section('title')

    - {{auth('admin')->user()->full_name}}
@endsection

@section('body')

    <div class="row">
        <div class="col-md-12">
            @include('alert.notification')
            <div class="ibox">
                <div class="ibox-head">
                    <div class="ibox-title mx-auto">Add Role user</div>
                    <div class="ibox-tools">
                        <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        <a class="fullscreen-link"><i class="fa fa-expand"></i></a>
                    </div>
                </div>
                <div class="ibox-body">

                    <form class="form-horizontal" action="{{route('admin.add_user_role')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Full name <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control @error('full_name') is-invalid @enderror" name="full_name" type="text" placeholder="Full name" value="{{old('full_name')}}" required >
                                @error('full_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email" value="{{old('email')}}" required >
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Designation<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control @error('designation') is-invalid @enderror" name="designation" type="text" placeholder="Designation " value="{{old('designation')}}" required >
                                @error('designation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password<span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control @error('password') is-invalid @enderror" name="password" type="password" placeholder="Password " value="{{old('password')}}" required >
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Role<span class="text-danger">*</span></label>
                            <div class="col-sm-10">

                            <select name="status" class="form-control @error('password') is-invalid @enderror">
                                <option value="active"    {{old('role'== 'admin' ? 'selected' : '')}}>Admin</option>
                                <option value="inactive"  {{old('role' =='editor' ? 'selected' : '')}}>Editor</option>
                                <option value="inactive"  {{old('role' =='moderator' ? 'selected' : '')}}>Moderator</option>
                            </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10 ml-sm-auto">
                                <button class="btn btn-info " type="submit">Add new Admin</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection



