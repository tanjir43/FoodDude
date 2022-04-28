<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.meta')
    <title>{{ str_replace('_', ' ', config('app.name', 'FoodDude')) }} @yield('title') </title>

</head>
@include('frontend.includes.style')

<body>

@include('frontend.includes.header')

@yield('body')

@include('frontend.includes.footer')

@include('frontend.includes.script')

</body>

</html>
