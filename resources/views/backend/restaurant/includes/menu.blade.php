<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{auth('restaurant')->user()->image}}"style="border-radius: 20%" width="45px" />
            </div>
            <div class="admin-info">
                @php
                    $name = auth('restaurant')->user()->name;
                    $fname = explode(' ', $name);
                @endphp
                <div class="font-strong">{{ucfirst($fname[0])}}</div><small class="text-success">Owner <i class="fa fa-check-circle"></i></small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{route('restaurant')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-image"></i>
                    <span class="nav-label">Banners & Promo</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">

                    <li>
                        <a href="">Manage banners </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-bars"></i>
                    <span class="nav-label">Menu items</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">

                    <li>
                        <a href="{{route('menu.index')}}">Manage Menu </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-frown-o"></i>
                    <span class="nav-label"> Food Verities items</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">

                    <li>
                        <a href="{{route('verity.index')}}">Manage verities </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-sellsy"></i>
                    <span class="nav-label"> Food  items</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">

                    <li>
                        <a href="{{route('food.index')}}">Manage foods </a>
                    </li>
                </ul>
            </li>


            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-image"></i>
                    <span class="nav-label">Photos</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">

                    <li>
                        <a href="{{route('photo.index')}}">Manage Photos </a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-clock-o"></i>
                    <span class="nav-label">Reservation section</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">

                    <li>
                        <a href="{{route('date.index')}}">Manage Dates </a>
                        <a href="{{route('hour.index')}}">Manage Hours </a>
                        <a href="{{route('table.index')}}">Manage Tables </a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
