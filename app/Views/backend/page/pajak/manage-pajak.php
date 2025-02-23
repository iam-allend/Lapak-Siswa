<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="<?= base_url() ?>manage-pajak/create">
                <button class="btn btn-primary"><i class='bx bx-plus'></i> Tambah</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-primary">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Data Pajak</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Level User</th>
                            <th>Besaran (%)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($pajak as $p): ?>
                        <tr>
                            <td><?= $p['nama_level'] ?></td>
                            <td><?= $p['besaran'] ?></td>
                            <td>
                                <a href="<?= base_url('manage-pajak/edit/' . $p['id_pajak']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a href="<?= base_url('manage-pajak/delete/' . $p['id_pajak']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
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