<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> <?= $navigasi ?> </h4>

        <div class="card">
            <!-- <h5 class="card-header">Tambah Admin</h5> -->
            <div class="card-body">
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <?= implode('<br>', session()->getFlashdata('errors')) ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url('manage-admin/store') ?>" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="full_name" required>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select class="form-select" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="url_image" class="form-label">Profile Image</label>
                    <input type="file" class="form-control" name="url_image" accept="image/*" required>
                </div>
                <div class="mb-3">
                    <label for="status_registrasi" class="form-label">Status Registrasi</label>
                    <input type="text" class="form-control" name="status_registrasi" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Admin</button>
            </form>
        </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>