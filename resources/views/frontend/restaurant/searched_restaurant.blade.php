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

@section('body')

    <section>
        <div class="row p-0 mr-10 ">
            <div class="col-md-12">
                <img src="{{asset('/')}}FoodDude/image/menu.png" class="h-90 w-100 pr-0 bg-img" alt="">
                <div class="container">
                <div class="row">
                    <div class="searching-functionality2 ">
                        <div class="col-md">
                            <form action="{{route('restaurant.search')}}" method="GET" class="search-form font-size-13 ">
                                <input name="date" type="text" id="date_picker" placeholder="mm/dd/yy" class="custom-select col-25  font-size-13">

                                <input type="number"oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="select-table col-25  font-size-13" placeholder="   Guest no" style="height: 33px ;" name="guest" value="{{old('guest')}}">

                                <input type="time" class="select-table col-25  font-size-13 "    name="time" value="{{old('time')}}" style="height: 33px ;">

                                <select class="select-table col-25  font-size-13" style="height: 33px ;" name="type">
                                    <option value="all {{old('type' == 'all' ?  'selected' : '')}}">All</option>
                                    <option value="guest {{old('type' == 'guest' ? 'selected' : '')}}">Guest room</option>
                                </select>
                                <input type="text" name="location" class="search-location" placeholder="Location,Restaurant">

                                <button type="submit"  class="btn bg-dark text-light ml-2 font-size-13" style="background-color: black !important;" >Search</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-4 nunito">
                    <span><i class="fas fa-utensils"></i></span>
                    <span class="card-text ml-2 font-size-15 text-danger ">Dining Option</span>
                    <div class="dining-options pt-3 line-h-1-">
                        <a href="" class="dining-options"> <input type="radio" name="dining-option" id="">&nbsp; All
                            dining option</a> <br>
                        <a href="" class="dining-options"> <input type="radio" name="dining-option" id="">&nbsp;
                            Delivery only</a><br>
                        <a href="" class="dining-options"> <input type="radio" name="dining-option" id="">&nbsp;Takeout
                            only</a>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-deck ">
                                <div class="card-body ">
                                    <button type="button" class="btn  border-secondary bg-transparent w-33 font-size-15">$$</button>
                                    <button type="button" class="btn border-secondary bg-transparent w-33 font-size-15">$$</button>
                                    <button type="button" class="btn border-secondary bg-transparent w-33 font-size-15">$$</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-7 ml-2">
                    <div class="row">

                        <div class="col-md-6 font-weight-bold font-size-15 nunito">
                            <div class="card-text">{{$data->count()}} restaurant available </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <select class="custom-select bg-light text-dark col-25  font-size-13" name="sortBy" onchange="this.form.submit();" id="sortBy">
                                <option value="">Default</option>
                                <option value="priceDesc">Featured</option>
                                <option value="priceDesc">Popular</option>
                                <option value="priceDesc">Newest</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    @forelse($data as $restaurant)
                    <div class="row">
                        <div class="col-md-4">
                            <img onclick="window.location='{{route('restaurant.own',$restaurant)}}';" src="{{asset($restaurant->image)}}" style="height: 179px !important; cursor: pointer" class="card-img-top" alt="">
                        </div>
                        <div class="col-md-7 ml-3">
                            <div class="card  card-body p-0 border-0">
                                <p class="text-danger mb-1" onclick="window.location='{{route('restaurant.own',$restaurant)}}';" style="cursor: pointer"> {{$restaurant->name}}</p>
                                <span class="text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>

                                    <span class="text-black-50">(0)</span></span>
                                <p class="card-text font-size-15 ">{{\Illuminate\Support\Str::ucfirst($restaurant->region)}} - <small>{{  \Illuminate\Support\Str::limit( $restaurant->map_address,40,'...')}} </small></p>
                                <div class="row">
                                    <div class="col-md-12 ">
{{--                                        @foreach($restaurant->hours as $hour)--}}
{{--                                        <button type="button" class="btn btn-danger mb-3 " style="height: 25px; width: 57px !important;">--}}
{{--                                           @foreach($date->hours as $hours)--}}
{{--                                                <h6  style="font-size: 12px !important">{{$hour->hour}}</h6>--}}
{{--                                            @endforeach--}}
{{--                                        </button>--}}
{{--                                        @endforeach--}}

                                        @foreach($restaurant->dates as $date)
                                            @foreach($date->hours as $hour)

                                            <button type="button" class="btn btn-danger mb-3 " style="height: 25px; width: 57px !important;">
                                                <h6  style="font-size: 12px !important">{{$hour->hour}}</h6>
                                        </button>
                                            @endforeach
                                        @endforeach
                                        <h6  class="font-size-15" style=""><i class="fa fa-bars"></i><small class="ml-2" style="font-weight: bold"> Booked 12 times today</small> </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                        <p class="text-danger text-center mt-5">Sorry, No restaurant found!!</p>
                    @endforelse
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
