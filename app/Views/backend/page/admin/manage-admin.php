<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>
    
    <div class="content-wrapper">
                <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="d-flex justify-content-between">
                <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
                <a href="manage-admin/create">
                    <button class="btn btn-primary"><i class='bx bx-user-plus'></i> Tambah</button>
                </a>
            </div>

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-primary">
                    <?= session()->getFlashdata('success') ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <h5 class="card-header">Data Admin</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                        <tr>
                        <th>Profil</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      
                        <?php foreach ($admins as $admin): ?>
                        <tr>
                            <td>
                                <div class="m-0 avatar-group d-flex align-items-center me-3">
                                    <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="<?= $admin['full_name'] ?>">
                                        <img src="<?= base_url() ?><?= $admin['url_image']?>" alt="Avatar" class="rounded-circle" />
                                    </a>
                                </div>
                            </td>
                            <td><?= $admin['username'] ?></td>
                            <td><?= $admin['email'] ?></td>
                            <td><?= $admin['gender'] ?></td>
                            <td>
                                <span class="badge <?= $admin['status_registrasi'] == 1 ? 'bg-label-success' : 'bg-label-danger' ?> me-1">
                                    <?= $admin['status_registrasi'] == 1 ? 'Registered' : 'Not Registered' ?>
                                </span>
                            </td>                      
                            <td>
                                <a href="<?= base_url('manage-admin/edit/' . $admin['id_admin']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a href="<?= base_url('manage-admin/delete/' . $admin['id_admin']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
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