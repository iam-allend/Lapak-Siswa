
<aside style="height: 100%;position:fixed" id="layout-menu" class="overflow-auto layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo <?= (isset($activePage) && $activePage == 'Dashboard') ? 'active' : '' ?>">
            <a href="<?= base_url('dashboard') ?>" class="app-brand-link">
              <span class="app-brand-logo demo mt-3">
                <img width="130" src="<?= base_url('logo/logo-text-green.webp') ?>" alt="">
              </span>
              <span class="d-none">
                <span class="app-brand-text demo menu-text fw-bolder ms-1">Lapak</span>
                <span class="app-brand-text demo menu-text fw-bolder ms-1">Siswa</span>
              </span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          
          <ul class="menu-inner pt-4 pb-5 overflow-y-auto" style="height: 80vh !important;">

            <!-- Dashboard -->
            <li class="menu-item">
                <a href="<?= base_url('/') ?>" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Home</div>
                </a>
            </li>
            <li class="menu-item <?= (isset($activePage) && $activePage == 'Dashboard') ? 'active' : '' ?>">
                <a href="<?= base_url('dashboard') ?>" class="menu-link">
                    <i class='menu-icon tf-icons bx bx-tachometer'></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>
            
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">DATA TRANSAKSI</span>
            </li>            
            
            <li class="menu-item <?= (isset($activePage) && $activePage == 'Manage Order Product Siswa') ? 'active' : '' ?>">
              <a href="<?= base_url() ?>manage-order-product-siswa" class="menu-link">
                <i class='menu-icon tf-icons bx bx-git-compare' ></i>
                <div>Order Product Siswa</div>
              </a>
            </li>
            <li class="menu-item disabled <?= (isset($activePage) && $activePage == 'Manage Order Product IndPer') ? 'active' : '' ?>">
              <a disabled href="<?= base_url() ?>manage-order-product-indper" class="menu-link">
                <i class='menu-icon tf-icons bx bx-git-compare' ></i>
                <div>Order Product IndPer</div>
              </a>
            </li>
            
            

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">DATA USER</span>
            </li>            
            
            <li class="menu-item <?= (isset($activePage) && $activePage == 'Manage Admin') ? 'active' : '' ?>">
              <a href="<?= base_url() ?>manage-admin" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-badge' ></i>
                <div>Manage Admin</div>
              </a>
            </li>
            <li class="menu-item <?= (isset($activePage) && $activePage == 'Manage Siswa') ? 'active' : '' ?>">
              <a href="<?= base_url() ?>manage-siswa" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-detail'></i>
                <div>Manage Siswa</div>
              </a>
            </li>
            <li class="menu-item <?= (isset($activePage) && $activePage == 'Manage IndPer') ? 'active' : '' ?>">
              <a href="<?= base_url() ?>manage-indper" class="menu-link">
                  <i class='menu-icon tf-icons bx bx-user-circle'></i>
                  <div>Manage IndPer</div>
              </a>
            </li>
            <li class="menu-item <?= (isset($activePage) && $activePage == 'Manage Customer') ? 'active' : '' ?>">
              <a href="<?= base_url() ?>manage-customer" class="menu-link">
                  <i class='menu-icon tf-icons bx bx-user'></i>
                  <div>Manage Customer</div>
              </a>
            </li>
            <li class="menu-item disabled <?= (isset($activePage) && $activePage == 'Manage Keranjang Customer') ? 'active' : '' ?>">
              <a disabled href="<?= base_url() ?>manage-keranjang-customer" class="menu-link">
                <i class='menu-icon tf-icons bx bx-cart-alt' ></i>
                  <div>Keranjang Customer</div>
              </a>
            </li>

            <!-- Menu lainnya -->

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">DATA PRODUCT</span>
            </li>

            <li class="menu-item <?= (isset($activePage) && $activePage == 'Manage Product Siswa') ? 'active' : '' ?>">
              <a href="<?= base_url() ?>manage-product-siswa" class="menu-link">
                <i class='menu-icon tf-icons bx bx bx-package'></i>
                <div>Product Siswa</div>
              </a>
            </li>

            <li class="menu-item disabled <?= (isset($activePage) && $activePage == 'Manage Product IndPer') ? 'active' : '' ?>">
              <a disabled href="<?= base_url() ?>manage-product-indper" class="menu-link">
                <i class='menu-icon tf-icons bx bx bx-package'></i>
                <div>Product IndPer</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">KELENGKAPAN PRODUK</span>
            </li>
            
            <li class="menu-item disabled <?= (isset($activePage) && $activePage == 'Manage Kelompok') ? 'active' : '' ?>">
              <a disabled href="<?= base_url() ?>manage-group" class="menu-link">
                <i class='menu-icon tf-icons bx bxs-user-account'></i>
                <div>Manage Kelompok</div>
              </a>
            </li>            
            <li class="menu-item <?= (isset($activePage) && $activePage == 'Manage Kelas') ? 'active' : '' ?>">
              <a href="<?= base_url() ?>manage-kelas" class="menu-link">
                <i class='menu-icon tf-icons bx bx-layer'></i>
                <div>Manage Kelas</div>
              </a>
            </li>

            <li class="menu-item <?= (isset($activePage) && $activePage == 'Manage Kategori Product') ? 'active' : '' ?>">
              <a href="<?= base_url() ?>manage-kategori-product" class="menu-link">
                <i class='menu-icon tf-icons bx bx-category'></i>
                <div>Kategori Product</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">DATA SYSTEM</span>
            </li>
            
            <li class="menu-item <?= (isset($activePage) && $activePage == 'Manage Pajak') ? 'active' : '' ?>">
              <a href="<?= base_url() ?>manage-pajak" class="menu-link">
                <i class='menu-icon tf-icons bx bx-shape-square' ></i>
                <div>Pajak Sistem</div>
              </a>
            </li>

          </ul>
        </aside>
        <!-- / Menu -->


        <!-- Layout container -->
        <div style="margin-left: 16rem;" class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme mt-4"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="<?= base_url('img_user/' . session('url_image'))?>" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="<?= base_url('img_user/' . session('url_image'))?>" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block"><?= session('fullname')?></span>
                            <small class="text-muted">
                                <?php
                                $id_level = session('id_level');
                                if ($id_level == 1) {
                                    echo 'Customer';
                                } elseif ($id_level == 2) {
                                    echo 'Siswa';
                                } elseif ($id_level == 3) {
                                    echo 'Admin';
                                } elseif ($id_level == 4) {
                                    echo 'Superadmin';
                                } else {
                                    echo 'Tidak Diketahui';
                                }
                                ?>
                            </small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('profile-admin')?>">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="<?= base_url('auth/logout')?>">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>