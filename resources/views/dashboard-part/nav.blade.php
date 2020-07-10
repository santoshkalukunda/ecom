<!-- START HEADER-->
<header class="header">
    <div class="page-brand">
        <a class="link" href="{{route('home')}}">
                    <span class="brand">Admin
                        <span class="brand-tip">Ecommerce</span>
                    </span>
            <span class="brand-mini">AE</span>
        </a>
    </div>
    <div class="flexbox flex-1">
        <!-- START TOP-LEFT TOOLBAR-->
        <ul class="nav navbar-toolbar">
            <li>
                <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
            </li>

        </ul>
        <!-- START TOP-RIGHT TOOLBAR-->
        <ul class="nav navbar-toolbar">

            <li class="dropdown dropdown-user">
                <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                    <i class="fa fa-user fa-1x"></i>
                        &nbsp;&nbsp;
                    <span></span>{{Auth::user()->name}}<i class="fa fa-angle-down m-l-5"></i></a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href=""><i class="fa fa-user"></i>Profile</a>
                    <li class="dropdown-divider"></li>
                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout_form').submit();" ><i class="fa fa-power-off"></i>Logout</a>
                <form action="{{route('logout')}}" method="post" id="logout_form">
                    @csrf
                </form>

                </ul>
            </li>
        </ul>
        <!-- END TOP-RIGHT TOOLBAR-->
    </div>
</header>
<!-- END HEADER-->
