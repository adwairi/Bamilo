@extends('layouts.admin')

@section('content')

    @include('main.filters')
    <div class="px-content">
        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-erlenmeyer-flask"></i>Widgets / </span>Misc</h1>
        </div>
        <!-- Profile widget -->
        @foreach($products as $key=>$product)
            @if($key%2==0)<div class="row">@endif
                <div class="col-md-4">
                    <!-- Centered -->
                    <div class="panel panel-default panel-dark panel-body-colorful widget-profile-centered">
                        <div class="panel-heading">
                            <img src="{{ asset($product->imgUrl) }}" alt="" class="widget-profile-avatar">
                            <h3 class="widget-profile-header">
                                <p>{{ $product->title }}, {{ $product->product_model }}<br>
                                {{ $product->price }}
                            </h3>
                        </div>
                        <div class="panel-body panel-body-colorful panel-primary">
                            <p><button data-product-id="{{ $product->id }}" type="button" class="btn btn-warning btn-lg  buy">Buy</button></p>
                        </div>
                    </div>

                </div>
            @if($key%2==0)<div>@endif
        @endforeach

        <!-- / Profile widget -->

    </div>
@endsection
@section('scripts')
    <script>
        pxDemo.initializeDemoSidebar();

        pxInit.push(function() {
            $('#px-demo-sidebar').pxSidebar();
            pxDemo.initializeDemo();
        });

@endsection