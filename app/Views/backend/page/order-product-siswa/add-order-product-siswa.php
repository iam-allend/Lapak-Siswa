<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> Tambah Transaksi</h4>

        <div class="card">
            <div class="card-body">
                <form action="<?= base_url('manage-transaksi-siswa/store') ?>" method="post">
                    <!-- Pilih Produk -->
                    <div class="mb-3">
                        <label class="form-label">Pilih Produk</label>
                        <select class="form-select" name="id_product" id="productSelect" required>
                            <option value="">Pilih Produk</option>
                            <?php foreach ($products as $product): ?>
                                <option 
                                    value="<?= $product['id_product'] ?>" 
                                    data-price="<?= $product['price_final'] ?>"
                                    data-admin="<?= $product['nama_admin'] ?>"
                                >
                                    <?= $product['product_name'] ?> - Rp <?= number_format($product['price_final']) ?> (Admin: <?= $product['nama_admin'] ?>)
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
                                <option value="<?= $customer['id_customer'] ?>">
                                    <?= $customer['username'] ?> (Saldo: Rp <?= number_format($customer['saldo']) ?>)
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                    <a class="btn btn-outline-primary" href="<?= base_url() ?>manage-order-product-siswa">Kembali</a>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Logika perhitungan total harga dan validasi saldo
    document.addEventListener('DOMContentLoaded', function() {
        const productSelect = document.getElementById('productSelect');
        const quantityInput = document.getElementById('quantity');
        const totalPriceInput = document.getElementById('totalPrice');
        const customerSelect = document.getElementById('customerSelect');

        function calculateTotalPrice() {
            const price = productSelect.options[productSelect.selectedIndex]?.dataset.price || 0;
            const quantity = quantityInput.value || 0;
            totalPriceInput.value = `Rp ${(price * quantity).toLocaleString('id-ID')}`;
        }

        productSelect.addEventListener('change', calculateTotalPrice);
        quantityInput.addEventListener('input', calculateTotalPrice);

        // Validasi saldo saat submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const totalPrice = parseFloat(productSelect.options[productSelect.selectedIndex].dataset.price) * parseFloat(quantityInput.value);
            const customerSaldo = parseFloat(customerSelect.options[customerSelect.selectedIndex].dataset.saldo || 0);

            if (customerSaldo < totalPrice) {
                e.preventDefault();
                alert('Saldo customer tidak mencukupi!');
            }
        });
    });
</script>

<?= $this->include('backend/layOutTemplate/footer'); ?>