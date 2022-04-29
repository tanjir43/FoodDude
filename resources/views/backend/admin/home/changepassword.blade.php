@extends('backend.admin.master')

@section('title')

    - {{auth('admin')->user()->full_name}}
@endsection

@section('body')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('alert.notification')
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('password.update')}}" id="change_password_form" method="post">
                @csrf
                <div class="form-group">
                    <label>Current Password</label>
                    <input class="form-control text-primary" type="password" name="password" id="current_password"  placeholder="Password" >
                </div>

                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control text-primary" type="text" name="password"  id="new_password" placeholder="Password" >
                </div>
                <div class="form-group">
                    <label>Confirm  Password</label>
                    <input class="form-control text-primary" type="password" name="password" id="confirm_password"  placeholder="Password" >
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-success" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
