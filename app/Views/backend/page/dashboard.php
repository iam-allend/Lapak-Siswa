<?= $this->include('backend/layOutTemplate/header'); ?>
<?= $this->include('backend/layOutTemplate/sidebar'); ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <!-- Card Welcome -->
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Selamat Datang <?= session('fullname') ?> 🎉</h5>
                                <?php
                                $orderModel = new \App\Models\OrderProductSiswaModel();
                                $todayOrders = $orderModel->where('DATE(created_at)', date('Y-m-d'))->countAllResults();
                                ?>
                                <p class="mb-4">
                                    Lapak Siswa telah menyelesaikan <span class="fw-bold"><?= $todayOrders ?></span> pesanan baru hari ini.
                                </p>
                                <a href="<?= base_url('manage-order-product-siswa') ?>" class="btn btn-sm btn-outline-primary">Transaksi Terbaru</a>
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
                    // Hitung total proses
                    $transaksiSiswaModel = new \App\Models\OrderProductSiswaModel();
                    $transaksiIndperModel = new \App\Models\TransaksiIndperModel();
                    
                    $prosesSiswa = $transaksiSiswaModel->where('status_order', 'proses')->countAllResults();
                    $prosesIndper = $transaksiIndperModel->where('status_order', 'proses')->countAllResults();
                    $totalProses = $prosesSiswa + $prosesIndper;
                    
                    // Hitung total sukses
                    $suksesSiswa = $transaksiSiswaModel->where('status_order', 'selesai')->countAllResults();
                    $suksesIndper = $transaksiIndperModel->where('status_order', 'selesai')->countAllResults();
                    $totalSukses = $suksesSiswa + $suksesIndper;
                    
                    // Hitung omset
                    $omsetSiswa = $transaksiSiswaModel->selectSum('total_price')->where('status_order', 'selesai')->get()->getRow()->total_price ?? 0;
                    $omsetIndper = $transaksiIndperModel->selectSum('total_price')->where('status_order', 'selesai')->get()->getRow()->total_price ?? 0;
                    $totalOmset = $omsetSiswa + $omsetIndper;
                    
                    // Hitung pendapatan sistem
                    $pajakModel = new \App\Models\PajakModel();
                    $pajakSiswa = $pajakModel->where('id_level', 3)->first()['besaran'] / 100; // 10%
                    $pajakIndper = $pajakModel->where('id_level', 5)->first()['besaran'] / 100; // 5%
                    
                    $pendapatanSiswa = $omsetSiswa * $pajakSiswa;
                    $pendapatanIndper = $omsetIndper * $pajakIndper;
                    $totalPendapatan = $pendapatanSiswa + $pendapatanIndper;
                    ?>
                    
                    <!-- Proses Card -->
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url()?>backend/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                                    </div>
                                </div>
                                <span class="d-block mb-1">Process</span>
                                <h2 class="card-title text-nowrap mb-2"><?= $totalProses ?></h2>
                                <small class="text-success fw-semibold">+<?= $todayOrders ?> today</small>
                            </div>
                        </div>
                    </div>

                    <!-- Success Card -->
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url()?>backend/assets/img/icons/unicons/cc-primary.png" alt="Credit Card" class="rounded" />
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Success</span>
                                <h3 class="card-title mb-2"><?= $totalSukses ?></h3>
                                <small class="text-success fw-semibold">+<?= $todayOrders ?> today</small>
                            </div>
                        </div>
                    </div>

                    <!-- Omset Card -->
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url()?>backend/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Omset</span>
                                <h3 class="card-title mb-2">Rp <?= number_format($totalOmset, 0, ',', '.') ?></h3>
                                <small class="text-success fw-semibold">+ Rp <?= number_format($todayOrders * 100000, 0, ',', '.') ?></small>
                            </div>
                        </div>
                    </div>

                    <!-- Pendapatan Sistem Card -->
                    <div class="col-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="<?= base_url()?>backend/assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
                                    </div>
                                </div>
                                <span>Pendapatan Sistem</span>
                                <h3 class="card-title text-nowrap mb-1">Rp <?= number_format($totalPendapatan, 0, ',', '.') ?></h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> + Rp <?= number_format($todayOrders * 10000, 0, ',', '.') ?></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Data Keuangan -->
            <div class="col-md-12 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title m-0 me-2">Data Keuangan</h5>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <?php
                            $keuanganModel = new \App\Models\KeuanganModel();
                            $keuanganData = $keuanganModel->orderBy('created_at', 'DESC')->findAll();
                            
                            foreach($keuanganData as $data) : 
                            ?>
                            <li class="d-flex mb-4 pb-1">
                                <div class="avatar flex-shrink-0 me-3">
                                    <img src="<?= base_url()?>backend/assets/img/icons/unicons/wallet.png" alt="User" class="rounded" />
                                </div>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <small class="text-muted d-block mb-1"><?= $data['keterangan'] ?></small>
                                        <h6 class="mb-0"><?= $data['asal'] ?></h6>
                                    </div>
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <span class="text-muted">Rp </span>
                                        <h6 class="mb-0"><?= number_format($data['jumlah'], 0, ',', '.') ?></h6>
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

<?= $this->include('backend/layOutTemplate/footer'); ?>