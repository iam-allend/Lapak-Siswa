<?php include("LayOutTemplate/header.php"); ?>
<!-- Header Start -->
<div class="container-fluid header bg-white p-0">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">Satu ide kecil, satu langkah besar. Yuk, mulai di <span
                    class="text-primary">Lapak Siswa! </span>
            </h1>
            <p class="animated fadeIn mb-4 pb-2">Temukan dan dukung produk kreatif siswa dari berbagai sekolah. Saatnya berkarya dan menginspirasi bersama!.</p>
            <a href="<?= base_url() ?>shop" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Mulai Sekarang</a>
        </div>
        <div class="col-md-6 animated fadeIn">
            <div class="owl-carousel header-carousel">
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="<?= base_url() ?>frontend/img/image4.png" alt="">
                </div>
                <div class="owl-carousel-item">
                    <img class="img-fluid" src="<?= base_url() ?>frontend/img/image.png" alt="">
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Search Start 
<div class="container-fluid bg-primary mb-5 wow fadeIn mt-5" data-wow-delay="0.1s" style="padding: 35px;">
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
                    </div> 
                    <div class="col-md-6">
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
</div>
<!-- Search End -->


<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Kategori Produk</h1>
            <p>Temukan berbagai produk kreatif buatan siswa dari berbagai sekolah. Semua dibuat dengan semangat inovasi, penuh nilai edukatif, dan mencerminkan potensi generasi muda.</p>
        </div>

        <style>
        .cat-item {
            transition: all 0.3s ease;
            background-color: #f8f9fa;
        }

        .cat-item .rounded {
            background-color: #fff;
            padding: 30px 20px;
            border-radius: 10px;
            height: 100%;
        }

        .cat-item .icon img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .cat-item h6 {
            font-weight: 600;
            margin-top: 10px;
            color: #333;
        }

        .cat-item span {
            display: block;
            color: #6c757d;
            margin-top: 5px;
        }

        /* Highlight untuk item aktif */
        .cat-item.active {
            background-color: #6ec1a6 !important;
            color: #fff !important;
        }

        .cat-item.active .rounded {
            background-color: transparent;
        }

        .cat-item.active h6,
        .cat-item.active span {
            color: #fff;
        }

        /* Optional: hover effect */
        .cat-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }
    </style>
       <div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-3 col-sm-6">
            <a class="cat-item d-block text-center rounded p-3" href="">
                <div class="rounded">
                    <div class="icon mb-3">
                        <img src="frontend/img/image 3.png" alt="Kerajinan Tangan">
                    </div>
                    <h6>Kerajinan Tangan</h6>
                  
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="cat-item d-block text-center rounded p-3" href="">
                <div class="rounded">
                    <div class="icon mb-3">
                        <img src="frontend/img/img.jpg" alt="Villa">
                    </div>
                    <h6>Minyak Perawatan</h6>
                  
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="cat-item d-block text-center rounded p-3 active" href="">
                <div class="rounded">
                    <div class="icon mb-3">
                        <img src="frontend/img/maa.png" alt="Home">
                    </div>
                    <h6>Aromaterapi</h6>
                
                </div>
            </a>
        </div>
        <div class="col-lg-3 col-sm-6">
            <a class="cat-item d-block text-center rounded p-3" href="">
                <div class="rounded">
                    <div class="icon mb-3">
                        <img src="frontend/img/venir.png" alt="Office">
                    </div>
                    <h6>Souvenir</h6>
                  
                    </div>
                </a>
            </div>
            
            </div>
        </div>
    </div>
<!-- Category End -->


