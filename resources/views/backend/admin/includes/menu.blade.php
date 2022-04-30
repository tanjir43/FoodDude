<!-- START SIDEBAR-->
<nav class="page-sidebar" id="sidebar">
    <div id="sidebar-collapse">
        <div class="admin-block d-flex">
            <div>
                <img src="{{auth('admin')->user()->image}}"style="border-radius: 20%" width="45px" />
            </div>
            <div class="admin-info">
                @php
                $full_name = auth('admin')->user()->full_name;
                $firstname = explode(' ', $full_name);
                @endphp
                <div class="font-strong">{{ucfirst($firstname[0])}}</div><small class="text-success">{{auth('admin')->user()->role}} <i class="fa fa-check-circle"></i></small></div>
        </div>
        <ul class="side-menu metismenu">
            <li>
                <a class="active" href="{{route('admin')}}"><i class="sidebar-item-icon fa fa-th-large"></i>
                    <span class="nav-label">Dashboard</span>
                </a>
            </li>
            <li class="heading">FEATURES</li>

            <li>
                <a href="javascript:;"><i class="sidebar-item-icon fa fa-image"></i>
                    <span class="nav-label">Banners & Promo</span><i class="fa fa-angle-left arrow"></i></a>
                <ul class="nav-2-level collapse">

                    <li>
                        <a href="{{route('banner.index')}}">Manage banners </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<!-- END SIDEBAR-->
