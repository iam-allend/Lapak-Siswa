<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="manage-siswa/create">
                <button class="btn btn-primary"><i class='bx bx-user-plus'></i> Tambah</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-primary">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Data Siswa</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Profil</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Kelas</th>
                            <th>Gender</th>
                            <th>Pembimbing</th>
                            <th>Kelompok</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($siswas as $siswa): ?>
                        <tr>
                            <td>
                                <div class="m-0 avatar-group d-flex align-items-center me-3 p-0">
                                <?php if ($siswa['url_image']): ?>
                                    <a target="_blank" href="<?= base_url() ?><?= $siswa['url_image']?>" class="avatar avatar-xs pull-up">
                                        <img src="<?= base_url() ?><?= $siswa['url_image']?>" alt="Avatar" class="rounded-circle" />
                                    </a>
                                <?php else: ?>
                                    <span class="badge bg-label-danger">unSet</span>
                                <?php endif; ?>
                                </div>
                            </td>
                            <td>
                                <span data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="<?= $siswa['full_name'] ?>">
                                   <?= $siswa['username'] ?></td>
                               </span>
                            <td><?= $siswa['email'] ?></td>
                            <td>
                                <span data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="<?= $siswa['wali_kelas'] ?>">
                                   <?= $siswa['kelas'] ?>
                                </span>
                            </td>
                            <td><?= $siswa['gender'] ?></td>
                            <td><?= $siswa['nama_admin'] ?></td> <!-- Anda mungkin perlu mengganti ini dengan nama admin -->
                            <td><?= $siswa['group_name'] ?></td> <!-- Anda mungkin perlu mengganti ini dengan nama kelompok -->
                            <td>
                                <div class="m-0 avatar-group d-flex align-items-center me-3">
                                    <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="pull-up" title="Tgl Daftar : <?= $siswa['created_at'] ?>">
                                        <span class="badge <?= $siswa['status_registrasi'] == 1 ? 'bg-label-success' : 'bg-label-danger' ?> me-1">
                                            <?= $siswa['status_registrasi'] == 1 ? 'Registered' : 'Not Registered' ?>
                                        </span>                                    
                                    </a>
                                </div>
                            </td>
                            <td>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Edit" href="<?= base_url('manage-siswa/edit/' . $siswa['id_siswa']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Hapus"  href="<?= base_url('manage-siswa/delete/' . $siswa['id_siswa']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
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