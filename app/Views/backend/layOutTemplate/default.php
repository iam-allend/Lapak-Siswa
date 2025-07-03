<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->include('backend/layOutTemplate/header') ?>
    <style>
        .container-fluid.mt-4 {
            padding-left: 1.5rem; /* Menyesuaikan padding agar tidak terlalu mepet sidebar */
            padding-right: 1.5rem;
        }
        .notification.alert { /* Styling tambahan untuk notifikasi */
            border-radius: .25rem;
            font-weight: bold;
            text-align: center;
            opacity: 0.9;
        }
        .alert-success { background-color: #d4edda; color: #155724; border-color: #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border-color: #f5c6cb; }
        .product-img { /* Styling untuk gambar produk di tabel */
            max-width: 80px; 
            max-height: 80px;
            object-fit: cover;
            border-radius: .25rem;
            border: 1px solid #eee;
        }
        .current-foto-preview { /* Styling untuk preview foto di form */
            max-width: 150px; 
            height: auto;
            margin-top: 10px;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }
    </style>
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?= $this->include('backend/layOutTemplate/sidebar') ?>
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <?= $this->renderSection('content') ?> </div>
                    <?= $this->include('backend/layOutTemplate/footer') ?>
                    <div class="content-backdrop fade"></div>
                </div>
                </div>
            </div>

        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <script src="<?= base_url('public/backend/assets/vendor/libs/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('public/backend/assets/vendor/libs/popper/popper.js') ?>"></script>
    <script src="<?= base_url('public/backend/assets/vendor/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('public/backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') ?>"></script>
    <script src="<?= base_url('public/backend/assets/vendor/js/menu.js') ?>"></script>
    <script src="<?= base_url('public/backend/assets/js/main.js') ?>"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

    <?= $this->renderSection('javascript') ?> 
</body>
</html>