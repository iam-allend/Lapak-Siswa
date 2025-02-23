<?php include("LayOutTemplate/header.php"); ?>


<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Detail Produk</h1>
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="<?= base_url('frontend/img/lapaksiswa.png') ?>" alt="">
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Search Start -->

<!-- Search End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="img-fluid"
                                src="https://img.freepik.com/free-psd/coffee-shop-drink-menu-promotion-social-media-instagram-post-banner-template-design_84443-975.jpg?uid=R114346057&ga=GA1.1.2030267003.1739926437&semt=ais_hybrid"
                                alt="Product Image 1">
                        </div>
                        <div class="carousel-item">
                            <img class="img-fluid"
                                src="https://img.freepik.com/free-psd/special-coffee-menu-sale-promotional-web-banner-instagram-banner-template_505751-3240.jpg?ga=GA1.1.716487584.1695209759&semt=ais_hybrid"
                                alt="Product Image 2">
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">Kopi Ireng
                    <span style="font-size: 1rem; color:blue;">Rp15.000</span>
                </h1>

                <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et
                    eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                <p><i class="fa fa-circle text-primary me-3"></i>Tempor erat elitr rebum at clita</p>

                <a class="btn btn-primary py-3 px-5 mt-3" href="">
                    <li class="fa fa-cart-plus" style="display: inline-block; margin-right: 8px;"></li>
                    Keranjang
                </a>


            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Call to Action Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="bg-light rounded p-3">
            <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <img class="img-fluid rounded w-100" src="img/call-to-action.jpg" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="mb-4">
                            <h1 class="mb-3">Contact With Our Certified Agent</h1>
                            <p>Eirmod sed ipsum dolor sit rebum magna erat. Tempor lorem kasd vero ipsum sit sit diam
                                justo sed vero dolor duo.</p>
                        </div>
                        <a href="" class="btn btn-primary py-3 px-4 me-2"><i class="fa fa-phone-alt me-2"></i>Make A
                            Call</a>
                        <a href="" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get
                            Appoinment</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Call to Action End -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Produk yang mungkin Anda sukai</h1>
            <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod
                sit. Ipsum diam justo sed rebum vero dolor duo.</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid"
                            src="https://img.freepik.com/free-psd/coffee-shop-drink-menu-promotion-social-media-instagram-post-banner-template-design_84443-975.jpg?uid=R114346057&ga=GA1.1.2030267003.1739926437&semt=ais_hybrid"
                            alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fa fa-cart-plus"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Kopi klotok Mak Limah Biadap</h5>
                        <small>Rp25.0000</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid"
                            src="https://img.freepik.com/free-psd/coffee-shop-drink-menu-promotion-social-media-instagram-post-banner-template-design_84443-975.jpg?uid=R114346057&ga=GA1.1.2030267003.1739926437&semt=ais_hybrid"
                            alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fa fa-cart-plus"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Kopi klotok Mak Limah Biadap</h5>
                        <small>Rp25.0000</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid"
                            src="https://img.freepik.com/free-psd/coffee-shop-drink-menu-promotion-social-media-instagram-post-banner-template-design_84443-975.jpg?uid=R114346057&ga=GA1.1.2030267003.1739926437&semt=ais_hybrid"
                            alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fa fa-cart-plus"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Kopi klotok Mak Limah Biadap</h5>
                        <small>Rp25.0000</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="team-item rounded overflow-hidden">
                    <div class="position-relative">
                        <img class="img-fluid"
                            src="https://img.freepik.com/free-psd/coffee-shop-drink-menu-promotion-social-media-instagram-post-banner-template-design_84443-975.jpg?uid=R114346057&ga=GA1.1.2030267003.1739926437&semt=ais_hybrid"
                            alt="">
                        <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                            <a class="btn btn-square mx-1" href=""><i class="fa fa-cart-plus"></i></a>
                            <a class="btn btn-square mx-1" href=""><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="text-center p-4 mt-3">
                        <h5 class="fw-bold mb-0">Kopi klotok Mak Limah Biadap</h5>
                        <small>Rp25.0000</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->



<?php include("LayOutTemplate/footer.php"); ?>