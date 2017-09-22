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
        {{--<div class="row">--}}
            {{--<div class="clearfix">--}}
                {{--<div class="widget-products-item col-xs-12 col-sm-6 col-md-4 col-xl-3">--}}
                    {{--<a href="#" class="widget-products-image">--}}
                        {{--<img class="image-url" src="">--}}
                        {{--<span class="widget-products-overlay"></span>--}}
                    {{--</a>--}}
                    {{--<a href="#" class="widget-products-title">--}}
                        {{--hhh, jjjjjj--}}
                        {{--<span class="widget-products-price pull-xs-right label label-tag label-success product-price">$20000</span>--}}
                    {{--</a>--}}
                    {{--<div class="widget-products-footer text-muted">--}}
                        {{--<button type="button" id="buy" data-product-id="" >--}}
                            {{--<i class="fa fa-shopping-cart"></i> Buy--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-xs-12">--}}
                {{--<nav>--}}
                    {{--<ul class="pagination pagination-sm m-a-0">--}}
                        {{--<li class="disabled"><a href="#">«</a></li>--}}
                        {{--<li class="active"><a href="#">1</a></li>--}}
                        {{--<li><a href="#">2</a></li>--}}
                        {{--<li><a href="#">3</a></li>--}}
                        {{--<li><a href="#">4</a></li>--}}
                        {{--<li><a href="#">5</a></li>--}}
                        {{--<li><a href="#">»</a></li>--}}
                    {{--</ul>--}}
                {{--</nav>--}}
            {{--</div>--}}
        {{--</div>--}}

                    <!-- / Products -->

    </div>
@endsection
@section('scripts')




    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            var url = $("#filter").attr('action'),
            data = $("#filter").serializeArray();
            $.ajax({
                url: url,
                type: 'GET',
                data: data,
                datatype: 'json',
            }).done(function(data) {
                if(data.status == true){
                    products(data.params.products);
                    categories(data.params.categories);
                    attributes(data.params.headers);
                }else{
                    alert('noooooooooo');
    //                window.location.reload();
                }
            }).fail(function (data) {
            });
        });


        function products(products) {
            var id=99999999;
            $.each(products, function (index, element) {
                if(index%4==0){
                    id = index;
                    var row = '<div class="row" id="row-'+id+'">';
                        row += '<div class="clearfix" id="clearfix-'+id+'"></div>';
                        row += '</div>';
                    $('.px-content').append(row);
                }
                var imgUrl = element.imgUrl,
                html = '';
                console.log(id);
                if(imgUrl == null){
                    imgUrl = '{{ asset("system_images/no_photo.png") }}';
                }

                html += '<div class="widget-products-item col-xs-12 col-sm-6 col-md-4 col-xl-3">';
                html += '<a href="#" class="widget-products-image">';
                html += '<img class="image-url" src="'+ imgUrl +'">';
                html += '<span class="widget-products-overlay"></span>';
                html += '</a>';
                html += '<a href="#" class="widget-products-title">';
                html += element.title +', '+ element.product_model;
                html += '<span class="widget-products-price pull-xs-right label label-tag label-success">$' + element.price + '</span>';
                html += '</a>';
                html += '<div class="widget-products-footer text-muted">';
                html += '<button type="button" id="buy" data-product-id="'+element.id+'" >';
                html += '<i class="fa fa-shopping-cart"></i> Buy';
                html += '</button>';
                html += '</div>';
                html += '</div>';
                $('#clearfix-'+id).append(html);
            });
            pagination(id, products.length);
        }

        function categories(categories) {
//            $.each(categories, function (index, element) {
//                console.log(index + " -> " + element);
//            })
        }
        function attributes(attributes) {
//            $.each(attributes, function (index, element) {
//                console.log(index + " -> " + element);
//            })
        }

        function  pagination(row_id, length) {
            console.log(row_id);
            console.log(length);
            var html = '<div class="col-xs-12">';
                html += '<nav>';
                html =+ '<ul class="pagination pagination-sm m-a-0">';

                for(var i=0; i < length; i++){
                    html += '<li><a href="#">'+ i+1 +'</a></li>';
                }
                html += '</ul></nav></div>';
            $('#row-'+row_id).append(html);
        }

//        pxDemo.initializeDemoSidebar();
//
        pxInit.push(function() {
            $('#px-demo-sidebar').pxSidebar();
            pxDemo.initializeDemo();
        });


    </script>
@endsection