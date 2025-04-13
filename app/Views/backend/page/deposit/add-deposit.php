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
                <form action="<?= base_url('manage-deposit/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label">Customer</label>
                        <select class="form-select" name="id_customer" required>
                            <?php foreach ($customers as $customer): ?>
                            <option value="<?= $customer['id_customer'] ?>">
                                <?= $customer['full_name'] ?> (<?= $customer['email'] ?>)
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Bank Tujuan</label>
                        <select class="form-select" name="id_bank" required>
                            <?php foreach ($banks as $bank): ?>
                            <option value="<?= $bank['id_bank'] ?>">
                                <?= $bank['nama_bank'] ?> - <?= $bank['nomor_rekening'] ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jumlah Deposit</label>
                        <input type="number" class="form-control" name="jumlah_deposit" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select" name="status" id="statusSelect" required>
                            <option value="pending">Pending</option>
                            <option value="success">Success</option>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="saldoMasukField" style="display: none;">
                        <label class="form-label">Saldo Masuk</label>
                        <input type="number" class="form-control" name="saldo_masuk">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Bukti Transfer</label>
                        <input type="file" class="form-control" name="bukti_transfer" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('manage-deposit') ?>" class="btn btn-outline-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('statusSelect').addEventListener('change', function() {
    const saldoField = document.getElementById('saldoMasukField');
    saldoField.style.display = this.value === 'success' ? 'block' : 'none';
    if (this.value === 'success') {
        document.querySelector('[name="saldo_masuk"]').setAttribute('required', 'required');
    } else {
        document.querySelector('[name="saldo_masuk"]').removeAttribute('required');
    }
});
</script>

<?= $this->include('backend/layOutTemplate/footer'); ?>