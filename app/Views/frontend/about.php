<?php include("LayOutTemplate/header.php"); ?>


<!-- Header Start -->
<div class="container-fluid header bg-white p-4 ">
    <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
        <div class="col-md-6 p-5 mt-lg-5">
            <h1 class="display-5 animated fadeIn mb-4">About Us</h1>
            <nav aria-label="breadcrumb animated fadeIn">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="<?= base_url() ?>" >Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item text-body active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 animated fadeIn">
            <img class="img-fluid" src="<?= base_url('logo/logo-text-green.webp') ?>" alt="">
        </div>
    </div>
</div>
<!-- Header End -->


<!-- Search Start -->
<!-- <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <div class="row g-2">
            <div class="col-md-10">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword">
                    </div>
                    <div class="col-md-4">
                        <select class="form-select border-0 py-3">
                            <option selected>Property Type</option>
                            <option value="1">Property Type 1</option>
                            <option value="2">Property Type 2</option>
                            <option value="3">Property Type 3</option>
                        </select>
                    </div>
                    <div class="col-md-4">
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
</div> -->
<!-- Search End -->


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


<!-- Call to Action Start -->

<!-- Call to Action End -->


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
<?php include("LayOutTemplate/footer.php"); ?>