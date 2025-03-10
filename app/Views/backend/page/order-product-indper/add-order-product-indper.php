<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Tambah Transaksi</h4>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('primary')): ?>
            <div class="alert alert-primary">
                <?= session()->getFlashdata('primary') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('manage-order-product-indper/store') ?>" method="post">
                    <!-- Pilih Produk -->
                    <div class="mb-3">
                        <label class="form-label">Pilih Produk</label>
                        <select class="form-select" name="id_product" id="productSelect" required>
                            <option value="">Pilih Produk</option>
                            <?php foreach ($products as $product): ?>
                                <option 
                                    value="<?= $product['id_product'] ?>" 
                                    data-price="<?= $product['price_final'] ?>"
                                    data-industri="<?= $product['id_industri'] ?>">
                                    <?= $product['product_name'] ?> - Rp <?= number_format($product['price_final']) ?> (Industri: <?= $product['nama_industri'] ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Quantity dan Total Harga -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Total Harga</label>
                                <input type="text" class="form-control" id="totalPrice" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Pilih Customer -->
                    <div class="mb-3">
                        <label class="form-label">Pilih Customer</label>
                        <select class="form-select" name="id_customer" id="customerSelect" required>
                            <option value="">Pilih Customer</option>
                            <?php foreach ($customers as $customer): ?>
                                <option 
                                    value="<?= $customer['id_customer'] ?>" 
                                    data-saldo="<?= $customer['saldo'] ?>">
                                    <?= $customer['username'] ?> (Saldo: Rp <?= number_format($customer['saldo']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Input Hidden untuk id_industri -->
                    <input type="hidden" name="id_industri" id="id_industri">

                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                    <a class="btn btn-outline-primary" href="<?= base_url() ?>manage-order-product-indper">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const productSelect = document.getElementById('productSelect');
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('totalPrice');
        const customerSelect = document.getElementById('customerSelect');
        const idIndustriInput = document.getElementById('id_industri');

        // Fungsi untuk menghitung total harga dan update id_industri
        function calculateTotalPrice() {
            const selectedProduct = productSelect.options[productSelect.selectedIndex];
            const price = parseFloat(selectedProduct?.dataset.price || 0);
            const quantity = parseFloat(quantityInput.value || 0);
            const idIndustri = selectedProduct?.dataset.industri || "";

            // Update total harga dan id_industri
            totalPriceInput.value = `Rp ${(price * quantity).toLocaleString('id-ID')}`;
            idIndustriInput.value = idIndustri;
        }

        // Event listener untuk perubahan produk/quantity
        productSelect.addEventListener('change', calculateTotalPrice);
        quantityInput.addEventListener('input', calculateTotalPrice);

        // Validasi saldo saat submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const price = parseFloat(productSelect.options[productSelect.selectedIndex]?.dataset.price || 0);
            const quantity = parseFloat(quantityInput.value || 0);
            const totalPrice = price * quantity;

            // Ambil saldo customer dari data attribute
            const selectedCustomer = customerSelect.options[customerSelect.selectedIndex];
            const customerSaldo = parseFloat(selectedCustomer.dataset.saldo || 0);

            // Validasi saldo
            if (customerSaldo < totalPrice) {
                e.preventDefault();
                alert('Saldo customer tidak mencukupi!');
            }
        });
    });
</script>

<?= $this->include('backend/layOutTemplate/footer'); ?>