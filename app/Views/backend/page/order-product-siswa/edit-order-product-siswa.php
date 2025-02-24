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

                <form action="<?= base_url('manage-order-product-siswa/update/' . $transaction['id_transaksi']) ?>" method="post">
                    <!-- Detail Transaksi -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Produk</label>
                                <input type="text" class="form-control" value="<?= $transaction['product_name'] ?> - Rp <?= number_format($transaction['price_at_transaction'], 0) ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Customer</label>
                                <input type="text" class="form-control" value="<?= $transaction['customer_name'] ?> (Saldo: Rp <?= number_format($transaction['saldo'], 0) ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Admin</label>
                                <input type="text" class="form-control" value="<?= $transaction['admin_name'] ?>" readonly>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Total Harga</label>
                                <input type="text" class="form-control" value="Rp <?= number_format($transaction['total_price'], 0) ?>" readonly>
                            </div>
                        </div>
                    </div>

                    <!-- Ubah Status -->
                    <div class="mb-3">
                        <label class="form-label">Status Transaksi</label>
                        <select class="form-select" name="status" required>
                            <option value="proses" <?= $transaction['status'] == 'proses' ? 'selected' : '' ?>>Proses</option>
                            <option value="selesai" <?= $transaction['status'] == 'selesai' ? 'selected' : '' ?>>Selesai</option>
                            <option value="belum dibayar" <?= $transaction['status'] == 'belum dibayar' ? 'selected' : '' ?>>Belum Dibayar</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Status</button>
                    <a class="btn btn-outline-primary" href="<?= base_url('manage-order-product-siswa') ?>">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>