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

                <form action="<?= base_url('manage-indper/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Industri</label>
                        <input type="text" class="form-control" name="nama" value="<?= old('nama') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipe_indper" class="form-label">Tipe Industri</label>
                        <select class="form-select" name="tipe_indper" required>
                            <option value="">Pilih Tipe Industri</option>
                            <option value="Perusahaan">Perusahaan</option>
                            <option value="Industri">Industri</option>
                        </select>
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
                        <label for="tgl_mulai_kerjasama" class="form-label">Tanggal Mulai Kerjasama</label>
                        <input type="date" class="form-control" name="tgl_mulai_kerjasama" value="<?= old('tgl_mulai_kerjasama') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tgl_selesai_kerjasama" class="form-label">Tanggal Selesai Kerjasama</label>
                        <input type="date" class="form-control" name="tgl_selesai_kerjasama" value="<?= old('tgl_selesai_kerjasama') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="url_image" class="form-label">Gambar Profil</label>
                        <input type="file" class="form-control" name="url_image" accept="image/*" required>
                    </div>
                    <div class="mb-3">
                        <label for="status_registrasi" class="form-label">Status Registrasi</label>
                        <select class="form-select" name="status_registrasi" required>
                            <option value="0" <?= old('status_registrasi') == 0 ? 'selected' : '' ?>>Not Registered</option>
                            <option value="1" <?= old('status_registrasi') == 1 ? 'selected' : '' ?>>Registered</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_admin" class="form-label">Admin</label>
                        <select class="form-select" name="id_admin" required>
                            <option value="">Pilih Admin</option>
                            <?php foreach ($admins as $admin): ?>
                                <option value="<?= $admin['id_admin'] ?>" <?= old('id_admin') == $admin['id_admin'] ? 'selected' : '' ?>>
                                    <?= esc($admin['full_name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin menambahkan data ini?');">Tambah Industri</button>
                    <a class="btn btn-outline-primary" href="<?= base_url()?>manage-indper">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>