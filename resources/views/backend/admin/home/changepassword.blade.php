@extends('backend.admin.master')

@section('title')

    - {{auth('admin')->user()->full_name}}
@endsection

@section('body')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('password.update')}}" method="POST">
                    @csrf


                    <div class="row mb-3">
                        <input type="hidden" name="token" value="{{ csrf_token() }}">
                        <label for="current_password" class="col-md-12 col-form-label text-md-end">{{ __('Current_password') }}</label>

                        <div class="col-md-12">
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password"  >

                            @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="password" class="col-md-12 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                        </div>
                    </div>


                    <div class="form-group">
                        <button class="btn btn-outline-success" type="submit">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>


@endsection







