<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= base_url('public/backend/assets/') ?>" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= $title ?></title> <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="<?= base_url() ?>logo\logo-green.webp" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/css/core.css"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/css/theme-default.css"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/css/demo.css" />

    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= base_url() ?>backend/assets/vendor/libs/apex-charts/apex-charts.css" />

    <script src="<?= base_url() ?>backend/assets/vendor/js/helpers.js"></script>

    <script src="<?= base_url()?>public/backend/assets/js/config.js"></script> 
    </head>
<body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <?= $this->include('backend/layOutTemplate/sidebar')?> <?= $this->include('flashalert')?>