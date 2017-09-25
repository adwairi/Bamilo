@extends('layouts.admin')

@section('content')

    @include('main.filters')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-erlenmeyer-flask"></i>Shop / </span>Home</h1>
        </div>

    </div>
@endsection
@section('scripts')




    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on("click", ".filteration", function (e) {
            $('.px-content').empty();
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
                }else{
                    alert('noooooooooo');
                    // window.location.reload();
                }
            });
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
                    attributes(data.params.attributes);
                }else{
                    alert('noooooooooo');
    //                window.location.reload();
                }
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
            var html = '';
            $.each(categories, function (index, element) {
                html += '<div class="p-l-3 checkbox m-t-0">';
                html += '<label>';
                html += '<input class="filteration" type="checkbox" name="categories[]" value="'+ element.id +'">' + element.title;
                html += '</label>';
                html += '</div>';
            });
            $('#categories').append(html);
        }

        function attributes(attributes) {
            var html = '';
            $.each(attributes, function (index, element) {
                html += '<div class="p-l-3 checkbox m-t-0">';
                html += '<label>';
                html += '<input class="filteration" type="checkbox" name="attributes[]" value="'+ element.id +'">' + element.title;
                html += '</label>';
                html += '</div>';
            });
            $('#attributes').append(html);
        }

        function  pagination(row_id, length) {
            length = length/20;
            if (length > 1){
            var html = '<div class="col-xs-12">';
                html += '<nav>';
                html += '<ul class="pagination pagination-sm m-a-0">';

                for(var i=0; i < length; i++){
                    html += '<li><a href="#">'+ (i+1) +'</a></li>';
                }
                html += '</ul></nav></div>';
            $('#row-'+row_id).append(html);
            }
        }

        $(document).on('click', '#buy', function (e) {
            var product_id = $(this).attr('data-product-id');
            var storage = window.localStorage;

                // Parse any JSON previously stored in allEntries
            var existingEntries = JSON.parse(storage.getItem("cart_products"));
            if(existingEntries == null)
                existingEntries = [];

            var entry = {
                "product_id": product_id
            };
//            storage.setItem("product", JSON.stringify(entry));
            existingEntries.push(entry);
            $("#cart-items").html(existingEntries.length);
            storage.setItem("cart_products", JSON.stringify(existingEntries));

        });
//
        pxInit.push(function() {
            $('#px-demo-sidebar').pxSidebar();
            pxDemo.initializeDemo();
        });


    </script>
@endsection