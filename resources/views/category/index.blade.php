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
                <span class="panel-title">Categories</span>
            </div>
            <div class="panel-body">
                <div id="jstree_demo_div">
                    @php
                        echo tree($categories);
                    @endphp
                </div>
            </div>
        </div>
        {{----}}
        {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
                {{--<div id="jstree_demo_div">--}}
                {{--<ul>--}}
                        {{--<li>Categories</a>--}}
                            {{--@php--}}
                                {{--echo tree($categories);--}}
                            {{--@endphp--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection
@section('scripts')
    <script>
        $(function () { $('#jstree_demo_div').jstree(); });
        $('#jstree_demo_div').on("changed.jstree", function (e, data) {
            console.log(data.selected);
        });
//         $('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});
    </script>
@endsection

