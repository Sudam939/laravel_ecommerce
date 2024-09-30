<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{route('dashboard')}}"> <img alt="image" src="/assets/img/logo.png" class="header-logo" />
            <span class="logo-name">Otika</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
            <a href="{{route('dashboard')}}" class="nav-link"><i
                    data-feather="monitor"></i><span>Dashboard</span></a>
        </li>

        <li class="dropdown">
            <a href="{{route('carts')}}" class="nav-link"><i
                    data-feather="shopping-cart"></i><span>Carts</span></a>
        </li>


        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="briefcase"></i><span>Widgets</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Chart Widgets</a></li>
                <li><a class="nav-link" href="widget-data.html">Data Widgets</a></li>
            </ul>
        </li>
    </ul>
</aside>
