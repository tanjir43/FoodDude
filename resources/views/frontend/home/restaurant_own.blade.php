@extends('frontend.master')

@section('body')


<section class="bg-dark">
        <div class="">
            <div class="">
                <img src="{{$restaurant->image}}" class="h-400 w-100 opacity" alt="">
            </div>
            <div class="carousel-caption my-caption">
                <h1 class="carousel-title text-right pb-5 col-title">{{$restaurant->name}}</h1>
                <div class="col-text">
                    <h4 class="carousel-text text-right mb-5 pb-5 d-hide col-text h-20 " style="padding-bottom: 150px !important;">{{$restaurant->slogan}}</h4>
                </div>
            </div>
        </div>
</section>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <!--Left bar restaurant-->
            <div class="col-md-7  navbar-dark w-100 ">
                <div class=" w-100 py-3 ">
                    <h3 class="res-name w-100 text-dark">{{$restaurant->name}}</h3>
                    <hr class="w-100 bg-light mb-0" style="height: 1px; ">
                </div>
                <div>

                    <ul class="nav nav-pills card-color pl-20">
                        <li class="nav-items"><a href="#home" data-toggle="pill"
                                                 class="nav-link active text-light rounded-0">Home</a></li>
                        <li class="nav-items"><a href="#menus" data-toggle="pill"
                                                 class="nav-link text-light rounded-0">Menu</a>
                        </li>
                        <li class="nav-items"><a href="#reviews" data-toggle="pill"
                                                 class="nav-link text-light rounded-0">Reviews</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link text-light" data-toggle="dropdown"
                               href="#">Photos<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#food" class="nav-link text-dark" data-toggle="pill">Food</a>
                                </li>
                                <li>
                                    <a href="#interior" class="nav-link text-dark" data-toggle="pill">Interior</a>
                                </li>
                                <li>
                                    <a href="#exterior" class="nav-link text-dark" data-toggle="pill">Exterior</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id=home>
                            <div class="card border-0 card-body font-size-13 pt-1 pl-1 sans-serif"
                                 style="display: block;">
                                <span><i class="fas fa-comments pr-2 pt-3 pl-3"></i>No reviews</span>
                                <span class="ml-4"><i class="fas fa-utensils pr-2"></i>{{$restaurant->region}}</span>
                                <hr class="w-100 bg-light mb-0" style="height: 1px; ">

                                <p class="card-text py-4 text-justify nunito p-3 line-h-1 ">{!! $restaurant->description !!}</p>
                            </div>
                            <div class="safety-precautions bg-white nunito font-size-13 py-2">
                                <h5>Safety precautions</h5>


                                <hr class="w-100 bg-light mb-0" style="height: 1px; ">

                                <p class="font-size-15 pt-2 p-2">Safety and Cleaning</p>
                                <span><i class="fas fa-hand-point-right pr-2 p-2"></i> {!! $restaurant->safety_cleaning!!}</span>
                                <p class="font-size-15 pt-2 p-2">Physical distancing</p>
                                <span>{!! $restaurant->physical_distancing !!}</span>

                            </div>
                        </div>
                        <!--Menu menus start-->


                        <div class="tab-pane fade" id="menus">
                            <div class="card card-body border-0">

                                <div class="accordion" id="accordionId">

                                    <ul class="nav nav-pills">
                                        @foreach($menus as $menu)

                                        <li class="dropdown ">
                                            <a class="dropdown-toggle nav-link text-dark" data-toggle="dropdown"
                                               href="#">{{$menu->period}}<span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li class="dropdown-item">
                                                    @foreach($menu->variation as $variation)
                                                    <a href="#seaFood" class="nav-link text-dark" style="background-color: transparent; text-align: center;"
                                                       data-toggle="collapse"
                                                       data-toggle="pill" >{{$variation->verity}}</a> </li>

                                                 <div class="tab-content">
                                                    @foreach($variation->food as $food)

                                                         <div class="collapse  show" id="collapseTwo" data-parent="#accordionId">

                                                            <div class="tab-pane " id="seaFood">
                                                                <h6 class=" font-weight-bold"> </h6>
                                                                <div class="row mh-100">
                                                                    <div class="col-md-12 pl-4">

                                                                        <span href="" data-toggle="modal"   class="text-danger font-size-13  bg-transparent  " style= "width: 100px !important;" >
                                                                            {{$food->name}}
                                                                        </span>
                                                                        <br>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>


                                                    @endforeach
                                                </div>
                                                    @endforeach
                                             </ul>
                                         </li>
                                        @endforeach

                                    </ul>
                                    <hr>


                                    <div class="tab-content">
                                        <h6 class=" font-weight-bold">All Foods </h6>
                                        @foreach($foods as $food)
                                        <div class="collapse  show" id="collapseTwo" data-parent="#accordionId">

                                            <div class="tab-pane " id="seaFood">

                                                <div class="row mh-100">
                                                    <div class="col-md-12">

                                                        <a href="" data-toggle="modal" data-target="#foodId{{$food->id}}"  class="text-danger font-size-13  bg-transparent  " style= "width: 100px !important;" >
                                                            {{$food->name}}
                                                        </a>
                                                        <br>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="foodId{{$food->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        @php
                                                            $food = \App\Models\Restaurant\Food::where('id',$food->id)->first();
                                                        @endphp

                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">{{$food->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{asset($food->image)}}" width="100%" alt="">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>Period :  </strong>
                                                                <p>{{\App\Models\Restaurant\Menu::where('id',$food->menu_id)->value('period')}} </p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Verity  :  </strong>
                                                                <p>{{\App\Models\Restaurant\Variation::where('id',$food->verity_id)->value('verity')}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <strong>Period :  </strong>
                                                                <p>{!! $food->description!!}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <strong>Nutrition  :  </strong>
                                                                <p>{{$food->nutrition}} KCL</p>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>



                        <!--Menu review  start-->

                        <div class="tab-pane fade" id="reviews">

                            <div class="card border-0 ">
                                <div class="card-header nunito bg-white">
                                    <h4 class="sans-serif">What 32 people are saying</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-6 nunito">
                                            <p class="font-size-15 font-weight-bold card-text">Overall ratings and
                                                reviews</p>
                                            <p class="font-size-13 text-justify">Reviews can only be made by diners
                                                who have eaten at this restaurant</p>
                                            <span class="">

                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>

                                                </span>
                                            <span class="font-size-13 pl-3 text-justify text-danger">based on recent
                                                    ratings</span>
                                            <div class="row font-size-10 pt-3">
                                                <div class="col-md-3 mb">
                                                    <p class="mb-1 font-size-13">4.4</p>
                                                    <p class="text-danger">Food</p>
                                                </div>
                                                <div class="col-md-3 ">
                                                    <p class="mb-1 font-size-13">4.5</p>
                                                    <p class="text-danger">Service</p>
                                                </div>
                                                <div class="col-md-3 p">
                                                    <p class="mb-1 font-size-13">4.7</p>
                                                    <p class="text-danger">Ambience</p>
                                                </div>
                                                <div class="col-md-3">
                                                    <p class="mb-1 font-size-13">4.0</p>
                                                    <p class="text-danger">Value</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-5 pl-4"></div>
                                    </div>


                                </div>

                                <div class="card-body border-0  p-0">
                                    <div class="row">
                                        <div class="col-md-3 ml-3 p-0">
                                            <img src="./img/men.jpg" class="card-img-top" alt="">
                                            <div class="inform bg-light text-center ">
                                                <p class="card-text font-size-13 font-weight-bold mb-0 ">Tanjir</p>
                                                <p class="card-text font-size-10 text-danger">Ashrafpur,Chandpur</p>
                                            </div>
                                        </div>
                                        <div class="col-md-8 pl-4">
                                                <span class="font-size-15 ">

                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            <span class="card-text font-size-15 text-secondary"> - Dined on November
                                                    10,2021</span>

                                            <p class="card-text font-size-13 pt-4">I came here for brunch and it was
                                                simply delicious! First off, the staff was so friendly and prompt.
                                                The coffee was fresh, the mimosas were strong and the food was
                                                awesome.It was a small brunch menu.</p>
                                            <p class="text-right font-size-15 text-danger"><i class="far fa-flag  pr-2"></i>
                                                Report</p>
                                        </div>

                                    </div>

                                    <hr>

                                    <div class="row">
                                        <div class="col-md-3 ml-3 p-0">
                                            <img src="./img/men.jpg" class="card-img-top" alt="">
                                            <div class="inform bg-light text-center ">
                                                <p class="card-text font-size-13 font-weight-bold mb-0 ">Tanjir</p>
                                                <p class="card-text font-size-10 text-danger">Ashrafpur,Chandpur</p>
                                            </div>
                                        </div>
                                        <div class="col-md-8 pl-4">
                                                <span class="font-size-15 ">

                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                    <svg height="20px" xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                                        </path>
                                                    </svg>
                                                </span>
                                            <span class="card-text font-size-15 text-secondary"> - Dined on November
                                                    10,2021</span>

                                            <p class="card-text font-size-13 pt-4">I came here for brunch and it was
                                                simply delicious! First off, the staff was so friendly and prompt.
                                                The coffee was fresh, the mimosas were strong and the food was
                                                awesome.It was a small brunch menu.</p>
                                            <p class="text-right font-size-15 text-danger"><i class="far fa-flag  pr-2"></i>
                                                Report</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Reviews end-->
                        <div class="tab-pane fade" id="food">
                            <div class="row">
{{--                                @if($foodphotos)--}}
                                @if (!File::exists($foodphotos))
                                        <div class="col-md-12">
                                            <div class="card-columns pt-3">
                                                @foreach($foodphotos as $food )
                                                <div class="card">
                                                    <img src="{{asset($food->image)}}"  height="147px !important" style="width: 160px !important;" data-toggle="modal"
                                                         data-target="#modalStickHand" class="card-img-top ml-2" alt="">
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                @else
                                    <div class="card ml-3">
                                        <img src="{{asset('/')}}FoodDude/image/noFood.png"  height="147px " style="width: 160px !important;"
                                             class="card-img-top " alt="">
                                    </div>
                                @endif
                            </div>
                        </div>


                        <div class="tab-pane fade" id="interior">
                            @if (!File::exists($foodphotos))
                            @foreach($interiorPhotos as $photo)
                            <div class="col-md-12">
                                <div class="card-columns pt-3">
                                    <div class="card">
                                        <img src="{{asset($photo->images)}}"  height="147px !important" style="width: 100% !important;"
                                             class="card-img-top ml-2" alt="">
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                                <div class="card ml-3">
                                    <img src="{{asset('/')}}FoodDude/image/noFood.png"  height="147px " style="width: 160px !important;"
                                         class="card-img-top " alt="">
                                </div>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="exterior">

                                <div class="col-md-12" style="margin: 0 !important; padding: 0 !important;">

                                    <div class="card-columns pt-3" style="margin: 0 !important; padding: 0 !important;">
                                        @if (!File::exists($foodphotos))
                                        @foreach($exteriorPhotos as $photo)
                                        <div class="card d-flex" style="width: 161px !important;">
                                            <img src="{{asset($photo->images)}}"  height="147px !important" style="width:160px !important;"
                                                 class="card-img-top" alt="">
                                        </div>
                                        @endforeach
                                        @else
                                            <div class="card ml-3">
                                                <img src="{{asset('/')}}FoodDude/image/noFood.png"  height="147px " style="width: 160px !important;"
                                                     class="card-img-top " alt="">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                          </div>
                    </div>
                </div>
            </div>

            <!--Right bar restaurant-->

            <div class="col-md-4 bg-light ml-8 h-100">
                <div class="row">
                    <div class="">
                        <div class="card w-100 bg-light">
                            <div class="card-header card-color">
                                <h5 class="text-light ">Make a Reservation</h5>

                            </div>
                            <div class="card-body">
                                <p class="card-title">Party Size</p>

                                <select class="form-control border-0 col-25" style="padding:0">
                                    <option value="GuestOne">Guest 1</option>
                                    <option value="GuestTwo">Guests 2</option>
                                    <option value="GuestThree">Guests 3</option>
                                    <option value="GuestFour">Guests 4</option>
                                    <option value="GuestFive">Guests 5</option>
                                </select>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="card-title"> Date</h5>
                                        <input type="date" class="form-control bg-light text-dark col-25">
                                    </div>
                                    <div class="col-md-5 ml-1">
                                        <h5 class="card-title">Time</h5>

                                        <select class="form-control col-25">
                                            <option value="12:00PM">12:00 PM</option>
                                            <option value="12:00PM">12:30 PM</option>
                                            <option value="12:00PM">1:00 PM</option>
                                            <option value="12:00PM">1:30 PM</option>
                                            <option value="12:00PM">2:00 PM</option>
                                            <option value="12:00PM">2:30 PM</option>
                                            <option value="12:00PM">3:00 PM</option>
                                            <option value="12:00PM">3:30 PM</option>
                                            <option value="12:00PM">4:00 PM</option>
                                            <option value="12:00PM">4:30 PM</option>
                                            <option value="12:00PM">5:00 PM</option>
                                            <option value="12:00PM">5:30 PM</option>
                                            <option value="12:00PM">6:00 PM</option>
                                            <option value="12:00PM">6:30 PM</option>
                                            <option value="12:00PM">7:00 PM</option>
                                            <option value="12:00PM">7:30 PM</option>
                                            <option value="12:00PM">8:00 PM</option>
                                            <option value="12:00PM">8:30 PM</option>
                                            <option value="12:00PM">9:00 PM</option>
                                            <option value="12:00PM">9:30 PM</option>
                                            <option value="12:00PM">10:00 PM</option>
                                            <option value="12:00PM">10:30 PM</option>
                                            <option value="12:00PM">11:00 PM</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-danger w-100"> Find a Time</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card  padding-0 mt-2">
                            <div class="padding-0 w-100">
                                <p>{!! $restaurant->map_link !!}</p>

                                <p class="card-text pt-2 pl-2 pb-1"> <i class="fas fa-map-marker-alt fa-2x"></i><a
                                        href="https://goo.gl/maps/vvAyhdpU2HhGW8zf7" class="text-dark pl-2 font-size-15">{!! $restaurant->map_address !!} </a>
                            </div>
                        </div>


                        <div class="hotel-information nunito font-size-13">
                            <h6 class="font-weight-bold pt-4"><i class="fas fa-hotel pr-2 "></i>Neighborhood</h6>
                            <p>{{$restaurant->neighborhood}}</p>

                           <h6 class="font-weight-bold pt-2"><i class="fas fa-clock pr-2"></i>Hours of operation
                            </h6>
                            <p class="mh-100">
                                {!! $restaurant->hours_of_operation !!}
                            </p>
                            <h6 class="font-weight-bold pt-2"><i class="fas fa-parking pr-2"></i>Parking details
                            </h6>
                            <p>{{$restaurant->parking_details}}</p>

                            <h6 class="font-weight-bold pt-2"><i class="far fa-credit-card pr-2"></i>Payment option
                            </h6>
                            <p>{{$restaurant->payment_option}}</p>

                            <h6 class="font-weight-bold pt-2"><i class="far fa-credit-card pr-2"></i>Payment option
                            </h6>
                            <p>{{$restaurant->payment_system}}</p>

                            <h6 class="font-weight-bold pt-2"><i class="fas fa-tag pr-2"></i>Additional</h6>

                            <p>{{$restaurant->additional}}</p>
                            <div class="accordion" id="accordionId">
                                <button type="button" data-toggle="collapse" data-target="#moreinfoRest"
                                        class="text-danger border-0 bg-transparent"> View More</button>

                                <div class="collapse" id="moreinfoRest" data-parent="#accordionId">

                                    <h6 class="font-weight-bold pt-2"><i class="fas fa-external-link-alt pr-2"></i>
                                        Website</h6>
                                    <p><a href="{{$restaurant->website}}"
                                          class="text-danger">{{$restaurant->website}}</a></p>

                                    <h6 class="font-weight-bold pt-2"><i class="fas fa-phone-alt pr-2"></i>Phone
                                        number</h6>
                                    <p>{{$restaurant->mobile}}</p>



                                    <h6 class="font-weight-bold pt-2"><i class="fas fa-seedling pr-2"></i>Catering
                                    </h6>
                                    <p class="text-justify">{{$restaurant->catering}}</p>

                                    <button type="button" data-toggle="collapse" data-target="#hideifoRest"
                                            class="text-danger bg-transparent border-0">- Show less</button>

                                    <div class="collapse" id="hideifoRest" data-parent="#accordionId">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--Modal  of restaurant  photos -->

<div class="modal fade" id="myModal1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <img src="./img/3.jpg" class="card-img-top" alt="">
        </div>
    </div>
</div>
<div class="modal fade" id="myModal2">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <img src="./img/2.jpg" class="card-img-top" alt="">
        </div>
    </div>
</div>
<div class="modal fade" id="myModal3">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <img src="./img/1.jpg" class="card-img-top" alt="">
        </div>
    </div>
</div>
<!--Modal -->
<div class="modal fade" id="modalStickHand">
    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="text-light ml-auto">Pain De Campange</h4>
                <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
            </div>
            <img src="./img/food/steak.JPG" class="card-img-top" alt="">
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="card-title font-weight-bold">Sticky Hand</h6>
                        <div class="card-text">
                            <p><i class="fas fa-cookie pr-3"></i>Water</p>
                            <p><i class="fas fa-cookie pr-3"></i>Dry yeast</p>
                            <p><i class="fas fa-cookie pr-3"></i>Wheat flour</p>
                            <p><i class="fas fa-cookie pr-3"></i>Rye flour</p>
                            <p><i class="fas fa-cookie pr-3"></i>bread flour</p>
                            <p><i class="fas fa-cookie pr-3"></i>salt</p>
                            <p><i class="fas fa-cookie pr-3"></i>honey</p>
                            <p><i class="fas fa-cookie pr-3"></i>Cornmeal or semolina for baking</p>
                        </div>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <button type="button" class="btn btn-secondary">Price : 340 BDT</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">840KCL</button>
            </div>

        </div>

    </div>
</div>
<div class="modal fade" id="modalRustic">
    <div class="modal-dialog modal-lg modal-dialog-centered">

        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h4 class="text-light ml-auto">Pain De Campange</h4>
                <button type="button" class="close btn btn-danger" data-dismiss="modal">&times;</button>
            </div>
            <img src="./img/food/pain-de-campagne.webp" class="card-img-top" alt="">
            <div class="card card-body bg-light">
                <div class="row">
                    <div class="col-md-8">
                        <h6 class="card-title font-weight-bold">Rustic die campange</h6>
                        <div class="card-text">
                            <p><i class="fas fa-cookie pr-3"></i>Water</p>
                            <p><i class="fas fa-cookie pr-3"></i>Dry yeast</p>
                            <p><i class="fas fa-cookie pr-3"></i>Wheat flour</p>
                            <p><i class="fas fa-cookie pr-3"></i>Rye flour</p>
                            <p><i class="fas fa-cookie pr-3"></i>bread flour</p>
                            <p><i class="fas fa-cookie pr-3"></i>salt</p>
                            <p><i class="fas fa-cookie pr-3"></i>honey</p>
                            <p><i class="fas fa-cookie pr-3"></i>Cornmeal or semolina for baking</p>
                        </div>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <button type="button" class="btn btn-secondary">Price : 340 BDT</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">840KCL</button>
            </div>

        </div>

    </div>
</div>


@endsection
