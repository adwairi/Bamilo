@extends('layouts.admin')

@section('content')

    @php
        function cat($categories){
            echo '<ul>';
            foreach ($categories as $category){
                echo '<li>';
                if (is_array($category)){
                    echo '<ul>';
                    echo '<li>';
                    cat($category);
                    echo '</li>';
                    echo '</ul>';

                }else{
                    echo $category->title;
                }
                echo '</li>';
            }
            echo '</ul>';
        }
    @endphp

    <div class="px-container">
        <div class="row">
            <div class="col-md-4">
                <div id="jstree_demo_div">
                <ul id="tree3">
                        <li><a href="#">Categories</a>
                            @php
                                echo cat($categories);
                            @endphp
                        </li>
                    </ul>
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
//         $('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});
    </script>
@endsection

