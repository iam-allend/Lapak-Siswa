<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>

        <div class="card">
            <div class="card-body">
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('manage-product-indper/store') ?>" method="post" enctype="multipart/form-data">
                    <!-- Informasi Dasar Produk -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Nama Produk</label>
                                <input type="text" class="form-control" name="product_name" value="<?= old('product_name') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="id_kategori" class="form-label">Kategori</label>
                                <select class="form-select" name="id_kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategoris as $kategori): ?>
                                        <option value="<?= $kategori['id_kategori'] ?>" <?= old('id_kategori') == $kategori['id_kategori'] ? 'selected' : '' ?>>
                                            <?= esc($kategori['nama']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="id_industri" class="form-label">Industri/Perusahaan</label>
                                <select class="form-select" name="id_industri" required>
                                    <option value="">Pilih Industri/Perusahaan</option>
                                    <?php foreach ($industris as $industri): ?>
                                        <option value="<?= $industri['id_industri'] ?>" <?= old('id_industri') == $industri['id_industri'] ? 'selected' : '' ?>>
                                            <?= esc($industri['nama']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="stock" class="form-label">Stok</label>
                                <input type="number" class="form-control" name="stock" value="<?= old('stock') ?>" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="price" class="form-label">Harga (Rp)</label>
                                        <input type="number" class="form-control" name="price" id="price" value="<?= old('price', $product['price'] ?? 0) ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="discount" class="form-label">Diskon (%)</label>
                                        <input type="number" class="form-control" name="discount" id="discount" value="<?= old('discount', $product['discount'] ?? 0) ?>">
                                    </div>
                                </div>
                            </div>

                            <!-- Harga Akhir (Price - Discount) -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="price_final" class="form-label">Harga Akhir (Rp)</label>
                                        <input type="number" class="form-control" name="price_final" id="price_final" value="<?= old('price_final') ?>" readonly required>
                                    </div>
                                </div>
                            </div>

                            <!-- Pajak dan Uang Bersih -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="pajak" class="form-label">Pajak</label>
                                        <input type="text" class="form-control" name="pajak" id="pajak" value="<?= $pajak['besaran'] ?? 0 ?>%" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="uang_bersih" class="form-label">Uang Bersih yang Diterima (Rp)</label>
                                        <input type="text" class="form-control" name="uang_bersih" id="uang_bersih" value="Rp. 0" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label">Berat (gram)</label>
                                <input type="number" class="form-control" name="weight" value="<?= old('weight') ?>" required>
                            </div>
                        </div>
                    </div>

                    <!-- Deskripsi & Gambar -->
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" name="description" rows="3" required><?= old('description') ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Upload Gambar (Maksimal 6)</label>
                        <input type="file" class="form-control" name="images[]" accept="image/*" multiple required>
                        <small class="text-muted">Format: JPG/PNG, Maksimal 2MB per gambar</small>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="expired" class="form-label">Tanggal Kedaluwarsa</label>
                                <input type="date" class="form-control" name="expired" value="<?= old('expired') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Status -->
                            <div class="mb-3">
                                <label for="status_registrasi" class="form-label">Status</label>
                                <select class="form-select" name="status_registrasi" required>
                                    <option value="1" <?= old('status_registrasi') == 1 ? 'selected' : '' ?>>Aktif</option>
                                    <option value="0" <?= old('status_registrasi') == 0 ? 'selected' : '' ?>>Non-Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah Produk</button>
                    <a class="btn btn-outline-primary" href="<?= base_url()?>manage-product-indper">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const priceInput = document.getElementById('price');
        const discountInput = document.getElementById('discount');
        const priceFinalInput = document.getElementById('price_final');
        const pajakInput = document.getElementById('pajak');
        const uangBersihInput = document.getElementById('uang_bersih');

        function calculateFinalPriceAndNetAmount() {
            const price = parseFloat(priceInput.value) || 0;
            const discount = parseFloat(discountInput.value) || 0;
            const pajak = parseFloat(pajakInput.value) || 0;

            // Hitung harga akhir (price - discount)
            const priceFinal = price - (price * (discount / 100));
            priceFinalInput.value = priceFinal.toFixed(2);

            // Hitung uang bersih (harga akhir - pajak)
            const uangBersih = priceFinal - (priceFinal * (pajak / 100));
            uangBersihInput.value = `Rp. ${uangBersih.toLocaleString('id-ID')}`;
        }

        priceInput.addEventListener('input', calculateFinalPriceAndNetAmount);
        discountInput.addEventListener('input', calculateFinalPriceAndNetAmount);
        pajakInput.addEventListener('input', calculateFinalPriceAndNetAmount);

        // Hitung saat halaman pertama kali dimuat
        calculateFinalPriceAndNetAmount();
    });
</script>

<?= $this->include('backend/layOutTemplate/footer'); ?>