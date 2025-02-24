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

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="card">
            <h5 class="card-header">Data Transaksi</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Produk</th>
                            <th>Customer</th>
                            <th>Admin</th>
                            <th>Quantity</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Tgl Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php foreach ($transactions as $transaction): ?>
                        <tr>
                            <td>
                                <?= $transaction['product_name'] ?> 
                                <br><small>Harga: Rp <?= number_format($transaction['price_at_transaction'], 0) ?></small>
                            </td>
                            <td><?= $transaction['customer_name'] ?> <br><small>Saldo: Rp <?= number_format($transaction['saldo'], 0) ?></small></td>
                            <td><?= $transaction['admin_name'] ?></td>
                            <td><?= $transaction['quantity'] ?></td>
                            <td>Rp <?= number_format($transaction['total_price'], 0) ?></td>
                            <td>
                                <span class="badge bg-<?= 
                                    $transaction['status_order'] == 'selesai' ? 'success' : 
                                    ($transaction['status_order'] == 'proses' ? 'warning' : 'danger') 
                                ?>">
                                    <?= ucfirst($transaction['status_order']) ?>
                                </span>
                            </td>
                            <td><?= date('d M Y', strtotime($transaction['created_at'])) ?></td>
                            <td>
                                <a href="<?= base_url('manage-order-product-siswa/edit/' . $transaction['id_transaksi']) ?>" class="btn btn-outline-primary text-decoration-none">
                                    <i class='bx bxs-edit'></i>
                                </a>
                                <a href="<?= base_url('manage-order-product-siswa/delete/' . $transaction['id_transaksi']) ?>" class="btn btn-outline-danger text-decoration-none" onclick="return confirm('Yakin ingin menghapus transaksi ini? Saldo customer akan dikembalikan!');">
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