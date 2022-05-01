<!-- CORE PLUGINS-->
<script src="{{asset('/')}}FoodDude/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script src="{{asset('/')}}FoodDude/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}FoodDude/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}FoodDude/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}FoodDude/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="{{asset('/')}}FoodDude/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}FoodDude/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="{{asset('/')}}FoodDude/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="{{asset('/')}}FoodDude/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="{{asset('/')}}FoodDude/assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="{{asset('/')}}FoodDude/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<!-- SwitchToggle-->
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<!-- SWEETALERT-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- SUMMERNOTE-->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
<!-- FILE MANAGER-->
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

<!-- Alert Fade up-->
<script>
    setTimeout(function () {
        $('#alert').slideUp();
    },4000);
</script>


@yield('script')
