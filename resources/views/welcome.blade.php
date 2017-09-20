@extends('layouts.admin')

@section('content')

    @include('main.filters')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-erlenmeyer-flask"></i>Widgets / </span>Misc</h1>
        </div>
        <!-- Profile widget -->
        @foreach($products as $key=>$product)
            @if($key%2==0)<div class="row">@endif
                <div class="col-md-4">
                    <!-- Centered -->
                    <div class="panel panel-default panel-dark panel-body-colorful widget-profile-centered">
                        <div class="panel-heading">
                            <img src="{{ asset('assets/pixel/dist/demo/avatars/1.jpg') }}" alt="" class="widget-profile-avatar">
                            <h3 class="widget-profile-header">
                                <p>{{ $product->title }}, {{ $product->product_model }}<br>
                                {{ $product->price }}
                            </h3>
                        </div>
                        <div class="panel-body panel-body-colorful panel-primary">
                            <p><button data-product-id="{{ $product->id }}" type="button" class="btn btn-warning btn-lg  buy">Buy</button></p>
                        </div>
                    </div>

                </div>
            @if($key%2==0)<div>@endif
        @endforeach

        <!-- / Profile widget -->

    </div>
@endsection
@section('scripts')
    <script>
        pxDemo.initializeDemoSidebar();

        pxInit.push(function() {
            $('#px-demo-sidebar').pxSidebar();
            pxDemo.initializeDemo();
        });
    </script>

    <!-- Get jQuery from Google CDN -->
    <!--[if !IE]> -->
    <script type="text/javascript"> window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">'+"<"+"/script>"); </script>
    <!-- <![endif]-->
    <!--[if lte IE 9]>
    <script type="text/javascript"> window.jQuery || document.write('<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js">'+"<"+"/script>"); </script>
    <![endif]-->

    <script src="../../dist/js/bootstrap.js"></script>
    <script src="../../dist/js/pixeladmin.js"></script>

    <script type="text/javascript">
        pxInit.unshift(function() {
            var file = String(document.location).split('/').pop();

            // Remove unnecessary file parts
            file = file.replace(/(\.html).*/i, '$1');

            if (!/.html$/i.test(file)) {
                file = 'index.html';
            }

            // Activate current nav item
            $('#px-demo-nav')
                .find('.px-nav-item > a[href="' + file + '"]')
                .parent()
                .addClass('active');

            $('#px-demo-nav').pxNav();
            $('#px-demo-footer').pxFooter();
        });

        for (var i = 0, len = pxInit.length; i < len; i++) {
            pxInit[i].call(null);
        }
    </script>
@endsection