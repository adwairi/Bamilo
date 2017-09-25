@extends('layouts.admin')

@section('content')
    <div class="px-content">
        {{--<div class="page-header">--}}
        {{--<h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Tables / </span>DataTables</h1>--}}
        {{--</div>--}}

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title pull-left">Cart</div>
            </div>
            <div class="panel-body">

                <div class="table-info">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody id="cart-body">
                        </tbody>
                    </table>
                </div>
            </div>
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
        
        $(function () {
            storage = window.localStorage;
            var cart_products = JSON.parse(storage.getItem("cart_products"));
            if(cart_products == null)
                cart_products = [];
            var products = {'products':cart_products};
            $.ajax({
                url: "/cart",
                type: 'POST',
                data: products,
                datatype: 'json',
            }).done(function(data) {
                if(data.status == false){
                    $('#cart-body').empty();
                    var html = '';
                        html += '<tr>';
                        html += '<td colspan="3">'+data.message+'</td>';
                        html += '</tr>';
                    $('#cart-body').append(html);
                }else{
                    $('#cart-body').empty();
                    var html = '';
                    $.each(data.items, function (index, element) {
                        html += '<tr>';
                        html += '<td>'+element.title+'</td>';
                        html += '<td>'+element.quantity+'</td>';
                        html += '<td><button type="button" class="btn btn-success btn-sm">Checkout</button></td>';
                        html += '</tr>';
                    });
                    $('#cart-body').append(html);
                    storage.clear();
                }
            }).fail(function (data) {
            });
        })

    </script>

@endsection