<!-- About Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                <div class="about-img position-relative overflow-hidden p-5 pe-0">
                    <img class="img-fluid" src="<?= base_url('frontend/img/lapaksiswa.png') ?>" alt="">
                </div>
            </div>
            <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                <h1 class="mb-4">🎓 Tempat Terbaik untuk Menemukan Karya Siswa Terbaik</h1>
                <p class="mb-4">Lapak Siswa adalah platform yang mendukung kreativitas dan inovasi pelajar dari seluruh Indonesia. Kami menghadirkan produk-produk unik, berkualitas, dan penuh nilai edukatif hasil karya anak sekolah.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Ragam produk kreatif karya siswa, hasil dari semangat dan ide-ide inspiratif.</p>
                <p><i class="fa fa-check text-primary me-3"></i>Produk orisinal buatan siswa</p>
                <p><i class="fa fa-check text-primary me-3"></i>Dukung langsung talenta muda Indonesia</p>
                <a class="btn btn-primary py-3 px-5 mt-3" href="<?= base_url() ?>about">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->


<!-- Property List Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                    <h1 class="mb-3">Produk Tersedia</h1>
                    <p>Jelajahi berbagai produk hasil karya siswa, mulai dari kerajinan tangan, karya digital, hingga barang fungsional sehari-hari. Semua produk dibuat dengan semangat belajar dan kreativitas tinggi.</p>
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
                                    <a href="detail">
                                        <img class="img-fluid" src="<?= base_url($product['images'][0]['url']) ?>" alt="<?= $product['product_name'] ?>">
                                    </a>
                                <?php else: ?>
                                    <a href="detail">
                                        <img class="img-fluid" src="https://via.placeholder.com/300x200" alt="Gambar Default">
                                    </a>
                                <?php endif; ?>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 pt-1 px-3 ms-3">
                                    <?= $product['nama_kategori'] ?>
                                </div>
                            </div>
                            <div class="p-4 pb-0 position-relative">
                                <div class="price d-flex nowrap mb-1">
                                    <h5 class="text-primary me-2">Rp <?= number_format($product['price_final'], 0) ?></h5>
                                    <?php if ($product['discount'] > 0): ?>
                                        <p><span class="text-decoration-line-through me-2">Rp <?= number_format($product['price'], 0) ?></span></p>
                                        <p class="bg-warning px-1 py-0 fs-6 fw-bold text-decoration-italic rounded-1 me-2"><?= $product['discount'] ?>%</p>
                                    <?php endif; ?>
                                </div>
                                <a class="d-block h5 mb-2" href=""><?= $product['product_name'] ?></a>
                                <p><?= substr($product['description'], 0, 100) ?>...</p>
                                <small class="flex-fill text-center border-end pt-2">
                                    Produsen : <?= $product['group_name'] ?>
                                </small>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-box text-primary me-2"></i><?= $product['stock'] ?> Stok</small>
                                <small class="flex-fill text-center border-end py-2">
                                    <i class="fa fa-solid fa-tags text-primary me-2"></i><?= $product['sell'] ?> Terjual</small>
                                <!-- Updated Add to Cart Button -->
                                <button class="flex-fill text-center py-2 btn btn-primary rounded-0"
                                        onclick="addToCart(<?= $product['id_product'] ?>, <?= session('id_customer') ?>, 1)">
                                    <i class="fa fa-solid fa-cart-plus me-2"></i> Keranjang
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                 <!--   <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a class="btn btn-primary py-3 px-5" href="<?= base_url() ?>shoptest">Browse More Property</a>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Property List End -->

<!-- Call to Action Start -->


