@extends('frontend.master')

@section('body')

    <div class="error-content text-center"style="background-image: url('{{asset('/')}}FoodDude/image/food-bg.webp'); height:550px">
        <div class="container">
            <h1 class="error-title pt-3 text-danger">Error 404</h1>
            <p class=" pt-3 text-black-50" style="font-size: 24px"><strong>We are sorry, the page you've requested is not available.</strong></p>


            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="stylesheet" href="{{asset('/')}}FoodDude/frontend/errors/style.css">
                <script src="{{asset('/')}}FoodDude/frontend/errors/script.js" defer ></script>
            </head>
            <body class="">
            <div class="board" id="board">
                <div class="cell" data-cell></div>
                <div class="cell" data-cell></div>
                <div class="cell" data-cell></div>
                <div class="cell" data-cell></div>
                <div class="cell" data-cell></div>
                <div class="cell" data-cell></div>
                <div class="cell" data-cell></div>
                <div class="cell" data-cell></div>
                <div class="cell" data-cell></div>
            </div>
            <div class="winning-message" id="winningMessage">
                <div data-winning-message-text></div>
                <button id="restartButton">Restart</button>
            </div>
            </body>
            </html>


            <a href="" class="btn btn-outline-default pt-3 btn-minwidth-lg">
                <span>BACK TO HOMEPAGE</span>
                <i class="icon-long-arrow-right"></i>
            </a>
        </div>
    </div>


@endsection
