<?php include('LayOutTemplate/header.php'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-lg">
    <div class="container">
        <h2><a class="navbar-brand px-4" href="index.html">Lapak Siswa</a></h2>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="input-group mb-2 me-2 mt-2">
                <input type="text" class="form-control border-danger" placeholder="Find Something ?"
                    aria-label="Find Something ?" aria-describedby="button-addon2">
                <button class="btn btn-danger" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
            </div>

        </div>
    </div>
</nav>
<div class="container">
    <h1 class="h3 py-4 mt-2 mb-2">Keranjang</h1>
    <div class="row">
        <div class="col-sm-8 mb-4">
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Info Barang</th>
                                <th>Qty</th>
                                <th>Subtotal</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td width="35px">1</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-3 d-flex justify-content-center">
                                            <img src="https://dummyimage.com/100x100" height="75" alt="">
                                        </div>
                                        <div class="col-sm-9">
                                            <h6>Intel Core i3 12100 4Core 8Thread</h6>
                                            <div>Processor</div>
                                        </div>
                                    </div>
                                </td>
                                <td width="80px">
                                    <input type="number" class="form-control form-control-sm" value="1">
                                </td>
                                <td>
                                    Rp 1,299.000 ;-
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                            <tr>
                                <td width="35px">2</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-3 d-flex justify-content-center">
                                            <img src="https://dummyimage.com/100x100" height="75" alt="">
                                        </div>
                                        <div class="col-sm-9">
                                            <h6>Intel Core i5 12400 6Core 12Thread</h6>
                                            <div>Processor</div>
                                        </div>
                                    </div>
                                </td>
                                <td width="80px">
                                    <input type="number" class="form-control form-control-sm" value="1">
                                </td>
                                <td>
                                    Rp 2,899.000 ;-
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="py-2 mb-2 px-2">Total :</h3>
                    <h4 class="mb-4 px-2">Rp 4,199.000 ;-</h4>
                    <hr>
                    <div class="d-grid gap-2">
                        <a href="checkout.html" class="btn btn-danger d-grid">Bayar</a>
                        *Kemungkinan gratis ongkir untuk wilayah Jawa Timur dan sekitarnya.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h5 class="py-2 mb-2 px-2 text-center">+62 822 3064 8094</h5>
                    <hr>
                    Hubungi contact berikut untuk informasi terkait pengiriman atau pembayaran.
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('LayOutTemplate/footer.php'); ?>