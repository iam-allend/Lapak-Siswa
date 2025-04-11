<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard /</span> <?= $navigasi ?></h4>
            <a href="<?= base_url('manage-order-product-siswa/create') ?>">
                <button class="btn btn-primary"><i class='bx bx-plus'></i> Tambah</button>
            </a>
        </div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('primary')): ?>
            <div class="alert alert-primary">
                <?= session()->getFlashdata('primary') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Data Transaksi</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Produk</th>
                            <th>Customer</th>
                            <th>Hrg jml total</th>
                            <th>Tgl Order-Status</th>
                            <?php if(!session('id_level') == 1){?>
                            <th>Actions</th>
                            <?php }?>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($transactions as $transaction): ?>
                        <tr>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <?php
                                    // Ambil 2 gambar pertama
                                    $images = array_slice($transaction['images'], 0, 2);

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
                                    if (count($transaction['images']) > 2) {
                                        $remainingImages = count($transaction['images']) - 2;
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
                                <span data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="" title="ID Transaksi : <?=$transaction['id_transaksi']?>">
                                    <?= $transaction['product_name'] ?> 
                                </span>  <br>
                                <small>Adm: <?= $transaction['admin_name'] ?></small>
                            </td>
                            <td>
                                <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="" title="email : <?=$transaction['email']?>">   
                                    <?= $transaction['customer_name'] ?>                                    
                                </div>
                                <small> 
                                    <a data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="" title="klik untuk WA" target="_blank" href="https://wa.me/<?=$transaction['no_telp']?>">
                                    <?=$transaction['no_telp']?>
                                </small>
                            </td>
                            <td>
                                Rp <?= number_format($transaction['price_at_transaction'], 0) ?> x <?= $transaction['quantity'] ?>
                                <br>
                                <small class="text-primary">
                                    Rp <?= number_format($transaction['total_price'], 0) ?>
                                </small>
                            </td>
                            <td>
                                <small>
                                    <?= date('d M Y h:i:sa', strtotime($transaction['created_at'])) ?>
                                </small>
                                <br>
                                <span class="badge bg-label-<?= 
                                        $transaction['status_order'] == 'selesai' ? 'primary' : 
                                        ($transaction['status_order'] == 'proses' ? 'warning' : 'danger') 
                                    ?>">
                                        <?= ucfirst($transaction['status_order']) ?>
                                </span>
                            </td>
                            <?php if(!session('id_level') == 1){?>
                            <td>
                                <?php if ($transaction['status_order'] !== 'selesai'): ?>
                                    <!-- Tombol Edit dan Hapus aktif jika status bukan "selesai" -->
                                    <a href="<?= base_url('manage-order-product-siswa/edit/' . $transaction['id_transaksi']) ?>" class="btn btn-outline-primary text-decoration-none">
                                        <i class='bx bxs-edit'></i>
                                    </a>
                                    <a href="<?= base_url('manage-order-product-siswa/delete/' . $transaction['id_transaksi']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus transaksi ini? Saldo customer akan dikembalikan!');">
                                        <i class='bx bxs-trash-alt'></i>
                                    </a>
                                <?php else: ?>
                                    <!-- Tombol Edit dan Hapus dinonaktifkan jika status "selesai" -->
                                    <button class="btn btn-outline-secondary text-decoration-none" disabled>
                                        <i class='bx bxs-edit'></i>
                                    </button>
                                    <button class="btn btn-outline-secondary text-decoration-none" disabled>
                                        <i class='bx bxs-trash-alt'></i>
                                    </button>
                                <?php endif; ?>
                            </td>
                            <?php }?>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->include('backend/layOutTemplate/footer'); ?>