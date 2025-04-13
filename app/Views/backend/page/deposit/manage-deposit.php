<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="<?= base_url('manage-deposit/create') ?>">
                <button class="btn btn-primary"><i class='bx bx-plus'></i> Tambah</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-primary"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Daftar Deposit</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Customer</th>
                            <th>Bank Tujuan</th>
                            <th>Jumlah Deposit</th>
                            <th>Saldo Masuk</th>
                            <th>Status</th>
                            <th>Bukti Transfer</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($deposits as $deposit): ?>
                        <tr>
                            <td><?= $deposit['full_name'] ?></td>
                            <td><?= $deposit['nama_bank'] ?><br><?= $deposit['nomor_rekening'] ?></td>
                            <td>Rp <?= number_format($deposit['jumlah_deposit'], 0) ?></td>
                            <td><?= $deposit['saldo_masuk'] ? 'Rp '.number_format($deposit['saldo_masuk'],0) : '-' ?></td>
                            <td>
                                <span class="badge bg-<?= $deposit['status'] == 'pending' ? 'warning' : 'success' ?>">
                                    <?= ucfirst($deposit['status']) ?>
                                </span>
                            </td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center text-center">
                                    <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up text-center m-auto" title="Foto Produk">
                                        <a href="<?= base_url($deposit['bukti_transfer']) ?>" class="text-center m-auto" target="_blank">
                                            <img class="rounded-circle" src="<?= base_url($deposit['bukti_transfer']) ?>" width="100">
                                        </a>
                                    </li>
                                </ul>
                            </td>
                            <td><?= date('d M Y H:i', strtotime($deposit['created_at'])) ?></td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="<?= $deposit['status'] != 'success' ? base_url("manage-deposit/edit/{$deposit['id_deposit']}") : '#' ?>" 
                                    class="btn btn-outline-primary text-decoration-none <?= $deposit['status'] == 'success' ? 'disabled' : '' ?>"
                                    data-bs-toggle="tooltip"
                                    title="<?= $deposit['status'] == 'success' ? 'Deposit success, tidak dapat diubah' : 'Edit data' ?>">
                                    <i class='bx bx-edit'></i>
                                </a>

                                <!-- Tombol Hapus -->
                                <a href="<?= $deposit['status'] != 'success' ? base_url("manage-deposit/delete/{$deposit['id_deposit']}") : '#' ?>" 
                                    class="btn btn-outline-danger text-decoration-none <?= $deposit['status'] == 'success' ? 'disabled' : '' ?>"
                                    data-bs-toggle="tooltip"
                                    title="<?= $deposit['status'] == 'success' ? 'Deposit success, tidak dapat dihapus' : 'Hapus data' ?>"
                                    onclick="<?= $deposit['status'] == 'success' 
                                        ? 'return false' 
                                        : "return confirm('Deposit PENDING, menghapus data mungkin merugikan customer')" ?>">
                                    <i class='bx bx-trash'></i>
                                </a>
                            </td>



                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>