<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="shortcut icon" type="image" href="{{asset('/')}}FoodDude/frontend/img/logo.png" />

    <title>Admin | Login</title>
    <link href="{{asset('/')}}FoodDude/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('/')}}FoodDude/assets/css/main.css" rel="stylesheet" />
    <link href="{{asset('/')}}FoodDude/assets/css/pages/auth-light.css" rel="stylesheet" />
</head>

<body class="" style="background-image: url('{{asset('/')}}FoodDude/image/food-bg.webp');">
<div class="content">
    <div class="brand pt-5 mt-5">
        <h3 class="text-black-50">Welcome to  </h3>
        <a class="link" href="{{route('home')}}"><img src="{{asset('/')}}FoodDude/image/logo.png" alt=""></a>
    </div>
    <form id="login-form"  method="POST" action="{{route('restaurant.login')}}" style="background-color: rgba(0, 0, 0, 0.4);">
        @csrf
        <h2 class="login-title">Log in</h2>
        @include('alert.notification')
        <div class="form-group pb-2">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-envelope"></i></div>
                <input class="form-control" type="email" name="email" placeholder="Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group pb-2">
            <div class="input-group-icon right">
                <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                <input class="form-control" type="password" name="password" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group pb-2">
            <button class="btn btn-info btn-block" type="submit">Login</button>
        </div>
        <div class="text-center">Not a member?
            <a class="color-white" href="{{route('register.form')}}">Create account</a>
        </div>
    </form>
</div>
</body>
<script src="{{asset('/')}}FoodDude/assets/vendors/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>

</html>


