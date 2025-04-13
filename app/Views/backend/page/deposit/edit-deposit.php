<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-body">

                <form action="<?= base_url('manage-deposit/update/' . $deposit['id_deposit']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>
                    <input type="hidden" name="old_bukti_transfer" value="<?= $deposit['bukti_transfer'] ?>">

                    <div class="mb-3">  
                        <label class="form-label">Customer</label>
                        <select class="form-select" name="id_customer_fake" disabled>
                            <?php foreach ($customers as $customer): ?>
                            <option value="<?= $customer['id_customer'] ?>" <?= $customer['id_customer'] == $deposit['id_customer'] ? 'selected' : '' ?>>
                                <?= $customer['full_name'] ?> (<?= $customer['email'] ?>)
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="id_customer" value="<?= $deposit['id_customer'] ?>">
                    </div>

                    <!-- Bank Tujuan (tidak bisa diubah, tapi datanya tetap dikirim) -->
                    <div class="mb-3">
                        <label class="form-label">Bank Tujuan</label>
                        <select class="form-select" name="id_bank_fake" disabled>
                            <?php foreach ($banks as $bank): ?>
                            <option value="<?= $bank['id_bank'] ?>" <?= $bank['id_bank'] == $deposit['id_bank'] ? 'selected' : '' ?>>
                                <?= $bank['nama_bank'] ?> - <?= $bank['nomor_rekening'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                        <input type="hidden" name="id_bank" value="<?= $deposit['id_bank'] ?>">
                    </div>

                    <!-- Jumlah Deposit (readonly, masih dikirim ke server) -->
                    <div class="mb-3">
                        <label class="form-label">Jumlah Deposit</label>
                        <input type="number" class="form-control" name="jumlah_deposit" value="<?= $deposit['jumlah_deposit'] ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Bukti Transfer</label>
                        <input hidden type="file" class="form-control" name="bukti_transfer">
                        <p hidden class="text-muted small">Format: JPG/PNG, maksimal 2MB</p>
                        <?php if ($deposit['bukti_transfer']): ?>
                            <div class="mt-2">
                                <a href="<?= base_url($deposit['bukti_transfer']) ?>" target="_blank">
                                    <img src="<?= base_url($deposit['bukti_transfer']) ?>" width="200" class="img-thumbnail rounded-2">
                                    <p class="text-muted small mt-1">File saat ini. Upload baru untuk mengganti.</p>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3" id="saldoMasukField" style="<?= $deposit['status'] == 'success' ? 'block' : 'none' ?>">
                        <label  class="form-label">Tambahkan Saldo ke Rekening Customer</label>
                        <input type="number" class="form-control" name="saldo_masuk" value="<?= $deposit['saldo_masuk'] ?? '' ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" id="statusSelect" required>
                            <option value="pending" <?= $deposit['status'] == 'pending' ? 'selected' : '' ?>>Pending</option>
                            <option value="success" <?= $deposit['status'] == 'success' ? 'selected' : '' ?>>Success</option>
                        </select>
                    </div>
                    
                    <script>
                        document.getElementById('statusSelect').addEventListener('change', function () {
                            if (this.value === 'success') {
                                const confirmChange = confirm("Mengubah status menjadi success akan menambahkan saldo ke rekening customer dan transaksi tidak dapat di ubah kembali. Lanjutkan?");
                                if (!confirmChange) {
                                    // Kembali ke "pending" jika user batalkan
                                    this.value = "pending";
                                }
                            }
                        });
                    </script>
                    
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin data sudah benar? cek kembali sebelum melanjutkan')">Update</button>
                    <a href="<?= base_url('manage-deposit') ?>" class="btn btn-outline-secondary" onclick="return confirm('Ingin kembali? Data tidak akan disimpan')">Kembali</a>
                </form>

            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('statusSelect').addEventListener('change', function() {
    const saldoField = document.getElementById('saldoMasukField');
    if (this.value === 'success') {
        saldoField.style.display = 'block';
        saldoField.querySelector('input').setAttribute('required', 'required');
    } else {
        saldoField.style.display = 'none';
        saldoField.querySelector('input').removeAttribute('required');
    }
});
</script>

<?= $this->include('backend/layOutTemplate/footer'); ?>