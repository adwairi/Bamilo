<nav class="px-nav px-nav-left" id="px-demo-nav">
    <button type="button" class="px-nav-toggle" data-toggle="px-nav">
        <span class="px-nav-toggle-arrow"></span>
        <span class="navbar-toggle-icon"></span>
        <span class="px-nav-toggle-label font-size-11">HIDE MENU</span>
    </button>

    <ul class="px-nav-content">
        <li class="px-nav-box border-panel text-black p-a-3 b-b-1" id="demo-px-nav-box">
            <button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <img src="{{ asset('assets/pixel/dist/demo/avatars/1.png') }}" alt="" class="pull-xs-left m-r-2 border-round" style="width: 54px; height: 54px;">
            <div class="font-size-16"><span class="font-weight-light">Welcome, </span><strong>{{ Auth::user()->name }}</strong></div>
            <div class="btn-group" style="margin-top: 4px;">
                <a href="#" class="btn btn-xs btn-default btn-outline"><i class="fa fa-envelope"></i></a>
                <a href="#" class="btn btn-xs btn-default btn-outline"><i class="fa fa-user"></i></a>
                <a href="#" class="btn btn-xs btn-default btn-outline"><i class="fa fa-cog"></i></a>
                <a href="#" class="btn btn-xs btn-danger btn-outline"><i class="fa fa-power-off"></i></a>
            </div>
        </li>
        <li class="px-nav-item">
            <a href="/category"><i class="px-nav-icon ion-cube"></i><span class="px-nav-label">Categories</span></a>
        </li>
        <li class="px-nav-item">
            <a href="/product"><i class="px-nav-icon ion-aperture"></i><span class="px-nav-label">Products</span></a>
        </li>
        <li class="px-nav-item">
            <a href="/attribute"><i class="px-nav-icon ion-social-buffer"></i><span class="px-nav-label">Attributes</span></a>
        </li>
    </ul>
</nav>