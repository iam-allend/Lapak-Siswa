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
                                <div class="m-0 avatar-group d-flex align-items-center me-3">
                                    <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="<?= $siswa['full_name'] ?>">
                                        <img src="<?= base_url() ?><?= $siswa['url_image']?>" alt="Avatar" class="rounded-circle" />
                                    </a>
                                </div>
                            </td>
                            <td><?= $siswa['username'] ?></td>
                            <td><?= $siswa['email'] ?></td>
                            <td><?= $siswa['kelas'] ?></td>
                            <td><?= $siswa['gender'] ?></td>
                            <td><?= $siswa['nama_admin'] ?></td> <!-- Anda mungkin perlu mengganti ini dengan nama admin -->
                            <td><?= $siswa['group_name'] ?></td> <!-- Anda mungkin perlu mengganti ini dengan nama kelompok -->
                            <td>
                                <span class="badge <?= $siswa['status_registrasi'] == 1 ? 'bg-label-success' : 'bg-label-danger' ?> me-1">
                                    <?= $siswa['status_registrasi'] == 1 ? 'Registered' : 'Not Registered' ?>
                                </span>
                            </td>
                            <td>
                                <a href="<?= base_url('manage-siswa/edit/' . $siswa['id_siswa']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a href="<?= base_url('manage-siswa/delete/' . $siswa['id_siswa']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
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