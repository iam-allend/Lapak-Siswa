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
                <?php endif; ?>

                <form action="<?= base_url('manage-customer/update/' . $customer['id_customer']) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="full_name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="full_name" value="<?= old('full_name', $customer['full_name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= old('username', $customer['username']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= old('email', $customer['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password (Biarkan kosong jika tidak diubah)</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No. Telp</label>
                        <input type="text" class="form-control" name="no_telp" value="<?= old('no_telp', $customer['no_telp']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" required>
                            <option value="male" <?= old('gender', $customer['gender']) == 'male' ? 'selected' : '' ?>>Male</option>
                            <option value="female" <?= old('gender', $customer['gender']) == 'female' ? 'selected' : '' ?>>Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control" name="alamat" required><?= old('alamat', $customer['alamat']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="saldo" class="form-label">Saldo</label>
                        <input type="number" class="form-control" name="saldo" value="<?= old('saldo', $customer['saldo']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="url_image" class="form-label">Foto Profil</label>
                        <input type="file" class="form-control" name="url_image" accept="image/*">
                        <?php if ($customer['url_image']): ?>
                            <img src="<?= base_url($customer['url_image']) ?>" alt="Foto Profil" width="100" class="mt-2">
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Customer</button>
                    <a class="btn btn-outline-primary" href="<?= base_url()?>manage-customer">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>