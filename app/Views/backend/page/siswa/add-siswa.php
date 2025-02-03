<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard/</span> <?= $navigasi ?> </h4>

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
                <?php endif; ?>

                <form action="<?= base_url('manage-siswa/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="full_name" value="<?= old('full_name') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= old('username') ?>" required>
                        <?php if (session()->getFlashdata('errors') && array_key_exists('username', session()->getFlashdata('errors'))): ?>
                            <small class="text-danger"><?= session()->getFlashdata('errors')['username'] ?></small>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= old('email') ?>" required>
                        <?php if (session()->getFlashdata('errors') && array_key_exists('email', session()->getFlashdata('errors'))): ?>
                            <small class="text-danger"><?= session()->getFlashdata('errors')['email'] ?></small>
                        <?php endif ?>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="male" <?= old('gender') == 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= old('gender') == 'female' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>

                    <!-- Dropdown untuk memilih kelas -->
                    <div class="mb-3">
                        <label for="id_kelas" class="form-label">Kelas</label>
                        <select class="form-select" name="id_kelas" required>
                            <option value="">Pilih Kelas</option>
                            <?php foreach ($kelas as $kelasItem): ?>
                                <option value="<?= $kelasItem['id_kelas'] ?>" <?= old('id_kelas') == $kelasItem['id_kelas'] ? 'selected' : '' ?>>
                                    <?= esc($kelasItem['nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Dropdown untuk memilih pembimbing (admin) -->
                    <div class="mb-3">
                        <label for="id_admin" class="form-label">Pembimbing</label>
                        <select class="form-select" name="id_admin" required>
                            <option value="">Pilih Pembimbing</option>
                            <?php foreach ($admins as $admin): ?>
                                <option value="<?= $admin['id_admin'] ?>" <?= old('id_admin') == $admin['id_admin'] ? 'selected' : '' ?>>
                                    <?= esc($admin['full_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="url_image" class="form-label">Profile Image</label>
                        <input type="file" class="form-control" name="url_image" accept="image/*" required>
                    </div>

                    <div class="mb-3">
                        <label for="status_registrasi" class="form-label">Status Registrasi</label>
                        <select class="form-select" name="status_registrasi" required>
                            <option value="0" <?= old('status_registrasi') == 0 ? 'selected' : '' ?>>Not Registered</option>
                            <option value="1" <?= old('status_registrasi') == 1 ? 'selected' : '' ?>>Registered</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin menambahkan data ini?');">Tambah Siswa</button>
                    <a class="btn btn-outline-primary" href="<?= base_url()?>manage-siswa">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>