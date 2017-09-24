@extends('layouts.admin')

@section('content')
    <div class="px-content">
        {{--<div class="page-header">--}}
            {{--<h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Tables / </span>DataTables</h1>--}}
        {{--</div>--}}

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title pull-left">Attributes</div>
                <div class="panel-heading-controls pull-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                        <span class="btn-label-icon left"><i class="fa fa-plus"></i></span>Add Attribute
                    </button>
                </div>
            </div>
            <div class="panel-body">

                <div class="table-info">
                    <table class="table table-striped table-bordered" id="datatables">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attributes as $key=>$attribute)
                            <tr class="odd">
                                <td>{{$attribute->title}}</td>
                                <td>{{$attribute->category_id}}</td>
                                <td>{{$attribute->desc}}</td>
                                <td>
                                    <button type="button" data-type="" data-message="" id="delete_attr_button" class="btn btn-danger btn-sm" data-attr-id="{{$attribute->id}}">
                                        <span class="btn-label-icon left"><i class="fa fa-trash"></i></span>Delete
                                    </button>
                                    <button type="button" class="options btn btn-success btn-sm" data-attr-id="{{$attribute->id}}" data-toggle="modal" data-target="#modal-option">
                                        <span class="btn-label-icon left"><i class="fa fa-plus"></i></span>Add Options
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
                    <h4 class="modal-title" id="myModalLabel">Add Attribute</h4>
                </div>
                <div class="modal-body">
                    <form action="/attribute" id="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Title <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="title">
                                <font color="red" class="validation" id="title_validation" ></font>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category" class="col-md-3 control-label">Category <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <select class="form-control" id="category" name="category">
                                    <option>select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category['id']}}">{{$category['title']}}</option>
                                    @endforeach
                                </select>
                                <font color="red" class="validation" id="category_validation" ></font>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="desc" class="col-md-3 control-label">Description</label>
                            <div class="col-md-9">
                                <textarea id="desc" class="form-control" name="desc"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                    <button type="button" id="save_attribute" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-option" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title" id="myModalLabel">Add Option</h4>
                </div>
                <div class="modal-body">
                    <form action="/attributeOptions" id="form_options" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Title <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="option_title" id="option_title" placeholder="title">
                                <font color="red" class="validation" id="option_title_validation" ></font>
                            </div>
                        </div>
                        <input type="hidden" name="attribute_id" id="attribute_id" value="">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                    <button type="button" id="save_option" class="btn btn-primary">Save</button>
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

        $(document).on("click", "#save_attribute", function (e) {
            var data = $("#form").serializeArray(),
                urlAttr = $("#form").attr('action');
            $.ajax({
                url: urlAttr,
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

        $('.options').click(function () {
            $('#attribute_id').val($(this).attr('data-attr-id'));
        })

        $(document).on("click", "#save_option", function (e) {
            var data = $("#form_options").serializeArray(),
                url = $("#form_options").attr('action');
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

    </script>

@endsection