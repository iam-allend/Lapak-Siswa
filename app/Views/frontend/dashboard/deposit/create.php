<?= $this->include('frontend\dashboard\layOutTemplate\header'); ?>
<?= $this->include('frontend\dashboard\layOutTemplate\sidebar'); ?>

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
                <form action="<?= base_url('deposit/store') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    
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
                        <label class="form-label">Jumlah Deposit (Rp)</label>
                        <input type="number" class="form-control" name="jumlah_deposit" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Bukti Transfer</label>
                        <input type="file" class="form-control" name="bukti_transfer" required>
                        <div class="form-text">Format: JPG/PNG, maksimal 2MB</div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Ajukan Deposit</button>
                    <a href="<?= base_url('deposit') ?>" class="btn btn-outline-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('frontend\dashboard\layOutTemplate\footer'); ?>