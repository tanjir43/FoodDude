@extends('frontend.master')
@section('style')

@endsection

@section('body')
        <section>
            <div class="container" style="background-image: url('{{asset('/')}}FoodDude/image/food-bg.webp');">

                <div class="row">
                    <div class="col-md-8 mx-auto">

                        <div class="card"  >
                            <div class="row" style="background-color: white">
                                <div class="col-md-12">
                                    <h5 class="text-center mt-3 text-black-50">Total tables in this hours</h5>
{{--                                    <input type="hidden" name="guest" value="{{$guest}}">--}}
                                    @foreach($restaurant->hours as $hour)

                                        <button class="btn btn-success">{{$hour->hour}} </button>
                                    @endforeach
                            </div>
                                <div class="card-body  d-block float-left"  style="width: 100% ; position: relative">


                            <h5 class="card-title text-center text-black-50 mb-2">Restaurant View</h5>
                            @foreach($tables as $table)

                                        <a href="{{route('restaurant.reservation complete',$hour)}}" class="text-white">  <img src="{{$table->image}}" alt="" width="220px" height="180px"></a>

                                        <span class="btn btn-success" style="position: absolute ; margin-left: -150px; justify-content: center"><a href="{{route('restaurant.reservation complete',$table, $guest)}}" class="text-white">{{$table->name}}</a></span>
                                @endforeach
                        </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
@endsection

