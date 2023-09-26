<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img src="{{ asset('/img/logo-ps.png') }}" height="50" class="img-logo" alt="logo-ps">
    </div>
    <ul class="sidebar-nav">
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
            <a href="/dashboard"><i class="fa fa-home"></i>Dashboard</a>
        </li>
        <li class="{{ Request::is('dashboard/transaction*') ? 'active' : '' }}">
            <a href="/dashboard/transaction"><i class="fa fa-brands fa-playstation"></i>Transaction</a>
        </li>
        <li class="{{ Request::is('dashboard/data-tv') ? 'active' : '' }}">
            <a href="/dashboard/data-tv"><i class="fa fa-tv"></i>Data TV</a>
        </li>
        <li class="{{ Request::is('dashboard/data-menu') ? 'active' : '' }}">
            <a href="/dashboard/data-menu"><i class="fa fa-utensils"></i>Data Menu</a>
        </li>
        <li class="{{ Request::is('dashboard/data-finance*') ? 'active' : '' }}">
            <a href="/dashboard/data-finance"><i class="fa fa-scale-unbalanced"></i>Management</a>
        </li>
    </ul>
    <ul class="sidebar-nav sidebar-bottom">
        <li>
            <a href="/logout"><i class="fa fa-right-from-bracket"></i>Logout</a>
        </li>
    </ul>
</aside>

<div id="navbar-wrapper">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header d-flex">
                <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
                <h4 class="mt-1">{{ $page }}</h4>
            </div>
        </div>
    </nav>
</div>
