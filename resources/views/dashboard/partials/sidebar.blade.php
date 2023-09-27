<header class="header" id="header_sidebar">
    <div class="header_toggle">
        <i class='bx bx-menu' id="toggle_sidebar"></i>
    </div>
    <span class="d-block justify-content-start text-light">
        <h5>{{ $page }}</h5>
    </span>
    <div class="d-flex">
        <img class="header_img" src="{{ asset('img/user.png') }}" alt="">
        <span class="text-light mt-2 ms-2">Hi, Yoan !</span>
    </div>

</header>
<div class="l-navbar" id="nav_sidebar">
    <nav class="nav">
        <div>
            <a href="#" class="nav_logo">
                {{-- <i class='bx bx-layer nav_logo-icon'></i> --}}
                <img src="{{ asset('img/logo_stick.png') }}" alt="logo" height="25">
                <span class="nav_logo-name">GGWP GAMING</span>
            </a>
            <div class="nav_list">
                <a href="/dashboard" class="nav_link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class='bx bx-grid-alt nav_icon'></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="/dashboard/transaction"
                    class="nav_link {{ Request::is('dashboard/transaction*') ? 'active' : '' }}">
                    <i class='fa-brands fa-playstation nav_icon'></i>
                    <span class="nav_name">Transaksi</span>
                </a>
                <a href="/dashboard/data-tv" class="nav_link {{ Request::is('dashboard/data-tv') ? 'active' : '' }}">
                    <i class='fa fa-television nav_icon'></i>
                    <span class="nav_name">Data TV</span>
                </a>
                <a href="/dashboard/data-menu"
                    class="nav_link {{ Request::is('dashboard/data-menu') ? 'active' : '' }}">
                    <i class='fa fa-utensils nav_icon'></i>
                    <span class="nav_name">Data Menu</span>
                </a>
                <a href="/dashboard/data-finance"
                    class="nav_link {{ Request::is('dashboard/data-finance*') ? 'active' : '' }}">
                    <i class='fa fa-scale-unbalanced nav_icon'></i>
                    <span class="nav_name">Management</span>
                </a>
                {{-- <a href="#" class="nav_link">
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                    <span class="nav_name">Stats</span>
                </a> --}}
            </div>
        </div>
        <a href="#" class="nav_link">
            <i class='bx bx-log-out nav_icon'></i>
            <span class="nav_name">Sign Out</span>
        </a>
    </nav>
</div>
