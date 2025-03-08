<?= $this->include('frontend\dashboard\layOutTemplate\header'); ?>
<?= $this->include('frontend\dashboard\layOutTemplate\sidebar'); ?>

<style>
  *{
    scroll-behavior: smooth !important;
  }
  /* Untuk browser WebKit (Chrome, Safari, Opera) */
.data-cart::-webkit-scrollbar {
  width: 8px;
  background-color: transparent;
}

.data-cart::-webkit-scrollbar-track {
  background-color: transparent;
}

.data-cart::-webkit-scrollbar-thumb {
  background-color: rgba(0,0,0,0.2);
  border-radius: 4px;
}

/* Untuk Firefox */
.data-cart {
  scrollbar-width: thin;
  scrollbar-color: rgba(0,0,0,0.2) transparent;
}
</style>

    <div class="content-wrapper position-relative">
        <div class="container-xxl flex-grow-1 container-p-y pb-0 position-relative">

          <div class="d-none d-sm-flex justify-content-between">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Keranjang</h4>
          </div>
          
          <!-- Horizontal -->
          <div class="row mb-5 position-relative">
            
            <div class="col-12 col-lg-7">
              <div class="row data-cart" style="overflow-y: auto; max-height: 70vh; ">

                <!-- perulangan produk cart disini -->
                <div class="col-12">
                  <div class="card mb-3">

                    <div class="row g-0">
                      <div class="col-5 col-sm-4">
                        <img class="card-img card-img-left" src="<?= base_url()?>backend/assets/img/elements/12.jpg" alt="Card image" />
                      </div>
                      <div class="col-7 col-sm-8">

                        <div class="card-body p-3 pb-2 pt-3 pt-sm-4 position-relative">
                          <p class="card-title fs-5 pt-0 mb-1 fw-bold">Nama Produk</p>
                          <p class="card-text position-absolute top-0 end-0"><span class="bg-warning px-2 py-1 text-white rounded-1">-15%</span></p>
                          
                          <div class="row px-3">
                            <div class="p-0 m-0 col-7 col-sm-7">
                              <input disabled type="text" class="form-control border-0 rounded-2" value="Rp. 20.000">
                            </div>
                            <div class="p-0 m-0 col-2 col-sm-1">
                              <span class="form-control border-0 px-2 text-center">x</span>
                            </div>
                            <div class="p-0 m-0 col-3 col-sm-4">
                              <input type="number" class="form-control border-1 rounded-2" value="2">
                            </div>
                          </div>


                          <div class="row px-3 d-flex justify-content-between content-between">
                            <div class="p-0 m-0 col-7 col-sm-7 my-1">
                              <input disabled type="text" class="form-control border-0 rounded-2 text-primary" value="Rp. 40.000">
                            </div>
                            <div class="p-0 m-0 col-3 col-sm-4 my-1">
                              <div class="d-flex justify-content-center nowrap w-100 btn btn-primary text-center px-2">
                                <i class="me-2 bi bi-trash3"></i>
                                <span class="d-none d-sm-block">Hapus</span>
                              </div>
                            </div>
 
                          </div>
                          
                          <hr class="d-none d-md-block mb-1">

                          <div class="d-flex d-sm-grid text-start justify-content-start ps-2">
                            <small class="w-fit d-flex nowrap flex-fill text-start p-0">
                            <i class="me-2 bi bi-box-seam"></i>380 <span class="ms-1 d-none d-md-block"> tersisa</span></small>
                            <small class="w-fit d-flex nowrap flex-fill text-start p-0">
                            <i class="me-2 bi bi-tags"></i>30 <span class="ms-1 d-none d-md-block"> terjual</span></small>
                          </div>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>

            <div class="col-12 col-lg-5 position-relative py-0">
              <div class="main-checkout position-relative text-center text-lg-start bg-white">
                <div class="checkout rounded-3 border p-2 p-md-4 py-2 my-3">
                  <span class="fs-3 fw-bold">Pesanan Kamu</span> 
                  <p class="fs-5 text-primary">Total : Rp. 80.000, 00</p>
                  <hr>  
                  <div class="btn btn-primary w-100">Bayar</div>
                </div>
              </div>
            </div>
            
          </div>
          <!--/ Horizontal -->  

        </div>
    </div>

<?= $this->include('frontend\dashboard\layOutTemplate\footer'); ?>