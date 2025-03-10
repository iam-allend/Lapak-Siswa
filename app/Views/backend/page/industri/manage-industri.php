<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="manage-indper/create">
                <button class="btn btn-primary"><i class='bx bx-user-plus'></i> Tambah</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-primary">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Data Industri</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Profil</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Tipe</th>
                            <th>Penanggungjawab</th>
                            <th>Kerjasama</th>
                            <th>Selesai</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($industris as $industri): ?>
                        <tr>
                            <td>
                                <div class="m-0 avatar-group d-flex align-items-center me-3 p-0">
                                <?php if ($industri['url_image']): ?>
                                    <a target="_blank" href="<?= base_url() ?><?= $industri['url_image']?>" class="avatar avatar-xs pull-up">
                                        <img src="<?= base_url() ?><?= $industri['url_image']?>" alt="Avatar" class="rounded-circle" />
                                    </a>
                                <?php else: ?>
                                    <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up rounded w-100 p-0" title="<?= $industri['full_name'] ?>">
                                        <span class="badge bg-label-danger">unSet</span>
                                    </a>
                                <?php endif; ?>
                                </div>
                            </td>
                            <td> 
                                <span data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="" title="<?= $industri['nama'] ?>">
                                    <?= $industri['username'] ?></td>
                                </span>
                            <td><?= $industri['email'] ?></td>
                            <td><?= $industri['tipe_indper'] ?></td>
                            <td><?= $industri['nama_admin'] ?></td>
                            <td><?= $industri['tgl_mulai_kerjasama'] ?></td>
                            <td><?= $industri['tgl_selesai_kerjasama'] ?></td>
                            <td>
                                <div class="m-0 avatar-group d-flex align-items-center me-3">
                                    <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="pull-up" title="Tgl Daftar : <?= $industri['created_at'] ?>">
                                        <span class="badge <?= $industri['status_registrasi'] == 1 ? 'bg-label-success' : 'bg-label-danger' ?> me-1">
                                            <?= $industri['status_registrasi'] == 1 ? 'Registered' : 'Not Registered' ?>
                                        </span>                                    
                                    </a>
                                </div>
                            </td>
                            <td>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Edit" href="<?= base_url('manage-indper/edit/' . $industri['id_industri']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Hapus" href="<?= base_url('manage-indper/delete/' . $industri['id_industri']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
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