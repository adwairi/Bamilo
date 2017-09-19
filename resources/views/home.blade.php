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
            @foreach($products as $product)
                {{ csrf_field() }}
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

<div id="px-demo-sidebar" class="px-sidebar-right open" style="width: 241px; right: -241px; top: 50px;">
    <div id="px-demo-sidebar-loader" class="form-loading form-loading-inverted"></div>
    <div class="px-sidebar-content ps-container ps-theme-default ps-active-y"
         data-ps-id="1e1a8193-e6ce-3e4a-6ede-9b8721a32a2a">
        <form id="filter" method="POST" action="{{route('home')}}">
            <div id="px-demo-togglers">
                <h6 class="px-demo-sidebar-header b-y-1 darker">Categories</h6>
                <div>
                    <div class="box m-a-0 border-radius-0 bg-transparent">
                        @foreach($categories as $category)
                                <div class="p-l-3 checkbox m-t-0">
                                    <label>
                                        <input class="filteration" type="checkbox" name="categories[]" value="{{ $category->id }}"> {{ $category->title }}
                                    </label>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div id="px-demo-togglers">
                <h6 class="px-demo-sidebar-header b-y-1 darker">Attributes</h6>
                <div>
                    <div class="box m-a-0 border-radius-0 bg-transparent">
                        @foreach($attributes as $attribute)
                            <div class="p-l-3 checkbox m-t-0">
                                <label>
                                    <input type="checkbox" class="filteration" name="attributes[]" value="{{ $attribute->id }}"> {{ $attribute->title }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<script>
    // -------------------------------------------------------------------------
    // Initialize DEMO sidebar

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {
        pxDemo.initializeDemoSidebar();

        $('#px-demo-sidebar').pxSidebar();
        pxDemo.initializeDemo();
    });


    $(document).on("click", ".filteration", function (e) {
//        $(this).attr("checked", "checked")
        var data = $("#filter").serializeArray(),
            url = $("#filter").attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            datatype: 'json',
        }).done(function(data) {
            console.log(data);
//            if(data.status == false){
//                validation_messages(data);
//            }else{
//                window.location.reload();
//            }
        }).fail(function (data) {
        });
//        e.preventDefault();
    });


</script>
</body>
</html>
