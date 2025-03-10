<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="manage-kategori-product/create">
                <button class="btn btn-primary"><i class='bx bx-user-plus'></i> Tambah</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-primary">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Data Kategori</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                            <th>Dibuat Pada</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($categories as $kategori): ?>
                        <tr>
                            <td><?= $kategori['id_kategori'] ?></td>
                            <td><?= $kategori['nama'] ?></td> <!-- Anda mungkin perlu mengganti ini dengan nama admin -->
                            <td><?= $kategori['created_at'] ?></td>
                            <td>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Edit" href="<?= base_url('manage-kategori-product/edit/' . $kategori['id_kategori']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Hapus"  href="<?= base_url('manage-kategori-product/delete/' . $kategori['id_kategori']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
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