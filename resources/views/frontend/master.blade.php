<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.meta')
    <title>{{ str_replace('_', ' ', config('app.name', 'FoodDude')) }} @yield('title') </title>
    @include('frontend.includes.style')
</head>

<body>

@include('frontend.includes.header')

@yield('body')

@include('frontend.includes.footer')

@include('frontend.includes.script')
<!--auto Search functionality -->

<script>
    $(document).ready(function () {
        var path = "{{route('autosearch')}}";
        $('#search_text').autocomplete({
            source:function (request,response) {
                $.ajax({
                    url:path,
                    dataType: "JSON",
                    data:{
                        term:request.term
                    },
                    success:function (data) {
                        response(data);
                    }
                });
            },
            minLength:1,
        });
    });

</script>

</body>

</html>


