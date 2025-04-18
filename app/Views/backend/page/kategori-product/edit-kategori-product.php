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

                <!-- Ubah action ke endpoint update Kategori -->
                <form action="<?= base_url('manage-kategori-product/update/' . $kategori['id_kategori']) ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama" value="<?= old('nama', $kategori['nama']) ?>">
                        <?php if (session()->getFlashdata('errors') && array_key_exists('nama', session()->getFlashdata('errors'))): ?>
                            <small class="text-danger"><?= session()->getFlashdata('errors')['nama'] ?></small>
                        <?php endif ?>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Yakin ingin mengubah data ini?');">Update Kelas</button>
                    <a class="btn btn-outline-primary" href="<?= base_url()?>manage-kategori-product">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>