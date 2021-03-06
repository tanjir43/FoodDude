@extends('frontend.master')

@section('style')

@endsection

@section('body')
    <section>
        <div class="row p-0 mr-10 ">
            <div class="col-md-12">
                <img src="{{asset('/')}}FoodDude/image/food-bg.webp" class="h-90 w-100 pr-0 bg-img" alt="">
                <div class="container">
                    <div class="row">
                        <div class="searching-functionality2 ">
                            <div class="col-md">
                                <form action="{{route('restaurant.all.search')}}" method="GET" class="search-form font-size-13 text-center" style="margin-top: 14px !important;">

                                    <input type="search" style="width: 600px" name="query" id="search_text" class="search-location" placeholder="  Search your favorite restaurants , by restaurant name">
                                    <button type="submit"  class="btn bg-dark text-light ml-2 font-size-13" style="background-color: black !important;" >Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container pt-5">
        <div class="col-md-12 mx-auto">
        <div class="row ">
            <section class="py-5 bg-light" style="width: 100% !important;">
                <div class="container">
                    <form action="{{route('restaurant.filter')}}" method="post">
                        @csrf
                    <div class="row mx-auto">
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
                            <div class="row ">
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
                        <div class="col-md-7 ml-2 mx-auto">
                            <div class="row ">

                                <div class="col-md-6 font-weight-bold font-size-15 nunito">
                                    @if($restaurants)
                                        <div class="card-text">{{$restaurants->count()}} restaurant available </div>
                                    @else
                                        <div class="card-text">{{\App\Models\Restaurant::count()}} restaurant available </div>
                                    @endif
                                </div>
                                <div class="col-md-6 text-right">

                                    <select name="sortBy" onchange="this.form.submit();"  class="custom-select bg-light text-dark col-25  font-size-13" >
                                        <option value="" >Default sort</option>
                                        <option value="bookingPriceAsc"     @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'bookingPriceAsc') selected @endif >Booking price - Lower To Higher </option>
                                        <option value="bookingPriceDesc"    @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'bookingPriceDesc' ) selected @endif>Booking Price - Higher To Lower </option>
                                        <option value="titleAsc"            @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleAsc') selected @endif> A - Z </option>
                                        <option value="titleDesc"           @if(!empty($_GET['sortBy']) && $_GET['sortBy'] == 'titleDesc')selected @endif> Z - A </option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            @forelse($restaurants as $restaurant)
                                <div class="row mb-3" >
                                    <div class="col-md-4">
                                        <img onclick="window.location='{{route('restaurant.own',$restaurant)}}';" src="{{asset($restaurant->image)}}" style="height: 179px !important; cursor: pointer" class="card-img-top" alt="">
                                    </div>
                                    <div class="col-md-7 ml-3">
                                        <div class="card  card-body p-0 pl-3 border-0">
                                            <p class="text-danger mb-1 mt-3 " onclick="window.location='{{route('restaurant.own',$restaurant)}}';" style="cursor: pointer"> {{$restaurant->name}}</p>
                                            <span class="text-warning">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>

                                    <span class="text-black-50">(0)</span>
                                    <span class="text-black-50 float-right mr-2"> <small>Booked at - {{$restaurant->booking_price}} &#2547;</small> </span>
                                            </span>
                                            <p class="card-text font-size-15" style="margin: 2px !important;"><span class="text-black-50">{{\Illuminate\Support\Str::ucfirst($restaurant->region)}}</span> -   <small>{{  \Illuminate\Support\Str::limit( $restaurant->map_address,30,'...')}} </small></p>
                                            <div class="row">
                                                <div class="col-md-12"  style="margin: 2px !important;">
                                                    @foreach($restaurant->hours as $hour)
                                                        <button type="button" class="btn btn-danger" style="height: 25px; width: 57px !important; ">
                                                            <h6 style="font-size: 12px !important">{{$hour->hour}}</h6>
                                                            <h6  style="font-size: 12px !important">{{$hour->map_address}}</h6>
                                                        </button>
                                                    @endforeach
                                                        <h6 style="font-size: 12px !important ; margin-top: 5px; ">{{  \Illuminate\Support\Str::limit( $restaurant->hours_of_operation,100,'...')}} </h6>
                                                        <h6  class="font-size-15" style=""><i class="fa fa-bars"></i><small class="ml-2" style="font-weight: bold"> Booked 12 times today</small> </h6>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-danger text-center mt-5">Sorry, No restaurant found!!</p>
                            @endforelse
                            {{ $restaurants->links() }}
                        </div>
                    </div>
                </form>
                </div>
            </section>
        </div>
    </div>
    </div>

@endsection
