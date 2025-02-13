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

                <form action="<?= base_url('manage-product-siswa/store') ?>" method="post" enctype="multipart/form-data">
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
                                <label for="id_admin" class="form-label">Admin Penanggung Jawab</label>
                                <select class="form-select" name="id_admin" required>
                                    <option value="">Pilih Admin</option>
                                    <?php foreach ($admins as $admin): ?>
                                        <option value="<?= $admin['id_admin'] ?>" <?= old('id_admin') == $admin['id_admin'] ? 'selected' : '' ?>>
                                            <?= esc($admin['full_name']) ?>
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
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga (Rp)</label>
                                <input type="number" class="form-control" name="price" id="price" value="<?= old('price') ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="discount" class="form-label">Diskon (%)</label>
                                <input type="number" class="form-control" name="discount" id="discount" value="<?= old('discount', 0) ?>">
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="price_final" class="form-label">Harga Akhir (Rp)</label>
                                        <input type="number" class="form-control" name="price_final" id="price_final" value="<?= old('price_final') ?>" readonly required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="pajak" class="form-label">Pajak</label>
                                        <input type="text" class="form-control" name="pajak" id="pajak" value="<?= $pajak['besaran'] ?? 0 ?>%" readonly required>
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
                    <a class="btn btn-outline-primary" href="<?= base_url()?>manage-product-siswa">Kembali</a>
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

        function calculatePriceFinal() {
            const price = parseFloat(priceInput.value) || 0;
            const discount = parseFloat(discountInput.value) || 0;
            const pajak = parseFloat(pajakInput.value) || 0;

            const subtotal = price - (price * (discount / 100));
            const priceFinal = subtotal - (subtotal * (pajak / 100));

            priceFinalInput.value = priceFinal.toFixed(2); // Format ke 2 angka di belakang koma
        }

        priceInput.addEventListener('input', calculatePriceFinal);
        discountInput.addEventListener('input', calculatePriceFinal);
        pajakInput.addEventListener('input', calculatePriceFinal);

        // Hitung price_final saat halaman pertama kali dimuat
        calculatePriceFinal();
    });
</script>

<?= $this->include('backend/layOutTemplate/footer'); ?>