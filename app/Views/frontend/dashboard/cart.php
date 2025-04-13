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
                <?php foreach($cart as $value){?>
                <div class="col-12">
                  <div class="card mb-3">

                    <div class="row g-0">
                      <div class="col-5 col-sm-4">
                      <?php 
                        $imageUrl = (isset($value['images']['url']) && $value['images']['url'] !== null) 
                            ? base_url($value['images']['url']) 
                            : base_url('logo/logo-blue.webp'); 
                        ?>
                        <img class="card-img card-img-left" src="<?= $imageUrl ?>" alt="Card image" />
                      </div>
                      <div class="col-7 col-sm-8">

                        <div class="card-body p-3 pb-2 pt-3 pt-sm-4 position-relative">
                          <p class="card-title fs-5 pt-0 mb-1 fw-bold"><?= $value['product_name']?></p>
                          <p class="card-text position-absolute top-0 end-0"><span class="bg-warning px-2 py-1 text-white rounded-1">-<?= $value['discount']?>%</span></p>
                          
                          <div class="row px-3">
                            <div class="p-0 m-0 col-7 col-sm-7">
                            <input disabled type="text" 
                                class="form-control border-0 rounded-2 text-danger fw-semibold discount-amount" 
                                value="-Rp. <?= number_format(($value['price'] * ($value['discount'] / 100)) * $value['quantity'], 0, ',', '.') ?>" 
                                data-price="<?= $value['price'] ?>" 
                                data-disc="<?= $value['discount']?>"
                                data-quantity="<?= $value['quantity'] ?>">
                            </div>
                            <div class="p-0 m-0 col-2 col-sm-1">
                              <span class="form-control border-0 px-2 text-center">x</span>
                            </div>
                            <div class="p-0 m-0 col-3 col-sm-4">
                            <input type="number" min="1" class="form-control border-1 rounded-2 quantity-input" 
                                              value="<?= $value['quantity']?>" 
                                              data-id="<?= $value['cart_id']?>"
                                              data-disc="<?= $value['discount']?>"
                                              data-price="<?= $value['price'] ?>">
                            </div>
                          </div>


                          <div class="row px-3 d-flex justify-content-between content-between">
                            <div class="p-0 m-0 col-7 col-sm-7 my-1">
                            <?php
                              $price = $value['price'];
                              $discount = $value['discount'] / 100;
                              $discountedPrice = $price - ($price * $discount);
                              $total = $discountedPrice * $value['quantity'];
                            ?>
                            <input disabled 
                                  type="text" 
                                  id="qty1"
                                  class="form-control border-0 rounded-2 text-primary total-harga-per-item" 
                                  value="<?= 'Rp. ' . number_format($total, 0, ',', '.') ?>" 
                                  data-disc="<?= $value['discount']?>"
                                  data-id="<?= $value['cart_id'] ?>">

                            </div>
                            <div class="p-0 m-0 col-3 col-sm-4 my-1">
                              <?= form_open(base_url('cart/hapusCart/'. $value['cart_id']))?>
                                <button type="submit" class="d-flex justify-content-center nowrap w-100 btn btn-danger text-center px-2">
                                    <i class="me-2 bi bi-trash3"></i>
                                    <span class="d-none d-sm-block">Hapus</span>
                                </button>
                              <?= form_close()?>
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
                <?php }?>

                </div>
              </div>
            </div>

            <div class="col-12 col-lg-5 position-relative py-0">
              <div class="main-checkout position-relative text-center text-lg-start bg-white">
                <div class="checkout rounded-3 border p-2 p-md-4 py-2 my-3">
                  <span class="fs-3 fw-bold">Pesanan Kamu</span> 
                  <p class="fs-5 text-primary">Total : <span id="totalHarga">Rp. 0</span></p>
                  <hr>  
                  <div class="btn btn-primary w-100" data-bs-toggle="modal"
                  data-bs-target="#basicModal">Berikutnya</div>
                </div>
              </div>
            </div>
            
          </div>
          <!--/ Horizontal -->  

        </div>
    </div>
    <?php
    $totalProduk = 0;
    foreach ($cart as $item) {
        $totalProduk += $item['quantity'];
    }
    ?>

                        <!-- Modal -->
                        <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi pembayaran</h5>
                                <button
                                  type="button"
                                  class="btn-close"
                                  data-bs-dismiss="modal"
                                  aria-label="Close"
                                ></button>
                              </div>
                              
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col mb-0">
                                    <tr>
                                      <td><label class="form-label">jumlah diskon</label></td>
                                    </tr>
                                    <tr>
                                      <td> : </td>
                                    </tr>
                                    <tr>
                                      <td><span class="totalDiskon"></span></td>
                                    </tr>
                                    <!-- <label for="nameBasic" class="form-label">total diskon</label><br>
                                    <span>9000</span> -->
                                    <!-- <input type="text" id="nameBasic" class="form-control" placeholder="Enter Name" /> -->
                                  </div>
                                  <div class="col">
                                    <tr>
                                      <td><label class="form-label">Jumlah produk</label></td>
                                    </tr>
                                    <tr>
                                      <td> x </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <span id="totalProduk"></span>
                                      </td>
                                    </tr>
                                  </div>
                                  
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <tr>
                                      <td><label class="form-label">Total pesanan</label></td>
                                    </tr>
                                    <tr>
                                      <td> : </td>
                                    </tr>
                                    <tr>
                                      <td><span class="totalHarga">Rp. 0</span></td>
                                    </tr>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col mb-3">
                                    <label class="form-label">Pembayaran via</label>
                                    <select class="form-select" name="id_bank" required>
                                        <?php foreach ($banks as $bank): ?>
                                        <option value="<?= $bank['id_bank'] ?>">
                                            <?= $bank['nama_bank'] ?> - <?= $bank['nomor_rekening'] ?> - <?= $bank['atas_nama'] ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                  </div>
                                  
                                  
                                </div>
                                <div class="row">
                                  <div class="col mb-0">
                                    <input type="hidden" id="saldo_user" value="<?= $saldo['saldo'] ?? 0 ?>">
                                    <label class="form-label">Saldo anda</label>
                                    <p id="statusSaldo" class="fs-4">Rp. <?= number_format($saldo['saldo'] ?? 0, 0, ',', '.') ?></p>
                                  </div>
                                  <!-- <div class="col mb-0">
                                    
                                  </div> -->
                                </div>
                              </div>
                              <?= form_open(base_url('cart/checkout'))?>
                                <?php foreach($cart as $value){?>
                                  <?php
                                    $price = $value['price'] * ($value['discount'] / 100);
                                    $totalP = ($value['price'] * $value['quantity']) * ($value['discount'] / 100);
                                    ?>
                                    <?php
                                    $cartId = $value['cart_id'];
                                    $price = $value['price'];
                                    $discount = $value['discount'] / 100;
                                    $discountedPrice = $price - ($price * $discount);

                                    $total = $discountedPrice * $value['quantity'];
            
                                  ?>
                                  <input type="hidden" name="id_produk[]" value="<?= $value['id_product']?>">
                                  <input type="hidden" name="id_admin[]" value="<?= $value['id_admin']?>">
                                  <input type="hidden" name="id_customer[]" value="<?= session('id_customer')?>">
                                  <input type="hidden" name="qty[]" value="<?= $value['quantity']?>">
                                  <input type="hidden" name="harga[]" value="<?= $discountedPrice ?>">
                                  <input 
                                    type="hidden" 
                                    class="total-item" 
                                    name="totalItem[]" 
                                    data-id="<?= $cartId ?>" 
                                    value="<?= $total ?>" 
                                    readonly
                                  >
                                <?php }?>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                  Close
                                </button>
                                <button type="submit" class="btn btn-primary">Konfirmasi</button>
                              </div>
                              <?= form_close()?>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <script>
