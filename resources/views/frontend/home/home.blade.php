@extends('frontend.master')

@section('style')
    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <style>
        input[type=number] {
            -moz-appearance: textfield;
        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection
@section('body')

<!-- carousel start -->
<section class=" bg-dark">

    <div id="mainSlider" class="carousel slide" data-ride="carousel" data-interval="1000">
        <ol class="carousel-indicators">
            <li data-target="#mainSlider" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner ">
            @foreach($banners as $key => $banner)
            <div class="carousel-item  {{$key == 0 ? 'active' : '' }} " data-interval="3000">
                <img src="{{$banner->image}}" class="w-100 h-400 opacity">
                <div class="carousel-caption">
                    <div class="carousel-title mb-4">
                        <h4 class=""><strong>{{$banner->title}}</strong></h4>
                    </div>
                    <div class="carousel-body">
                        <h6 class="" style="font-size: 12px">{!! \Illuminate\Support\Str::limit($banner->description,100,'...')!!}</h6>
                    </div>
                </div>
            </div>

            @endforeach

            <!--Carousel caption start-->
            <div class="carousel-caption search-caption">
                <h2>Find Your Table For Any Occasion</h2>
                <div class="row">
                    <div class="searching-functionality">
                        <div class="col-md">
                            <form action="{{route('restaurant.search')}}" method="GET" class="search-form font-size-13 ">
                                <input name="date" type="text" id="date_picker"  value="{{\Illuminate\Support\Carbon::now()->format('Y-m-d')}}" class="custom-select col-25  font-size-13">

                                <input type="number"oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="select-table col-25  font-size-13" placeholder="    Total Guest " style="height: 33px ;" name="guest" value="{{old('guest')}}">

{{--                                <input type="time" class="select-table col-25  font-size-13 "    name="time" value="{{old('time')}}" style="height: 33px ;">--}}
                                <input type="text" class="select-table col-25  font-size-13 "   placeholder="12:10:PM format in 24 hours" name="time" value="{{old('time')}}" style="height: 33px ;">

                                <select class="select-table col-25  font-size-13" style="height: 33px ;" name="type">
                                    <option value="all {{old('type' == 'all' ?  'selected' : '')}}">All</option>
                                    <option value="guest {{old('type' == 'guest' ? 'selected' : '')}}">Guest room</option>
                                </select>
                                <input type="text" name="location" class="search-location @error('location') is-invalid @enderror " required placeholder="Location,Restaurant">
                                @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                               <button type="submit"  class="btn bg-dark text-light ml-2 font-size-13">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Carousel caption end-->
        </div>
        <a href="#mainSlider" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a href="#mainSlider" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</section>
<!-- carousel end -->
<!--card section start for recently viewed restaurant-->
<section class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="text-light">Recently viewed</span>
                <div class="inline-view">
                    <span class="text-light text-right ">view all</span>
                </div>
                <hr style="height:2px; width:100%;  color:white; background-color:white">
            </div>
        </div>
    </div>
</section>

<section class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme">
                    <div class="card border-primary  h-338" style="cursor: pointer;"
                         onclick="window.location='index2.html';">
                        <img src="img/2.jpg" class="card-img-top h-200" alt="">
                        <div class="card-body card-color">
                            <h6 class="card-title font-weight-bold">Yahoo Restaurant</h6>
                            <p class="card-text font-size-13 mb-0 ">16/6,Et Gaden, ad Panthapath, Dhaka-1216</p>
                            <span class="font-size-13 mt-M ">

                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>

                                </span>
                            <span class="font-size-13 pl-3 inline-view ">Reviews</span>
                            <p class="font-size-13 font-weight-bold">Booked 26 times today</p>
                        </div>
                    </div>


                    <div class="card border-primary  h-338">
                        <img src="img/2.jpg" class="card-img-top h-200" alt="">
                        <div class="card-body card-color">
                            <h6 class="card-title font-weight-bold">Yahoo Restaurant</h6>
                            <p class="card-text font-size-13 mb-0 ">16/6,Et Gaden, ad Panthapath, Dhaka-1216</p>
                            <span class="font-size-13 mt-M ">

                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>

                                </span>
                            <span class="font-size-13 pl-3 inline-view ">Reviews</span>
                            <p class="font-size-13 font-weight-bold">Booked 26 times today</p>
                        </div>
                    </div>


                    <div class="card border-primary  h-338">
                        <img src="img/2.jpg" class="card-img-top h-200" alt="">
                        <div class="card-body card-color">
                            <h6 class="card-title font-weight-bold">Yahoo Restaurant</h6>
                            <p class="card-text font-size-13 mb-0 ">16/6,Et Gaden, ad Panthapath, Dhaka-1216</p>
                            <span class="font-size-13 mt-M ">

                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>

                                </span>
                            <span class="font-size-13 pl-3 inline-view ">Reviews</span>
                            <p class="font-size-13 font-weight-bold">Booked 26 times today</p>
                        </div>
                    </div>


                    <div class="card border-primary  h-338">
                        <img src="img/2.jpg" class="card-img-top h-200" alt="">
                        <div class="card-body card-color">
                            <h6 class="card-title font-weight-bold">Yahoo Restaurant</h6>
                            <p class="card-text font-size-13 mb-0 ">16/6,Et Gaden, ad Panthapath, Dhaka-1216</p>
                            <span class="font-size-13 mt-M ">

                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>

                                </span>
                            <span class="font-size-13 pl-3 inline-view ">Reviews</span>
                            <p class="font-size-13 font-weight-bold">Booked 26 times today</p>
                        </div>
                    </div>


                    <div class="card border-primary  h-338">
                        <img src="img/2.jpg" class="card-img-top h-200" alt="">
                        <div class="card-body card-color">
                            <h6 class="card-title font-weight-bold">Yahoo Restaurant</h6>
                            <p class="card-text font-size-13 mb-0 ">16/6,Et Gaden, ad Panthapath, Dhaka-1216</p>
                            <span class="font-size-13 mt-M ">

                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>

                                </span>
                            <span class="font-size-13 pl-3 inline-view ">Reviews</span>
                            <p class="font-size-13 font-weight-bold">Booked 26 times today</p>
                        </div>
                    </div>


                    <div class="card border-primary  h-338">
                        <img src="img/2.jpg" class="card-img-top h-200" alt="">
                        <div class="card-body card-color">
                            <h6 class="card-title font-weight-bold">Yahoo Restaurant</h6>
                            <p class="card-text font-size-13 mb-0 ">16/6,Et Gaden, ad Panthapath, Dhaka-1216</p>
                            <span class="font-size-13 mt-M ">

                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                    <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>

                                </span>
                            <span class="font-size-13 pl-3 inline-view ">Reviews</span>
                            <p class="font-size-13 font-weight-bold">Booked 26 times today</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--card section end for recently viewed restaurant-->

<section class="pt-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="font-size-15 font-weight-bold text-light">Popular Restaurants in Dhaka</span>
                <span class="font-size-15 text-light font-weight-bold inline-view">view all</span>
                <hr style="height: 2px; background-color: white; width: 100%;">
            </div>

        </div>

    </div>
</section>

<!--Popular Restaurant-->
<section class="py-5 bg-dark">
    <div class="container">
        <div class="row">
                @foreach($restaurants as $restaurant)
                        <div class="card border-primary mr-3 h-338" style="width: 267px !important;">
                            <img src="{{$restaurant->image}}" style="width: 265px !important; cursor: pointer"
                                 onclick="window.location='{{route('restaurant.own',$restaurant)}}';" class="card-img-top h-200" alt="">
                            <div class="card-body card-color">
                                <h6 class="card-title font-weight-bold">{{$restaurant->name}}</h6>
                                <p class="card-text font-size-13 mb-0 ">{{ \Illuminate\Support\Str::limit($restaurant->map_address,50,'...')}}</p>
                                <span class="font-size-13 mt-M ">

                                        <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg height="15px" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                             viewBox="0 0 20 20" fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>

                                    </span>
                                <span class="font-size-13 pl-3 inline-view ">Reviews</span>
                                <p class="font-size-13 font-weight-bold">Booked 26 times today</p>
                            </div>
                        </div>
                        @endforeach
        </div>
    </div>
</section>

<section class="bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <span class="font-size-15 font-weight-bold text-light">Choose Your Area</span>
                <span class="font-size-15 font-weight-bold inline-view text-light">See more</span>
                <hr style="width: 100%; background-color: #fff;height: 2px;">
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-dark">
    <div class="container">
        <div class="row">

            <div class="col-md-3 col-sm-6 col-lg-3 big-footer-height">
                <img src="./img/1.jpg" class="h-130 w-100 mt-4 opacity " alt="">
                <div class="carousel-caption ">
                    <h4>TEJGAON</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-3 big-footer-height">
                <img src="./img/1.jpg" class="h-130 w-100 mt-4 opacity " alt="">
                <div class="carousel-caption ">
                    <h4>DHANMONDI</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-3 big-footer-height">
                <img src="./img/1.jpg" class="h-130 w-100 mt-4 opacity " alt="">
                <div class="carousel-caption ">
                    <h4>GULSHAN</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-3 big-footer-height">
                <img src="./img/1.jpg" class="h-130 w-100 mt-4 opacity " alt="">
                <div class="carousel-caption ">
                    <h4>BANANI</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-3 big-footer-height">
                <img src="./img/1.jpg" class="h-130 w-100 mt-4 opacity " alt="">
                <div class="carousel-caption ">
                    <h4>JATRABARI</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-3 big-footer-height">
                <img src="./img/1.jpg" class="h-130 w-100 mt-4 opacity " alt="">
                <div class="carousel-caption ">
                    <h4>MOHAMMADPUR</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-3 big-footer-height">
                <img src="./img/1.jpg" class="h-130 w-100 mt-4 opacity " alt="">
                <div class="carousel-caption ">
                    <h4>PURAN DHAKA</h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-lg-3 big-footer-height">
                <img src="./img/1.jpg" class="h-130 w-100 mt-4 opacity " alt="">
                <div class="carousel-caption ">
                    <h4>PALTAN</h4>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@section('script')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script language="javascript">
        $(document).ready(function () {
            $("#date_picker").datepicker({
                minDate: 0
            });
        });
    </script
@endsection
