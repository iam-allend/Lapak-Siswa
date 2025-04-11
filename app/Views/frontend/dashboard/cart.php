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
                <div class="cart-container">
                <!-- perulangan produk cart disini -->
                 <?= $this->include('frontend/dashboard/cart_produk')?>
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