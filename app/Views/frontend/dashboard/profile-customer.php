<?= $this->include('frontend/dashboard/layOutTemplate/header'); ?>
<?= $this->include('frontend/dashboard/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('success')): ?>
                            <div class="alert alert-success">
                                <?= session()->getFlashdata('success') ?>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (session()->getFlashdata('errors')): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach (session()->getFlashdata('errors') as $error): ?>
                                        <li><?= esc($error) ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="<?= base_url('profile/update') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            
                            <div class="d-flex align-items-start align-items-sm-center gap-4">
                                <img
                                    src="<?= base_url(session('url_image') ? session('url_image') : 'img_user/default.png') ?>"
                                    alt="user-avatar"
                                    class="d-block rounded"
                                    height="100"
                                    width="100"
                                    id="uploadedAvatar"
                                />
                                <div class="button-wrapper">
                                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                        <span class="d-none d-sm-block">Upload new photo</span>
                                        <i class="bx bx-upload d-block d-sm-none"></i>
                                        <input
                                            type="file"
                                            id="upload"
                                            name="photo"
                                            class="account-file-input"
                                            hidden
                                            accept="image/png, image/jpeg, image/jpg"
                                        />
                                    </label>
                                    <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" onclick="resetAvatar()">
                                        <i class="bx bx-reset d-block d-sm-none"></i>
                                        <span class="d-none d-sm-block">Reset</span>
                                    </button>
                                    <p class="text-muted mb-0">Allowed JPG, JPEG or PNG. Max size of 2MB</p>
                                </div>
                            </div>
                            
                            <hr class="my-4">
                            
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="full_name" class="form-label">Nama Lengkap</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="full_name"
                                        name="full_name"
                                        value="<?= old('full_name', session('fullname')) ?>"
                                        required
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="username" class="form-label">Username</label>
                                    <input 
                                        class="form-control" 
                                        type="text" 
                                        name="username" 
                                        value="<?= old('username', session('username')) ?>" 
                                        required
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input
                                        class="form-control"
                                        type="email"
                                        id="email"
                                        name="email"
                                        value="<?= old('email', session('email')) ?>"
                                        required
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="no_telp" class="form-label">Nomor Telepon</label>
                                    <input
                                        class="form-control"
                                        type="text"
                                        id="no_telp"
                                        name="no_telp"
                                        value="<?= old('no_telp', session('no_telp')) ?>"
                                        required
                                    />
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="gender" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="gender" name="gender" required>
                                        <option value="male" <?= (old('gender', session('gender')) == 'male') ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="female" <?= (old('gender', session('gender')) == 'female') ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input 
                                        class="form-control" 
                                        type="password" 
                                        name="password" 
                                        placeholder="Masukkan password baru"
                                    />
                                    <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                                </div>
                                <div class="mb-3 col-12">
                                    <label for="alamat" class="form-label">Alamat Lengkap</label>
                                    <textarea class="form-control" id="alamat" name="alamat" required><?= old('alamat', session('alamat')) ?></textarea>
                                </div>
                            </div>
                            
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2" onclick="return confirm('Yakin ingin mengubah data diri?')">Simpan Perubahan</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function resetAvatar() {
    document.getElementById('uploadedAvatar').src = '<?= base_url('img_user/default.png') ?>';
    document.querySelector('input[name="photo"]').value = '';
}
</script>


<?php if (session()->getFlashdata('refresh')): ?>
<script>
// Force reload halaman untuk memastikan gambar terupdate
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
</script>
<?php endif; ?>


<?= $this->include('frontend/dashboard/layOutTemplate/footer'); ?>