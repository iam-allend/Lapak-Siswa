<?php include("LayOutTemplate/header.php"); ?>
<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Produk</h1>
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">Produk</li>
                    
                </ol>
            </nav>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="<?= base_url('frontend/img/Ecommerce.png') ?>" alt="">
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Search Start -->
<!--<div class="container-fluid bg-primary mb-5 wow fadeIn mt-5" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-6">
                        <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword">
                    </div>
                    <!-- <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Property Type</option>
                            <option value="1">Property Type 1</option>
                            <option value="2">Property Type 2</option>
                            <option value="3">Property Type 3</option>
                        </select>
                    </div> -->
                   <!-- <div class="col-md-6">
                        <select class="form-select border-0 py-3">
                            <option selected>Location</option>
                            <option value="1">Location 1</option>
                            <option value="2">Location 2</option>
                            <option value="3">Location 3</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button class="btn btn-dark border-0 w-100 py-3">Search</button>
            </div>
        </div>
    </div>
</div>-->
<!-- Search End -->


<!-- Property List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Produk Kami</h1>
                    <p></p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">Featured</a>
                    </li>
                    <li class="nav-item me-2">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">For Sell</a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">For Rent</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    
                    <?php foreach ($products as $product): ?>
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="property-item rounded overflow-hidden">
                                <div class="position-relative overflow-hidden">
                                    <?php if (!empty($product['images'])): ?>
                                        <!-- Tampilkan gambar pertama sebagai gambar utama -->
                                        <a href="detail">
                                            <img class="img-fluid" src="<?= base_url($product['images'][0]['url']) ?>" alt="<?= $product['product_name'] ?>">
                                        </a>
                                    <?php else: ?>
                                        <!-- Jika tidak ada gambar, tampilkan gambar default -->
                                        <a href="detail">
                                            <img class="img-fluid" src="https://via.placeholder.com/300x200" alt="Gambar Default">
                                        </a>
                                    <?php endif; ?>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 pt-1 px-3 ms-3">
                                        <?= $product['nama_kategori'] ?> <!-- Kategori diambil dari tabel kategori -->
                                    </div>
                                </div>
                                <div class="p-4 pb-0 position-relative">
                                    <div class="price d-flex nowrap mb-1">
                                        <h5 class="text-primary me-2">Rp <?= number_format($product['price_final'], 0) ?></h5>
                                        <?php if ($product['discount'] > 0): ?>
                                            <!-- Tampilkan harga asli dan diskon jika diskon > 0 -->
                                            <p><span class="text-decoration-line-through me-2">Rp <?= number_format($product['price'], 0) ?></span></p>
                                            <p class="bg-warning px-1 py-0 fs-6 fw-bold textdecoration-italic rounded-1 me-2"><?= $product['discount'] ?>%</p>
                                        <?php endif; ?>
                                    </div>
                                    <a class="d-block h5 mb-2" href=""><?= $product['product_name'] ?></a>
                                    <p><?= substr($product['description'], 0, 100) ?>...</p> <!-- Deskripsi singkat -->
                                    <small class="flex-fill text-center border-end pt-2">
                                        Produsen : <?= $product['group_name'] ?> <!-- Group name dari tabel admin -->
                                    </small>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-box text-primary me-2"></i><?= $product['stock'] ?> Stok</small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-solid fa-tags text-primary me-2"></i><?= $product['sell'] ?> Terjual</small>
                                    <small class="flex-fill text-center py-2 btn btn-primary rounded-0">
                                        <i class="fa fa-solid fa-cart-plus me-2"></i>
                                        Keranjang</small>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="<?= base_url() ?>shoptest">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Property List End -->


<!-- Call to Action Start -->



<?php include("LayOutTemplate/footer.php"); ?>