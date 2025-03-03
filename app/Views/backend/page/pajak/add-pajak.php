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

                <form action="<?= base_url('manage-pajak/store') ?>" method="post">
                    <div class="mb-3">
                        <label for="id_level" class="form-label">Level User</label>
                        <select class="form-select" name="id_level" required>
                            <option value="">Pilih Level</option>
                            <?php foreach ($levels as $level): ?>
                                <option value="<?= $level['id_level'] ?>" 
                                    <?= (old('id_level') == $level['id_level'] || (isset($pajak['id_level']) && $pajak['id_level'] == $level['id_level'])) ? 'selected' : '' ?>
                                >
                                    <?= esc($level['nama']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="besaran" class="form-label">Besaran (%)</label>
                        <input type="number" class="form-control" name="besaran" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Pajak</button>
                    <a class="btn btn-outline-primary" href="<?= base_url() ?>manage-pajak">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>