<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="manage-customer/create">
                <button class="btn btn-primary"><i class='bx bx-user-plus'></i> Tambah</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-primary">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Data Customer</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>No. Telp</th>
                            <th>Gender</th>
                            <th>Alamat</th>
                            <th>Saldo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($customers as $customer): ?>
                        <tr>
                            <td>
                                <div class="m-0 avatar-group d-flex align-items-center me-3 p-0">
                                <?php if ($customer['url_image']): ?>
                                    <a target="_blank" href="<?= base_url() ?><?= $customer['url_image']?>" class="avatar avatar-xs pull-up">
                                        <img src="<?= base_url() ?><?= $customer['url_image']?>" alt="Avatar" class="rounded-circle" />
                                    </a>
                                <?php else: ?>
                                    <span class="badge bg-label-danger">unSet</span>
                                <?php endif; ?>
                                </div>
                            </td>
                            <td>
                               <span data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="<?= $customer['full_name'] ?>">
                                   <?= $customer['username'] ?></td>
                               </span>
                            <td><?= $customer['email'] ?></td>
                            <td><?= $customer['no_telp'] ?></td>
                            <td><?= $customer['gender'] ?></td>
                            <td><?= $customer['alamat'] ?></td>
                            <td>Rp. <?= number_format($customer['saldo'], 2) ?></td>
                            <td>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Edit"  href="<?= base_url('manage-customer/edit/' . $customer['id_customer']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Hapus" href="<?= base_url('manage-customer/delete/' . $customer['id_customer']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
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