@include('layouts.main')


<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        {{--<div class="flex-center position-ref full-height">--}}

            <div class="content">
                <div id="page-content-wrapper">
                    <div class="container">
                        <div class="row">
                            <h1>
                                Dynamically blurring avatar images using Canvas.
                            </h1>
                        </div>
                        @foreach($products as $product)
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="card">
                                    <canvas class="header-bg" width="250" height="70" id="header-blur"></canvas>
                                    <div class="avatar">
                                        <img src="{{ $product->imgUrl }}" alt="" />
                                    </div>
                                    <div class="content">
                                        <p>{{ $product->title }}, {{ $product->product_model }}<br>
                                            {{ $product->price }}</p>
                                        <p><button class="buy" data-product-id="{{ $product->id }}" type="button" class="btn btn-default">Buy</button></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        {{--</div>--}}
    </body>
</html>
