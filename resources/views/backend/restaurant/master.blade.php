<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.restaurant.includes.meta')
    @include('backend.restaurant.includes.style')

    <title>{{ str_replace('_', ' ', config('app.name', 'FoodDude')) }} @yield('title') </title>

</head>

<body class="fixed-navbar">
<div class="page-wrapper">
  @include('backend.restaurant.includes.header')

  @include('backend.restaurant.includes.menu')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">

        @yield('body')

        </div>
        <!-- END PAGE CONTENT-->
        @include('backend.restaurant.includes.footer')
    </div>
</div>


<!-- BEGIN PAGE BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGE BACKDROPS-->
@include('backend.restaurant.includes.script')
</body>

</html>

