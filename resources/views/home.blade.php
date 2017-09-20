@e('layouts.main')


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
                                {{--<img src="{{ $product->imgUrl }}" alt="" />--}}
                                <img src="data:image/jpeg;base64,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" alt="" />
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
