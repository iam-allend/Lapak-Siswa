<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $tittle ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>logo\logo-green.webp" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!--=============== SWEETALERT ===============-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/fonts/boxicons.css" />
    <!-- <link rel="stylesheet" href="backend\assets\vendor\css\my-style.css"> -->

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->

    <script src="<?= base_url()?>backend/assets/js/config.js"></script>
 

    <!-- <style>
      .menu-inner {
        scroll-behavior: smooth; 
        max-height: 90vh !important; /* Atur tinggi maksimum sesuai kebutuhan */
        overflow-y: scroll !important; /* Membuat konten dapat di-scroll secara vertikal */
      }
      /* Styling scrollbar untuk WebKit (Chrome, Safari, Edge) */
      .menu-inner::-webkit-scrollbar {
          width: 1px !important;
          background-color: black !important;
          display: none !important;
      }

      .menu-inner::-webkit-scrollbar-track {
          background: transparent;
      }

      .menu-inner::-webkit-scrollbar-thumb {
          background: rgba(0, 0, 0, 0.2);
          border-radius: 1px !important;
          transition: background 0.3s ease; /* Efek transisi halus */
      }

      .menu-inner::-webkit-scrollbar-thumb:hover {
          background: rgba(0, 0, 0, 0.4);
      }

      /* Styling scrollbar untuk Firefox */
      .menu-inner {
          /* scrollbar-width: thin; */
          scrollbar-color: rgba(0, 0, 0, 0) transparent;
          scrollbar-width: none !important;
      }
    </style> -->
</head>
<script src="<?= base_url() ?>backend/assets/js/config.js"></script>

</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
        <?= $this->include('flashalert')?>
