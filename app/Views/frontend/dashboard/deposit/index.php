<?= $this->include('frontend\dashboard\layOutTemplate\header'); ?>
<?= $this->include('frontend\dashboard\layOutTemplate\sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="<?= base_url('deposit/create') ?>">
                <button class="btn btn-primary"><i class='bx bx-plus'></i> Ajukan Deposit</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Riwayat Deposit</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Bank Tujuan</th>
                            <th>Jumlah Deposit</th>
                            <th>Status</th>
                            <th>Bukti Transfer</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($deposits as $deposit): ?>
                        <tr>
                            <td>
                                <strong><?= $deposit['nama_bank'] ?></strong><br>
                                <?= $deposit['nomor_rekening'] ?>
                            </td>
                            <td>Rp <?= number_format($deposit['jumlah_deposit'], 0) ?></td>
                            <td>
                                <span class="badge bg-<?= $deposit['status'] == 'pending' ? 'warning' : 'success' ?>">
                                    <?= ucfirst($deposit['status']) ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= base_url($deposit['bukti_transfer']) ?>" target="_blank">
                                    <img src="<?= base_url($deposit['bukti_transfer']) ?>" width="80" class="img-thumbnail">
                                </a>
                            </td>
                            <td><?= date('d M Y H:i', strtotime($deposit['created_at'])) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->include('frontend\dashboard\layOutTemplate\footer'); ?>