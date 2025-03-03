<?= $this->include('frontend/dashboard/head'); ?>
<?= $this->include('frontend/dashboard/side'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <h3>Saldo</h3>
                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit nisl
                    ullamcorper, rutrum metus in, congue lectus.</p>
                <div class="card-deck my-4">
                    <div class="card mb-4 shadow">
                        <div class="card-body text-center my-4">
                            <a href="#">
                                <h3 class="h5 mt-4 mb-0">Basic</h3>
                            </a>
                            <p class="text-muted">package</p>
                            <span class="h1 mb-0">$9.9</span>
                            <p class="text-muted">year</p>
                            <ul class="list-unstyled">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Consectetur adipiscing elit</li>
                                <li>Integer molestie lorem at massa</li>
                                <li>Eget porttitor lorem</li>
                            </ul>
                            <span class="dot dot-lg bg-success"></span>
                            <span class="text-muted ml-3">Active</span>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                    <div class="card mb-4">
                        <div class="card-body text-center my-4">
                            <a href="#">
                                <h3 class="h5 mt-4 mb-0">Professional</h3>
                            </a>
                            <p class="text-muted">package</p>
                            <span class="h1 mb-0">$16.9</span>
                            <p class="text-muted">year</p>
                            <ul class="list-unstyled">
                                <li>Lorem ipsum dolor sit amet</li>
                                <li>Consectetur adipiscing elit</li>
                                <li>Integer molestie lorem at massa</li>
                                <li>Eget porttitor lorem</li>
                            </ul>
                            <button type="button" class="btn mb-2 btn-primary btn-lg">Ugrade</button>
                        </div> <!-- .card-body -->
                    </div> <!-- .card -->
                </div> <!-- .card-group -->
            </div>
        </div>
    </div>
</main> <!-- main -->


<script src="js/jquery.min.js"></script>
<script src="<?= base_url('frontend/profile/js/jquery.min.js') ?>"></script>
<script src="js/popper.min.js"></script>
<script src="<?= base_url('frontend/profile/js/popper.min.js') ?>"></script>
<script src="js/moment.min.js"></script>
<script src="<?= base_url('frontend/profile/js/moment.min.js') ?>"></script>
<script src="js/bootstrap.min.js"></script>
<script src="<?= base_url('frontend/profile/js/bootstraps.min.js') ?>"></script>
<script src="js/simplebar.min.js"></script>
<script src="<?= base_url('frontend/profile/js/simplebar.min.js') ?>"></script>
<script src='js/daterangepicker.js'></script>
<script src="<?= base_url('frontend/profile/js/daterangepicker.js') ?>"></script>
<script src='js/jquery.stickOnScroll.js'></script>
<script src='<?= base_url('frontend/profile/js/jquery.stickOnScroll.js') ?>'></script>
<script src="js/tinycolor-min.js"></script>
<script src="<?= base_url('frontend/profile/js/tinycolor-min.js') ?>"></script>
<script src="js/config.js"></script>
<script src="<?= base_url('frontend/profile/js/cofig.js') ?>"></script>
<script src="js/apps.js"></script>
<script src="<?= base_url('frontend/profile/js/apps.js') ?>"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', 'UA-56159088-1');
</script>
</body>

</html>