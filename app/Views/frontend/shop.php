<?php include("header.php"); ?>
<section class="sub-bnr">
  <div class="position-center-center">
    <div class="container">
      <h4>Shop</h4>
      <hr class="main">
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Shop</li>
      </ol>
    </div>
  </div>
  <div class="scroll"> <a href="#content" class="go-down"></a></div>
</section>
<section class="shop">
    <div class="container">
        <h2 class="text-center">Shop Produk</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card product-card">
                    <div id="productCarousel1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://i.pinimg.com/736x/92/43/2d/92432dc827012106d77e26c93da7f335.jpg" style="width: 80px;" class="d-block w-100" alt="Gambar 1">
                            </div>
                            <div class="carousel-item">
                                <img src="https://i.pinimg.com/236x/1e/87/6a/1e876a54f20a9470275d220a384d0ffa.jpg" style="width: auto;" class="d-block w-100" alt="Gambar 2">
                            </div>
                            <div class="carousel-item">
                                <img src="https://i.pinimg.com/736x/0a/0e/0f/0a0e0f317a9a71af4478829af4fe4466.jpg" style="width: auto;" class="d-block w-100" alt="Gambar 3">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel1" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Sepatu Sneakers</h5>
                        <p class="price">Rp250.000</p>
                        <a href="product-detail.html" class="btn btn-primary">Lihat Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include("footer.php"); ?>