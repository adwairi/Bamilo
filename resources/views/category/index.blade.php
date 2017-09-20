@extends('layouts.admin')

@section('content')

    @php
        function tree($categories){
            echo '<ul>';
            foreach ($categories as $category){
                echo "<li>".$category['title']."</li>";
                if (isset($category['children']) && count($category['children'])){
                    tree($category['children']);
                }
            }
            echo '</ul>';
        }

    @endphp

    <div class="px-content">

        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title pull-left">Categories</div>
                <div class="panel-heading-controls pull-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                        Add Category
                    </button>
                </div>
            </div>
            <div class="panel-body">
                <div id="jstree_demo_div">
                    @php
                        echo tree($categories);
                    @endphp
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                </div>
                <div class="modal-body">
                    <form action="/category" id="form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-3 control-label">Title <span class="text-danger">*</span></label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="title" id="title" placeholder="title">
                                <font color="red" class="validation" id="title_validation" ></font>
                            </div>
                        </div>
                        @if(count($categories))
                            <div class="form-group">
                                <label for="category" class="col-md-3 control-label">Parent Category</label>
                                <div class="col-md-9">
                                    <select class="form-control" id="parent_category" name="parent_category">
                                        <option></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['title']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
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
                    <button type="button" id="save_category" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(function () { $('#jstree_demo_div').jstree(); });
        $('#jstree_demo_div').on("changed.jstree", function (e, data) {
            console.log(data.selected);
        });
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).on("click", "#save_category", function (e) {
            var data = $("#form").serializeArray(),
                url = $("#form").attr('action');
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
    </script>
@endsection

