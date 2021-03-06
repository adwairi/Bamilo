@extends('layouts.admin')

@section('content')
            <div class="px-content">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title pull-left">Products</div>
                        <div class="panel-heading-controls pull-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                                <span class="btn-label-icon left"><i class="fa fa-plus"></i></span>Add Product
                            </button>
                        </div>
                    </div>
                    <div class="panel-body">

                        <div class="table-info">
                            <table class="table table-striped table-bordered" id="datatables">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Model</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                    <th>Description</th>
                                    <th>Related</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key=>$product)
                                        <tr class="product">
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->product_model}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->desc}}</td>
                                            <td>
                                                <button type="button" data-type="" data-message="" id="delete_product_button" class="btn btn-danger btn-sm" data-product-id="{{$product->id}}">
                                                    <span class="btn-label-icon left"><i class="fa fa-trash"></i></span>Delete
                                                </button>
                                                <button type="button" class="attributes btn btn-success btn-sm" data-product-id="{{$product->id}}" data-toggle="modal" data-target="#modal-attr">
                                                    <span class="btn-label-icon left"><i class="fa fa-plus"></i></span>Add Attributes
                                                </button>
                                                <button type="button" class="images btn btn-info btn-sm" id="image-view-button" data-toggle="modal" data-target="#modal-image-view" data-product-id="{{$product->id}}">
                                                    Image
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="modal fade" id="modal-default" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title" id="myModalLabel">Add Product</h4>
                        </div>
                        <div class="modal-body">
                            <form action="/product" id="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="title" class="col-md-3 control-label">Title <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="title">
                                       <font color="red" class="validation" id="title_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="model" class="col-md-3 control-label">Model <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="model" id="model" placeholder="model">
                                       <font color="red" class="validation" id="model_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-md-3 control-label">Price <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="price" id="price" placeholder="price">
                                       <font color="red" class="validation" id="price_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-md-3 control-label">Status <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="status" name="status">
                                            <option>select status</option>
                                            @foreach(\App\Entity\Product::getStatus() as $key=>$status)
                                                <option value="{{$key}}">{{$status}}</option>
                                            @endforeach
                                        </select>
                                       <font color="red" class="validation" id="status_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="category" class="col-md-3 control-label">Category <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="category" name="category" >
                                        <option>select category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category['id']}}">{{$category['title']}}</option>
                                            @endforeach
                                        </select>
                                       <font color="red" class="validation" id="category_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quantity" class="col-md-3 control-label">Quantity <span class="text-danger">*</span></label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity">
                                       <font color="red" class="validation" id="quantity_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="desc" class="col-md-3 control-label">Description</label>
                                    <div class="col-md-9">
                                        <textarea id="desc" class="form-control" name="desc"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image" class="col-md-3 control-label">image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control-file" id="image">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                            <button type="button" id="save_product" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="modal-attr" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title" id="myModalLabel">Add Attributes</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/productAttributes" id="form_attr" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="form-group">
                                            <label for="attributes" class="col-md-3 control-label">Attributes <span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="attributes" name="attributes[]" multiple>
                                                    <option></option>
                                                    @foreach($attributes as $attribute)
                                                        <option value="{{$attribute['id']}}">{{$attribute['title']}}</option>
                                                    @endforeach
                                                </select>
                                                <font color="red" class="validation" id="attributes_validation" ></font>
                                            </div>
                                        </div>
                                        <input type="hidden" name="product_id" class="product_id" value="">
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <form id="selected-attr" action="/productAttributes" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field("DELETE") }}
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        <button type="button" class="btn btn-danger btn-sm" id="delete-attr">
                                                            <span class="btn-label-icon left"><i class="fa fa-trash"></i></span>Delete
                                                        </button>
                                                    </th>
                                                    <th>Already Added Attributes</th>
                                                </tr>
                                            </thead>
                                            <tbody id="attr-body">
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="product_id" class="product_id" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                            <button type="button" id="save_attributes" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="modal-image-view" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title" id="myModalLabel">Product Image</h4>
                        </div>
                        <div class="modal-body">
                            <div>
                                <img id="product-image" src="" alt="" class="" style="max-width: 100%;">
                                <hr class="m-y-0">
                                    {{--<button type="button" class="btn btn-primary">Change</button>&nbsp;--}}
                                    {{--<button type="button" class="btn"><i class="fa fa-trash"></i></button>--}}
                                <div class="m-t-2 text-muted font-size-12" id="image-view-msg"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
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



    //productValidation
    $(document).on("click", "#save_product", function (e) {
        var data = $("#form").serializeArray(),
            url = $("#form").attr('action');
        $.ajax({
            url: '{{ route('productValidation') }}',
            type: 'POST',
            data: data,
            datatype: 'json',
        }).done(function(data) {
            if(data.status == false){
                validation_messages(data);
            }else{
                $("#form").submit();
            }
        }).fail(function (data) {
        });
        e.preventDefault();
    });


    $('.attributes').click(function () {
        var product_id = $(this).attr('data-product-id'),
            url = $("#form_attr").attr('action');

        $('.product_id').val(product_id);

        $.ajax({
            url: url+'/'+product_id,
            type: 'GET',
            datatype: 'json',
        }).done(function(data) {
            if(data.status == true){
                $('#attr-body').empty();
                var html = '';
                $.each(data.data, function (index, element) {
                    html += '<tr>';
                    html += '<td><input type="checkbox" name="delete_attr[]" value="'+element.id+'" id="'+element.id+'" /></td>';
                    html += '<td>'+element.attribute.title+'</td>';
                    html += '</tr>';
                });
                $('#attr-body').append(html);
            }else{
                    $('#attr-body').empty();
                    var html = '';
                    html += '<tr>';
                    html += '<td colspan="2">'+data.message+'</td>';
                    html += '</tr>';
                    $('#attr-body').append(html);
            }
        })

    });



    $(document).on("click", "#save_attributes", function (e) {
        var data = $("#form_attr").serializeArray(),
            url = $("#form_attr").attr('action');
        $.ajax({
            url: url,
            type: 'POST',
            data: data,
            datatype: 'json',
        }).done(function(data) {

            if(data.status == false){
                validation_messages(data);
            }else{
                window.location.reload();
            }
        }).fail(function (data) {
        });
        e.preventDefault();
    });

    function validation_messages(data) {
        $('.validation').html('');
        $.each(data.message, function (index, data2) {

            var field_name = index + '_validation',
                messages = data2;
            var html = '';
            $.each(messages, function (index3, data3) {
                if(html != '') {
                    html = html + '<br/>';
                }
                html += data3;
            });
            $('#'+field_name).html(html);
        });
    }


    $(document).on("click", "#delete_product_button", function (e) {

        var delete_product_button = $(this);
        var id = delete_product_button.attr('data-product-id');
        $.ajax({
            url: "/product/"+id,
            type: 'DELETE',
            datatype: 'json',
        }).done(function(data) {
            if(data.status == false){
                alert(data.message);
            }else {
                delete_product_button.closest("tr").remove();
                alert(data.message);
            }
        });
        e.preventDefault();
    });


    $(document).on("click", "#image-view-button", function (e) {

        var image_view_button = $(this);
        var id = image_view_button.attr('data-product-id');
        $.ajax({
            url: "/product/"+id,
            type: 'GET',
            datatype: 'json',
        }).done(function(data) {
            if(data.status == true){
                $('#product-image').prop('src', data.src);
            }else{
                $('#image-view-msg').html(data.msg);
            }
        });
        e.preventDefault();
    });

    $(document).on("click", "#delete-attr", function (e) {
        var data = $("#selected-attr").serializeArray(),
            product_id = $('.product_id').val();
        $.ajax({
            url: "/productAttributes/"+product_id,
            type: 'DELETE',
            data:  data,
            datatype: 'json',
        }).done(function(data) {
            if(data.status == true){
                $.each(data.data, function (index, element) {
                    $('#'+element).closest("tr").remove();
                });
                alert(data.message);
            }else{
                alert(data.message);
            }
        });
    });

</script>

@endsection