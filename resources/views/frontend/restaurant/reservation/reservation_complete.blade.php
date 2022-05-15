@extends('frontend.master')
@section('style')
    <style>
        header {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            margin: 0.5rem 1.5rem;
            background-color: #222831;
            margin-left: -2px;
            height: 50px;
        }

        a,
        button {
            color: white;
        }

        .image-clickable {
            margin-right: auto;
        }

        .logo {
            height: 4.8rem;

        }

        .nav-links {
            list-style: none;
        }

        .nav-links li {
            display: inline-block;
            padding: 0 1.25rem;
        }

        .nav-links li a {
            text-decoration: none;
            font-family: "Montserrat", sans-serif;
            font-size: 1.3rem;
            transition: all 0.5s ease 0s;
        }

        .nav-links li a:hover {
            color: rgba(0, 173, 181, 0.8);
        }

        button {
            background: #04bd70;
            cursor: pointer;
            padding: 9px 20px;
            border: none;
            border-radius: 50px;
            font-family: "Montserrat", sans-serif;
            font-size: 1rem;
            transition: all 0.5s ease 0s;
            margin-left: 20px;
        }

        button:hover {
            background: rgba(0, 173, 181, 0.8);
        }

        .image {

            height: 100px;
            width: 100px;
            margin: 0;
            padding: 0;
        }

        .image img {
            height: 100px;
            width: 100px;

        }

        .desc {
            background-color: rgb(255, 247, 247);
            height: 100px;


        }

        .flexing {
            display: flex;

            height: 100px;
            background-color: rgb(255, 247, 247);


        }
        .flexing h3{
            width: 100px;
        }

        .schedule {
            display: flex;
            gap: 25px;
            margin-left: -65px;
            margin-top: 40px;

        }
        input{
            padding: 10px;
            width: 323px;
            border-radius: 5px;
            border: 1px solid #888;
            margin-top: 10px;
        }
        select{
            border: 1px solid #888;
            padding: 11.3px;
            width: 100px;
            border-radius: 5px;
        }
        #phone{
            width: 225px;
            margin-left: -5px;
        }
        #textarea{
            margin-top: 10px;
            padding: 10px;
            width: 323px;
            border-radius: 5px;
            border: 1px solid #888;
        }
        #d-details{
            margin-top: 10px;
        }
        #b-utton{
            width: 652.5px;
            margin: 0;
            border-radius: 5px;
            margin-top: 10px;
        }
        #terms{
            margin-top: 10px;
        }
        .right-part{
            width: 450px;
        }
        #name-rest{
            padding-left: 5px;;
        }
    </style>
@endsection


@section('body')
    <div class="hero-area col-md-10 col-md-offset-1">
        <div class="container">
            <div class="row">
                <div class="col-md-7 left-part">
                    <h5><b>You're almost done!</b></h5>
                    <div class="flexing">
                        <a href="" class="image"><img src="{{asset($table->image)}}" alt=""></a>
                        <h6 id="name-rest"><b>You booked at {{$table->name}}</b></h6>
                        <div class="schedule " style="margin-left: -200px !important;">
                            <h5><i class="fa fa-calendar" aria-hidden="true"></i> {{$table->date->date}}</h5>
                            <h5><i class="fa fa-bars" aria-hidden="true"></i>{{$table->hour->hour}}</h5>
{{--                            <h5><i class="fa fa-user" aria-hidden="true"></i> 2 People</h5>--}}
                        </div>
                    </div>
                    <h4 id="d-details">Diner details</h4>
                    <form action="">
                        <input type="text" placeholder="First name" style="width: 50%">
                        <input type="text" placeholder="Last name"  style="width: 40%"><br>

                        <input id="phone" type="text" placeholder="Phone number"  style="width: 40%">
                        <input type="text" placeholder="E-mail"  style="width: 50%"> <br>
                        <textarea id="textarea" placeholder="Add a special request(optional)" cols="25" rows="1"></textarea>
                        <button id="b-utton" type="submit">Complete reservation</button>

                    </form>
                </div>
                <div class="col-md-5 right-part">
                    <h4><b>What to know before you go</b></h4>
                    <h4>Important dining information</h4>
                    <p>We have a 15 minute grace period. Please call us if you are running later than 15 minutes after your reservation time.</p>
                    <p>We may contact you about this reservation, so please ensure your email and phone number are up to date.</p>
                    <p>Your table will be reserved for 2 hours.</p>
                    <h4><b>A note from the restaurant</b></h4>
                    <p>We are looking forward to having you in for our 7-course tasting menu! At the moment, we are not accommodating any dietary restrictions. We are a very small team at the moment and once we are streamlined we will be accepting dietary restrictions! Please bear with us! Thank you and cannot wait to have you in!</p>
                </div>

            </div>
        </div>
    </div>
@endsection
