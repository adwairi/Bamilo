@extends('layouts.admin')

@section('content')

    @include('main.filters')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-erlenmeyer-flask"></i>Shop / </span>Home</h1>
        </div>
        <!-- Profile widget -->
        {{--@foreach($products as $key=>$product)--}}
            {{--@if($key%2==0)<div class="row">@endif--}}
                {{--<div class="col-md-4">--}}
                    {{--<!-- Centered -->--}}
                    {{--<div class="panel panel-default panel-dark panel-body-colorful widget-profile-centered">--}}
                        {{--<div class="panel-heading">--}}
                            {{--<img src="{{ $product->imgUrl }}" alt="" class="widget-profile-avatar">--}}
                            {{--<h3 class="widget-profile-header">--}}
                                {{--<p>{{ $product->title }}, {{ $product->product_model }}<br>--}}
                                {{--{{ $product->price }}--}}
                            {{--</h3>--}}
                        {{--</div>--}}
                        {{--<div class="panel-body panel-body-colorful panel-primary">--}}
                            {{--<p><button data-product-id="{{ $product->id }}" type="button" class="btn btn-warning btn-lg  buy">Buy</button></p>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--@if($key%2==0)<div>@endif--}}
        {{--@endforeach--}}

        <!-- / Profile widget -->

                    <!-- Products -->
        <div class="row">
            <div class="clearfix">
                <div class="widget-products-item col-xs-12 col-sm-6 col-md-4 col-xl-3">
                    <a href="#" class="widget-products-image">
                        <img class="image-url" src="">
                        <span class="widget-products-overlay"></span>
                    </a>
                    <a href="#" class="widget-products-title">
                        <span class="product-title"></span>hhh, jjjjjj<span class="product-model"></span>
                        <span class="widget-products-price pull-xs-right label label-tag label-success product-price">$20000</span>
                    </a>
                    <div class="widget-products-footer text-muted">
                        <button type="button" id="buy" data-product-id="" >
                            <i class="fa fa-shopping-cart"></i> Buy
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <nav>
                    <ul class="pagination pagination-sm m-a-0">
                        <li class="disabled"><a href="#">«</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </nav>
            </div>
        </div>

                    <!-- / Products -->

    </div>
@endsection
@section('scripts')




    <script>
        pxDemo.initializeDemoSidebar();

        pxInit.push(function() {
            $('#px-demo-sidebar').pxSidebar();
            pxDemo.initializeDemo();
        });

@endsection