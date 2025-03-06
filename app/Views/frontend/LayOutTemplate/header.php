<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lapak Siswa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= base_url() ?>logo\logo-green.webp" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url() ?>frontend/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>frontend/lib/animate/animate.min.css">
    <link href="<?= base_url() ?>frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url() ?>frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>frontend/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= base_url() ?>frontend/css/style.css" rel="stylesheet">
    <link href="<?= base_url() ?>frontend/css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4"  id="navbar">
                <a href="<?= base_url() ?>logo\logo-green.webp"
                    class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="<?= base_url() ?>logo\logo-green.webp" alt="Icon"
                            style="width: 30px; height: 30px;">
                    </div>
                    <h3 class="m-0 text-primary">Lapak Siswa</h3>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="<?= base_url() ?>" class="nav-item nav-link active">Home</a>
                        <a href="<?= base_url() ?>about" class="nav-item nav-link">About</a>
                        <a href="<?= base_url() ?>shop" class="nav-item nav-link">Produk</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="<?= base_url() ?>blog" class="dropdown-item">Blog</a>
                                <a href="<?= base_url() ?>testimonial" class="dropdown-item">Testimonial</a>
                                <a href="<?= base_url() ?>404.html" class="dropdown-item">Mitra</a>
                            </div>
                        </div>
                        <a href="<?= base_url() ?>contactus" class="nav-item nav-link">Contact</a>
                    </div>

                    <?php if(session('id_level') == 1){?>

                    <div class="dropdown">
                        <img src="<?= base_url('backend/img_siswa/' . session('url_image'))?>" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false" class="rounded-circle" width="40">
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                            <a class="dropdown-item" href="<?= base_url('profile')?>">
                                <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                    <img src="<?= base_url('backend/img_siswa/' . session('url_image'))?>" alt width="40" class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block"><?= session('fullname')?></span>
                                    <small class="text-muted">Rp30.000</small>
                                </div>
                                </div>
                            </a>
                            </li>
                            <li>
                            <div class="dropdown-divider"></div>
                            </li>
                            <li>
                            <a class="dropdown-item" href="<?= base_url('profile')?>">
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

                    </div>
                    <?php }else{?>
                    <a href="<?= base_url() ?>login" class="btn btn-primary px-3 d-none d-lg-flex">Login</a>
                    <?php }?>
                </div>

            </nav>
            <nav class="navbar navbar-bottom navbar-light">
                <div class="navbar-nav w-100 d-flex flex-row">
                    <a href="<?= base_url() ?>" class="nav-item nav-link">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                    <a href="<?= base_url() ?>kategori" class="nav-item nav-link">
                        <i class="fas fa-list"></i>
                        <span>Kategori</span>
                    </a>
                    <a href="<?= base_url() ?>tas" class="nav-item nav-link">
                        <i class="fas fa-shopping-bag"></i>
                        <span>Tas</span>
                    </a>
                    <a href="<?= base_url() ?>wishlist" class="nav-item nav-link">
                        <i class="fas fa-heart"></i>
                        <span>Wishlist</span>
                    </a>
                    <a href="<?= base_url() ?>akun" class="nav-item nav-link">
                        <i class="fas fa-user"></i>
                        <span>Akun</span>
                    </a>
                </div>
            </nav>
            <script src="<?= base_url() ?>frontend/js/hd.js"></script>
        </div>

        <!-- Navbar End -->

