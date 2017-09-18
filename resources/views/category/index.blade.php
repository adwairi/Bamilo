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
            <p class="well" style="height:135px;"><strong>Initialization optional parameters</strong>

                <br /> <code>$('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});</code>

            </p>
            <ul id="tree3">
                <li><a href="#">TECH</a>
                    @php
                        echo cat($categories);
                    @endphp
                    <ul>
                        <li>Company Maintenance</li>
                        <li>Employees
                            <ul>
                                <li>Reports
                                    <ul>
                                        <li>Report1</li>
                                        <li>Report2</li>
                                        <li>Report3</li>
                                    </ul>
                                </li>
                                <li>Employee Maint.</li>
                            </ul>
                        </li>
                        <li>Human Resources</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>

    <script>
         $('#tree3').treed({openedClass:'glyphicon-chevron-right', closedClass:'glyphicon-chevron-down'});
    </script>
@endsection

