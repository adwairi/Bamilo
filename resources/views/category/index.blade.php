@extends('layouts.main')

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

    <div class="container" style="margin-top:30px;">
    <div class="row">
        <div class="col-md-4">
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

    <script>
         $('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});
    </script>
@endsection

