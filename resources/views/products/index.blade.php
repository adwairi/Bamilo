@extends('layouts.main')

@section('content')
            <div class="px-content">
                <div class="page-header">
                    <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Tables / </span>DataTables</h1>
                </div>

                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title pull-left">Products</div>
                        <div class="panel-heading-controls pull-right">
                            <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                                Add Product
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
                                        <tr class="odd">
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->model}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->desc}}</td>
                                            <td>
                                                <a href="#" class="attributes" data-product-id="{{$product->id}}">attributes</a>
                                                <a href="#" class="images" data-product-id="{{$product->id}}">image</a>
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
                            <form actio="/product" method="post" id="form" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="title" class="col-md-3 control-label">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="title" id="title" placeholder="title">
                                        <br/><font color="red" class="validation" id="title_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="model" class="col-md-3 control-label">Model</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="model" id="model" placeholder="model">
                                        <br/><font color="red" class="validation" id="model_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="price" class="col-md-3 control-label">Price</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="price" id="price" placeholder="price">
                                        <br/><font color="red" class="validation" id="price_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="status" class="col-md-3 control-label">Status</label>
                                    <div class="col-md-9">
                                        <select class="form-control" id="status" name="status">
                                            <option>Not selected</option>
                                            @foreach(\App\Entity\Product::getStatus() as $key=>$status)
                                                <option value="{{$key}}">{{$status}}</option>
                                            @endforeach
                                        </select>
                                        <br/><font color="red" class="validation" id="status_validation" ></font>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="quantity" class="col-md-3 control-label">Quantity</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="quantity" id="quantity" placeholder="quantity">
                                        <br/><font color="red" class="validation" id="quantity_validation" ></font>
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
                                <input type="hidden" name="id" id="product_id" value="">
                                <input type="submit" id="save_product" class="btn btn-primary" value="save">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                            <button type="button" id="save_product" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>

<script>

//    $(document).on("click", "#save_product", function (e) {
//        var data = $("#form").serializeArray(),
//            url = $("#form").attr('action');
//        $.ajax({
//            url: url,
//            type: 'POST',
//            data: data,
//            datatype: 'json',
//        }).done(function(data) {
//            if(data.status == false){
//                validation_messages(data);
//            }else{
//                window.location.reload();
//            }
//        });
//        e.preventDefault();
//    });

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
</script>

@endsection