<!DOCTYPE html>
<html lang="en">

<head>
    @include('backend.admin.includes.meta')
    @include('backend.admin.includes.style')

    <title>{{ str_replace('_', ' ', config('app.name', 'FoodDude')) }} @yield('title') </title>

</head>

<body class="fixed-navbar">
<div class="page-wrapper">
  @include('backend.admin.includes.header')

  @include('backend.admin.includes.menu')
    <div class="content-wrapper">
        <!-- START PAGE CONTENT-->
        <div class="page-content fade-in-up">

        @yield('body')

        </div>
        <!-- END PAGE CONTENT-->
        @include('backend.admin.includes.footer')
    </div>
</div>


<!-- BEGIN PAGE BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGE BACKDROPS-->
@include('backend.admin.includes.script')
</body>

</html>