function hitungTotalProduk() {
  let totalProduk = 0;
  document.querySelectorAll('.quantity-input').forEach(input => {
    const qty = parseInt(input.value) || 0;
    totalProduk += qty;
  });

  const totalProdukDisplay = document.getElementById('totalProduk');
  if (totalProdukDisplay) {
    totalProdukDisplay.textContent = totalProduk;
  }
}

// Jalankan saat halaman pertama kali dimuat
window.addEventListener('DOMContentLoaded', hitungTotalProduk);

// Jalankan setiap kali quantity berubah
document.querySelectorAll('.quantity-input').forEach(input => {
  input.addEventListener('input', function () {
    hitungTotalProduk();
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const qtyInputs = document.querySelectorAll('.quantity-input');

  qtyInputs.forEach(input => {
    input.addEventListener('input', function () {
      const cartId = this.dataset.id;
      const quantity = parseInt(this.value) || 0;
      const price = parseFloat(this.dataset.price) || 0;
      const discount = parseFloat(this.dataset.disc) || 0;

      const discountedPrice = price - (price * (discount / 100));
      const total = discountedPrice * quantity;

      const totalItemInput = document.querySelector(`.total-item[data-id="${cartId}"]`);
      if (totalItemInput) {
        totalItemInput.value = total;
      }
    });

    // Trigger hitung awal saat halaman dimuat
    input.dispatchEvent(new Event('input'));
  });
});
  


  document.addEventListener('DOMContentLoaded', function () {
  const saldoEl = document.getElementById('saldo_user');
  const statusSaldoEl = document.getElementById('statusSaldo');
  const totalHargaEl = document.getElementById('totalHarga');
  
  function updateWarnaSaldo() {
    const saldo = parseFloat(saldoEl.value);
    const totalHarga = parseFloat(totalHargaEl.dataset.total) || 0;

    if (saldo >= totalHarga) {
      // saldo cukup: hijau
      statusSaldoEl.classList.remove('text-danger');
      statusSaldoEl.classList.add('text-success');
    } else {
      // saldo kurang: merah
      statusSaldoEl.classList.remove('text-success');
      statusSaldoEl.classList.add('text-danger');
    }
  }

  // Trigger saat halaman dimuat
  updateWarnaSaldo();

  // Jika total harga bisa berubah (misal: qty berubah), pantau totalHarga
  document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('input', function () {
      const cartId = this.dataset.id;
      const quantity = parseInt(this.value) || 0;
      const price = parseFloat(this.dataset.price) || 0;
      const discount = parseFloat(this.dataset.disc) || 0;

      const discountedPrice = price - (price * discount / 100);
      const totalItem = discountedPrice * quantity;

      // Update total item
      const totalItemInput = document.querySelector(`.total-item[data-id="${cartId}"]`);
      if (totalItemInput) {
        totalItemInput.value = totalItem;
      }

      // Hitung total semua
      let totalSemua = 0;
      document.querySelectorAll('.total-item').forEach(item => {
        totalSemua += parseFloat(item.value) || 0;
      });

      totalHargaEl.dataset.total = totalSemua;
      totalHargaEl.textContent = `Rp. ${totalSemua.toLocaleString('id-ID')}`;

      // Update warna saldo
      updateWarnaSaldo();
    });
  });
});

</script>


<?= $this->include('frontend/dashboard/f_cart')?>
<?= $this->include('frontend\dashboard\layOutTemplate\footer'); ?>