<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Tim Kami </h1>
            <p>Perkenalkan para developer kami</p>
        </div>
        <div class="container">
  <div class="row g-4 justify-content-center">
    
    <!-- Card 1 -->
    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
      <div class="team-item rounded overflow-hidden">
        <div class="position-relative">
          <img class="img-fluid" src="<?= base_url() ?>frontend/img/anur.png" alt="">
          <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="text-center p-4 mt-3">
          <h5 class="fw-bold mb-0">Anur Mustakim</h5>
          <small>Back-end Developer</small>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
      <div class="team-item rounded overflow-hidden">
        <div class="position-relative">
          <img class="img-fluid" src="<?= base_url() ?>frontend/img/raka.JPG" alt="">
          <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="text-center p-4 mt-3">
          <h5 class="fw-bold mb-0">Raka Aditya Setyawan</h5>
          <small>Front-end Developer</small>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
      <div class="team-item rounded overflow-hidden">
        <div class="position-relative">
          <img class="img-fluid" src="<?= base_url() ?>frontend/img/zikri.JPG" alt="">
          <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="text-center p-4 mt-3">
          <h5 class="fw-bold mb-0">Zikry Dwi Maulana</h5>
          <small>Front-end Developer</small>
        </div>
      </div>
    </div>

    <!-- Card 4 -->
    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
      <div class="team-item rounded overflow-hidden">
        <div class="position-relative">
          <img class="img-fluid" src="<?= base_url() ?>frontend/img/novan.JPG" alt="">
          <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="text-center p-4 mt-3">
          <h5 class="fw-bold mb-0">Novan Sudinarjati</h5>
          <small>Front-end Developer</small>
        </div>
      </div>
    </div>

    <!-- Card 5 -->
    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
      <div class="team-item rounded overflow-hidden">
        <div class="position-relative">
          <img class="img-fluid" src="<?= base_url() ?>frontend/img/majiid.JPG" alt="">
          <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="text-center p-4 mt-3">
          <h5 class="fw-bold mb-0">Majiid Reza Herlambang</h5>
          <small>Back-end Developer</small>
        </div>
      </div>
    </div>

    <!-- Card 6 -->
    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
      <div class="team-item rounded overflow-hidden">
        <div class="position-relative">
          <img class="img-fluid" src="<?= base_url() ?>frontend/img/sarep.JPG" alt="">
          <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="text-center p-4 mt-3">
          <h5 class="fw-bold mb-0">Muhammad Najwa Syarif</h5>
          <small>Front-end Developer</small>
        </div>
      </div>
    </div>

    <!-- Card 7 -->
    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
      <div class="team-item rounded overflow-hidden">
        <div class="position-relative">
          <img class="img-fluid" src="<?= base_url() ?>frontend/img/untitled.jpg" alt="">
          <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-square mx-1" href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
        <div class="text-center p-4 mt-3">
          <h5 class="fw-bold mb-0">Gani Maulana</h5>
          <small>Back-end Developer</small>
        </div>
      </div>
    </div>

    <!-- Card 8 -->
   
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Team End -->


<!-- Testimonial Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="mb-3">Testimoni!</h1>
            <p>Kami bangga bisa menjadi bagian dari perjalanan mereka. Yuk, intip apa kata mereka tentang pengalaman bersama Lapak Siswa
</p>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Kualitas produk dari siswa-siswi SMK ternyata keren banget! Aku beli tas rajut dari Lapak Siswa, hasilnya rapi dan unik. Bangga bisa dukung karya anak muda Indonesia.</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded"
                            src="<?= base_url() ?>frontend/img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Dewi</h6>
                            <small>Ibu Rumah Tangga</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Lewat Lapak Siswa, aku bisa jualan kerajinan tangan hasil praktik di sekolah. Gak nyangka, udah banyak yang beli! Sekarang aku jadi makin semangat belajar wirausaha.</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded"
                            src="<?= base_url() ?>frontend/img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Aditya</h6>
                            <small>Siswa SMK</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Lapak Siswa jadi wadah luar biasa bagi anak-anak kami untuk belajar langsung di dunia nyata. Mereka belajar tentang pemasaran, pelayanan pelanggan, hingga pengemasan produk.</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded"
                            src="<?= base_url() ?>frontend/img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Ari</h6>
                            <small>Guru Kewirausahaan SMK</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <p>Saya bangga anak saya bisa punya penghasilan sendiri dari hasil karyanya. Lapak Siswa sangat membantu membentuk mental wirausaha sejak dini.</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded"
                            src="<?= base_url() ?>frontend/img/rini.jpg" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">Rini</h6>
                            <small>Orang tua anak murid SMK</small>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- Testimonial End -->



<?php include("LayOutTemplate/footer.php"); ?>