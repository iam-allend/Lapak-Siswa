<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="manage-kelas/create">
                <button class="btn btn-primary"><i class='bx bx-user-plus'></i> Tambah</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-primary">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Data kelas</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Dibuat Pada</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($kelass as $kelas): ?>
                        <tr>
                            <td><?= $kelas['id_kelas'] ?></td>
                            <td><?= $kelas['nama'] ?></td> <!-- Anda mungkin perlu mengganti ini dengan nama admin -->
                            <td><?= $kelas['wali_kelas'] ?></td> <!-- Anda mungkin perlu mengganti ini dengan nama kelompok -->
                            <td><?= $kelas['created_at'] ?></td>
                            <td>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Edit" href="<?= base_url('manage-kelas/edit/' . $kelas['id_kelas']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Hapus"  href="<?= base_url('manage-kelas/delete/' . $kelas['id_kelas']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
                                    <i class='bx bxs-trash-alt'></i>
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