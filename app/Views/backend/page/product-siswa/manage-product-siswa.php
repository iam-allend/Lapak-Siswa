<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="<?= base_url() ?>manage-product-siswa/create">
                <button class="btn btn-primary"><i class='bx bx-plus'></i> Tambah</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-primary">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Data Produk</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Admin</th>
                            <th>Stok</th>
                            <th>Terjual</th>
                            <th>Berat</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Harga Akhir</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($products as $product): ?>
                        <tr>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <?php
                                    // Ambil 2 gambar pertama
                                    $images = array_slice($product['images'], 0, 2);

                                    // Tampilkan gambar
                                    foreach ($images as $image) {
                                        ?>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-xs pull-up" title="Foto Produk">
                                            <a target="_blank" href="<?= base_url($image['url']) ?>">
                                                <img src="<?= base_url($image['url']) ?>" alt="Avatar" class="rounded-circle">
                                            </a>
                                        </li>
                                        <?php
                                    }

                                    // Tampilkan indikator jika ada lebih dari 2 gambar
                                    if (count($product['images']) > 2) {
                                        $remainingImages = count($product['images']) - 2;
                                        ?>
                                        <li class="avatar avatar-xs pull-up">
                                            <span class="badge bg-label-primary">+<?= $remainingImages ?></span>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                            </td>
                            <td>
                                <div class="d-flex flex-nowrap">
                                    <div class="m-0 avatar-group d-flex align-items-center me-2">
                                        <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="" title="Registrasi : <?= $product['created_at']?> | Status : <?= $product['status_registrasi'] == 1 ? 'Aktif' : 'Non-Aktif' ?>">
                                            <span class="badge badge-center rounded-circle <?= $product['status_registrasi'] == 1 ? 'bg-label-success' : 'bg-label-danger' ?> me-1">
                                                <?= $product['status_registrasi'] == 1 ? 'Y' : 'N' ?>
                                            </span>
                                        </a>
                                    </div> 
                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="" title="Expired : <?= $product['expired'] ?>">   
                                        <a class="text-decoration-none text-gray" href="">
                                            <?= $product['product_name'] ?>
                                        </a>
                                    </div>
                                </div>



                            </td>
                            <td><?= $product['nama_kategori'] ?></td>
                            <td><?= $product['nama_admin'] ?></td>
                            <td><?= $product['stock'] ?></td>
                            <td><?= number_format($product['sell']) ?></td>
                            <td><?= $product['weight'] ?></td>
                            <td>Rp. <?= number_format($product['price'], 2) ?></td>
                            <td><?= $product['discount']?>%</td>
                            <td>Rp. <?= number_format($product['price_final'], 2) ?></td>                      
                            <td>
                                <a href="<?= base_url('manage-product-siswa/edit/' . $product['id_product']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a href="<?= base_url('manage-product-siswa/delete/' . $product['id_product']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus data ini?');">
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