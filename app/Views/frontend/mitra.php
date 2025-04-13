<?php include("LayOutTemplate/header.php"); ?>


<!-- Category Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
        <h1 class="mb-3">Terima Kasih</h1>
            <p>Kami ucapkan Terima Kasih kepada Mitra-Mitra yang bergabung dan menjadi bagian 
                dari Kami di <span style="color: #00B98E; font-weight: bold;">Lapak Siswa</span></p>

        </div>
        <style>
    .cat-item .rounded {
        min-height: 300px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 30px 15px;
    }

    .cat-item .icon {
        height: 100px;
        width: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 20px;
    }

    .cat-item .icon img {
        max-height: 80px;
        max-width: 100%;
        object-fit: contain;
    }

    .cat-item h6 {
        font-weight: 600;
        font-size: 16px;
        margin-bottom: 8px;
        line-height: 1.4;
    }

    .cat-item span {
        font-size: 14px;
        color: #666;
    }
</style>


<div class="row g-4">
    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
        <a class="cat-item d-block bg-light text-center rounded p-3" href="#">
            <div class="rounded p-4">
                <div class="icon">
                    <img src="<?= base_url() ?>frontend/img/bulog.png" alt="Bulog">
                </div>
                <h6>Badan Urusan Logistik</h6>
              
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
        <a class="cat-item d-block bg-light text-center rounded p-3" href="#">
            <div class="rounded p-4">
                <div class="icon">
                    <img src="<?= base_url() ?>frontend/img/BUMN.png" alt="BUMN">
                </div>
                <h6>Badan Usaha Milik Negara</h6>
             
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
        <a class="cat-item d-block bg-light text-center rounded p-3" href="#">
            <div class="rounded p-4">
                <div class="icon">
                    <img src="<?= base_url() ?>frontend/img/image1.png" alt="BUMS">
                </div>
                <h6>Badan Usaha Milik Sekolah</h6>
               
            </div>
        </a>
    </div>

    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
        <a class="cat-item d-block bg-light text-center rounded p-3" href="#">
            <div class="rounded p-4">
                <div class="icon">
                    <img src="<?= base_url() ?>frontend/img/image2.png" alt="Office">
                </div>
                <h6>Badan Usaha Milik Desa</h6>
              
            </div>
        </a>
    </div>
</div>

         
<!-- Category End -->
<?php include("LayOutTemplate/footer.php"); ?>