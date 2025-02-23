<?= $this->include('frontend/dashboard/head'); ?>
<?= $this->include('frontend/dashboard/side'); ?>
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="h3 mb-3 page-title">History Orders</h2>
                <div class="row mb-4 items-align-center">
                    <div class="col-md">
                        <ul class="nav nav-pills justify-content-start">
                            <li class="nav-item">
                                <a class="nav-link active bg-transparent pr-2 pl-0 text-primary" href="#">All <span
                                        class="badge badge-pill bg-primary text-white ml-2">164</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted px-2" href="#">Pending <span
                                        class="badge badge-pill bg-white border text-muted ml-2">64</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted px-2" href="#">Processing <span
                                        class="badge badge-pill bg-white border text-muted ml-2">48</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-muted px-2" href="#">Completed <span
                                        class="badge badge-pill bg-white border text-muted ml-2">52</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-auto ml-auto text-right">
                        <span class="small bg-white border py-1 px-2 rounded mr-2 d-none d-lg-inline">
                            <a href="#" class="text-muted"><i class="fe fe-x mx-1"></i></a>
                            <span class="text-muted">Status : <strong>Pending</strong></span>
                        </span>
                        <span class="small bg-white border py-1 px-2 rounded mr-2 d-none d-lg-inline">
                            <a href="#" class="text-muted"><i class="fe fe-x mx-1"></i></a>
                            <span class="text-muted">April 14, 2020 - May 13, 2020</span>
                        </span>
                        <button type="button" class="btn" data-toggle="modal" data-target=".modal-slide"><span
                                class="fe fe-filter fe-16 text-muted"></span></button>
                        <button type="button" class="btn"><span
                                class="fe fe-refresh-ccw fe-16 text-muted"></span></button>
                    </div>
                </div>
                <!-- Slide Modal -->
                <div class="modal fade modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Filters</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <i class="fe fe-x fe-12"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="p-2">
                                    <div class="form-group my-4">
                                        <p class="mb-2"><strong>Regions</strong></p>
                                        <label for="multi-select2" class="sr-only"></label>
                                        <select class="form-control select2-multi" id="multi-select2">
                                            <optgroup label="Mountain Time Zone">
                                                <option value="AZ">Arizona</option>
                                                <option value="CO">Colorado</option>
                                                <option value="ID">Idaho</option>
                                                <option value="MT">Montana</option>
                                                <option value="NE">Nebraska</option>
                                                <option value="NM">New Mexico</option>
                                                <option value="ND">North Dakota</option>
                                                <option value="UT">Utah</option>
                                                <option value="WY">Wyoming</option>
                                            </optgroup>
                                            <optgroup label="Central Time Zone">
                                                <option value="AL">Alabama</option>
                                                <option value="AR">Arkansas</option>
                                                <option value="IL">Illinois</option>
                                                <option value="IA">Iowa</option>
                                                <option value="KS">Kansas</option>
                                                <option value="KY">Kentucky</option>
                                                <option value="LA">Louisiana</option>
                                                <option value="MN">Minnesota</option>
                                                <option value="MS">Mississippi</option>
                                                <option value="MO">Missouri</option>
                                                <option value="OK">Oklahoma</option>
                                                <option value="SD">South Dakota</option>
                                                <option value="TX">Texas</option>
                                                <option value="TN">Tennessee</option>
                                                <option value="WI">Wisconsin</option>
                                            </optgroup>
                                        </select>
                                    </div> <!-- form-group -->
                                    <div class="form-group my-4">
                                        <p class="mb-2">
                                            <strong>Payment</strong>
                                        </p>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Paypal</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Credit Card</label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1-1"
                                                checked>
                                            <label class="custom-control-label" for="customCheck1">Wire Transfer</label>
                                        </div>
                                    </div> <!-- form-group -->
                                    <div class="form-group my-4">
                                        <p class="mb-2">
                                            <strong>Types</strong>
                                        </p>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio1" name="customRadio"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio1">End users</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="customRadio2" name="customRadio"
                                                class="custom-control-input" checked>
                                            <label class="custom-control-label" for="customRadio2">Whole Sales</label>
                                        </div>
                                    </div> <!-- form-group -->
                                    <div class="form-group my-4">
                                        <p class="mb-2">
                                            <strong>Completed</strong>
                                        </p>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                            <label class="custom-control-label" for="customSwitch1">Include</label>
                                        </div>
                                    </div> <!-- form-group -->
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn mb-2 btn-primary btn-block">Apply</button>
                                <button type="button" class="btn mb-2 btn-secondary btn-block">Reset</button>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table border table-hover bg-white">
                    <thead>
                        <tr role="row">
                            <th>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="all">
                                    <label class="custom-control-label" for="all"></label>
                                </div>
                            </th>
                            <th>ID</th>
                            <th>Purchase Date</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Ship To</th>
                            <th>Total</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="align-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <label class="custom-control-label"></label>
                                </div>
                            </td>
                            <td>1331</td>
                            <td>2020-12-26 01:32:21</td>
                            <td>Samsul Kopling</td>
                            <td>089626323</td>
                            <td>996-3523</td>
                            <td>15000</td>
                            <td> Paypal</td>
                            <td><span class="dot dot-lg bg-warning mr-2"></span>Proses</td>
                            <td>
                                <button type="button" class="btn mb-2 btn-danger"><span
                                        class="fe fe-trash-2 fe-16"><span></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <label class="custom-control-label"></label>
                                </div>
                            </td>
                            <td>1331</td>
                            <td>2020-12-26 01:32:21</td>
                            <td>Samsul Kopling</td>
                            <td>089626323</td>
                            <td>996-3523</td>
                            <td>15000</td>
                            <td> Paypal</td>
                            <td><span class="dot dot-lg bg-danger mr-2"></span>Transaksi Gagal</td>
                            <td>
                                <button type="button" class="btn mb-2 btn-danger"><span
                                        class="fe fe-trash-2 fe-16"><span></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="align-center">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input">
                                    <label class="custom-control-label"></label>
                                </div>
                            </td>
                            <td>1331</td>
                            <td>2020-12-26 01:32:21</td>
                            <td>Samsul Kopling</td>
                            <td>089626323</td>
                            <td>996-3523</td>
                            <td>15000</td>
                            <td> Paypal</td>
                            <td><span class="dot dot-lg bg-success mr-2"></span>Selesai</td>
                            <td>
                                <button type="button" class="btn mb-2 btn-danger"><span
                                        class="fe fe-trash-2 fe-16"><span></button>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <nav aria-label="Table Paging" class="my-3">
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
    <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="list-group list-group-flush my-n3">
                        <div class="list-group-item bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-box fe-24"></span>
                                </div>
                                <div class="col">
                                    <small><strong>Package has uploaded successfull</strong></small>
                                    <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                                    <small class="badge badge-pill badge-light text-muted">1m ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-download fe-24"></span>
                                </div>
                                <div class="col">
                                    <small><strong>Widgets are updated successfull</strong></small>
                                    <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                                    <small class="badge badge-pill badge-light text-muted">2m ago</small>
                                </div>
                            </div>
                        </div>
                        <div class="list-group-item bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-inbox fe-24"></span>
                                </div>
                                <div class="col">
                                    <small><strong>Notifications have been sent</strong></small>
                                    <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                                    <small class="badge badge-pill badge-light text-muted">30m ago</small>
                                </div>
                            </div> <!-- / .row -->
                        </div>
                        <div class="list-group-item bg-transparent">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="fe fe-link fe-24"></span>
                                </div>
                                <div class="col">
                                    <small><strong>Link was attached to menu</strong></small>
                                    <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                                    <small class="badge badge-pill badge-light text-muted">1h ago</small>
                                </div>
                            </div>
                        </div> <!-- / .row -->
                    </div> <!-- / .list-group -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body px-5">
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <div class="squircle bg-success justify-content-center">
                                <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Control area</p>
                        </div>
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Activity</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Droplet</p>
                        </div>
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Upload</p>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-users fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Users</p>
                        </div>
                        <div class="col-6 text-center">
                            <div class="squircle bg-primary justify-content-center">
                                <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                            </div>
                            <p>Settings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> <!-- main -->

</div> <!-- .wrapper -->
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