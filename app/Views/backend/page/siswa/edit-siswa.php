<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>

        <div class="card">
            <div class="card-body">
                <?php if (session()->getFlashdata('errors')): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                <li><?= esc($error) ?></li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                <?php endif ?>

                <form action="<?= base_url('manage-admin/update/' . $admin['id_admin']) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" value="<?= old('full_name', $admin['full_name']) ?>">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= old('username', $admin['username']) ?>">
                        <?php if (session()->getFlashdata('errors') && array_key_exists('username', session()->getFlashdata('errors'))): ?>
                            <small class="text-danger"><?= session()->getFlashdata('errors')['username'] ?></small>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="<?= old('email', $admin['email']) ?>">
                        <?php if (session()->getFlashdata('errors') && array_key_exists('email', session()->getFlashdata('errors'))): ?>
                            <small class="text-danger"><?= session()->getFlashdata('errors')['email'] ?></small>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password (Leave blank to keep current password)</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender">
                            <option value="male" <?= old('gender', $admin['gender']) == 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= old('gender', $admin['gender']) == 'female' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="url_image" class="form-label">Profile Image (Leave blank to keep current image)</label>
                        <input type="file" class="form-control" name="url_image" accept="image/*">
                    </div>
                    <div class="mb-3">
                        <label for="status_registrasi" class="form-label">Status Registrasi</label>
                        <select class="form-select" name="status_registrasi" required>
                            <option value="0" <?= old('status_registrasi', $admin['status_registrasi']) == 0 ? 'selected' : '' ?>>Not Registered</option>
                            <option value="1" <?= old('status_registrasi', $admin['status_registrasi']) == 1 ? 'selected' : '' ?>>Registered</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin mengubah data ini?');">Update Admin</button>
                    <a class="btn btn-outline-primary" href="<?= base_url()?>manage-admin">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>