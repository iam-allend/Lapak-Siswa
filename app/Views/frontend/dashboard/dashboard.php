<?= $this->include('frontend/dashboard/layOutTemplate/header'); ?>
<?= $this->include('frontend/dashboard/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Card Welcome -->
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang "<?= session('fullname') ?>" 🎉</h5>
                                <?php
                                $transaksiModel = new \App\Models\OrderProductSiswaModel();
                                $todayOrders = $transaksiModel->where('id_customer', session('id_customer'))
                                    ->where('DATE(created_at)', date('Y-m-d'))
                                    ->countAllResults();
                                ?>
                                <p class="mb-4">
                                    Anda memiliki <span class="fw-bold"><?= $todayOrders ?></span> transaksi hari ini.
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="<?= base_url()?>backend/assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="col-12 order-3 order-md-2">
                <div class="row">
                    <?php
                    // Data Customer
                    $customerModel = new \App\Models\CustomerModel();
                    $customer = $customerModel->find(session('id_customer'));
                    
                    // Hitung transaksi proses
                    $transaksiSiswaProses = new \App\Models\OrderProductSiswaModel();
                    $prosesSiswa = $transaksiSiswaProses->where([
                        'id_customer' => session('id_customer'),
                        'status_order' => 'proses'
                    ])->countAllResults();
                    
                    $transaksiIndperProses = new \App\Models\TransaksiIndperModel();
                    $prosesIndper = $transaksiIndperProses->where([
                        'id_customer' => session('id_customer'),
                        'status_order' => 'proses'
                    ])->countAllResults();
                    $totalProses = $prosesSiswa + $prosesIndper;
                    
                    // Hitung transaksi sukses
                    $suksesSiswa = $transaksiSiswaProses->where([
                        'id_customer' => session('id_customer'),
                        'status_order' => 'selesai'
                    ])->countAllResults();
                    
                    $suksesIndper = $transaksiIndperProses->where([
                        'id_customer' => session('id_customer'),
                        'status_order' => 'selesai'
                    ])->countAllResults();
                    $totalSukses = $suksesSiswa + $suksesIndper;
                    
                    // Hitung keranjang
                    $cartModel = new \App\Models\CartModel();
                    $totalKeranjang = $cartModel->where('user_id', session('id_customer'))->countAllResults();
                    ?>
                    
                    <!-- Proses Card -->
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bx bx-loader-circle fs-1 text-warning"></i>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Proses</span>
                                <h2 class="card-title text-nowrap mb-2"><?= $totalProses ?></h2>
                            </div>
                        </div>
                    </div>

                    <!-- Success Card -->
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bx bx-check-circle fs-1 text-success"></i>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Sukses</span>
                                <h3 class="card-title mb-2"><?= $totalSukses ?></h3>
                            </div>
                        </div>
                    </div>

                    <!-- Saldo Card -->
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bx bx-wallet fs-1 text-primary"></i>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Saldo</span>
                                <h3 class="card-title mb-2">Rp <?= number_format($customer['saldo'], 0, ',', '.') ?></h3>
                            </div>
                        </div>
                    </div>

                    <!-- Keranjang Card -->
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <i class="bx bx-cart fs-1 text-danger"></i>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Keranjang</span>
                                <h3 class="card-title mb-2"><?= $totalKeranjang ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Riwayat Transaksi -->
            <div class="col-md-12 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title m-0 me-2">Riwayat Transaksi</h5>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <?php
                            // Ambil transaksi dari kedua tabel
                            $transaksiSiswa = $transaksiSiswaProses->where('id_customer', session('id_customer'))->findAll();
                            $transaksiIndper = $transaksiIndperProses->where('id_customer', session('id_customer'))->findAll();
                            
                            // Gabungkan dan urutkan
                            $allTransactions = array_merge($transaksiSiswa, $transaksiIndper);
                            usort($allTransactions, function($a, $b) {
                                return strtotime($b['created_at']) - strtotime($a['created_at']);
                            });
                            
                            foreach($allTransactions as $trans) : 
                            ?>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <i class="bx bx-receipt fs-4"></i>
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1"><?= $trans['status_order'] ?></small>
                                        <h6 class="mb-0">ID Transaksi: <?= $trans['id_transaksi'] ?></h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <span class="text-muted">Rp </span>
                                        <h6 class="mb-0"><?= number_format($trans['total_price'], 0, ',', '.') ?></h6>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <!-- Footer content -->
        </div>
    </footer>
</div>

<?= $this->include('frontend/dashboard/layOutTemplate/footer'); ?>