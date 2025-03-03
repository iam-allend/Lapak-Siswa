<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
                <img src="<?= base_url('frontend/img/lapaksiswa.png') ?>" alt="lapak siswa"
                    style="width: 30px; height: 30px;">
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="/profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Profile</span>
        </p>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="/settings">
                    <i class="fe fe-settings fe-16"></i>
                    <span class="ml-3 item-text">Profile Settings</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="/saldo">
                    <i class="fe fe-credit-card fe-16"></i>
                    <span class="ml-3 item-text">Saldo</span>
                </a>
            </li>
            <li class="nav-item w-100">
                <a class="nav-link" href="/orders">
                    <i class="fe fe-clock fe-16"></i>
                    <span class="ml-3 item-text">History</span>
                </a>
            </li>
        </ul>
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Selengkapnya</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-help-circle fe-16"></i>
                    <span class="ml-3 item-text">Help</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./page-orders.html">
                            <span class="ml-1 item-text">Orders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./page-timeline.html">
                            <span class="ml-1 item-text">Timeline</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./page-invoice.html">
                            <span class="ml-1 item-text">Invoice</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./page-404.html">
                            <span class="ml-1 item-text">Page 404</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./page-500.html">
                            <span class="ml-1 item-text">Page 500</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="./page-blank.html">
                            <span class="ml-1 item-text">Blank</span>
                        </a>
                    </li>
                </ul>
            </li>

            <div class="btn-box w-100 mt-4 mb-1">
                <a href="<?= base_url('auth/logout')?>" class="btn mb-2 btn-danger btn-lg btn-block">
                    <i class="fe fe-log-out t fe-12 mx-2"></i><span class="small">Logout</span>
                </a>
            </div>
    </nav>
</aside>