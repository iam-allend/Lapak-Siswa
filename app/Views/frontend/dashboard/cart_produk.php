<?php foreach($cart as $value){?>
                <div class="col-12">
                  <div class="card mb-3">

                    <div class="row g-0">
                      <div class="col-5 col-sm-4">
                        <img class="card-img card-img-left" src="<?= base_url($value['images'][0]['url']) ?>" alt="Card image" />
                      </div>
                      <div class="col-7 col-sm-8">

                        <div class="card-body p-3 pb-2 pt-3 pt-sm-4 position-relative">
                          <p class="card-title fs-5 pt-0 mb-1 fw-bold"><?= $value['product_name']?></p>
                          <p class="card-text position-absolute top-0 end-0"><span class="bg-warning px-2 py-1 text-white rounded-1">-15%</span></p>
                          
                          <div class="row px-3">
                            <div class="p-0 m-0 col-7 col-sm-7">
                              <input disabled type="text" class="form-control border-0 rounded-2" value="Rp. 20.000">
                            </div>
                            <div class="p-0 m-0 col-2 col-sm-1">
                              <span class="form-control border-0 px-2 text-center">x</span>
                            </div>
                            <div class="p-0 m-0 col-3 col-sm-4">
                              <input type="number" class="form-control border-1 rounded-2" value="<?= $value['quantity']?>">
                            </div>
                          </div>


                          <div class="row px-3 d-flex justify-content-between content-between">
                            <div class="p-0 m-0 col-7 col-sm-7 my-1">
                              <input disabled type="text" class="form-control border-0 rounded-2 text-primary" value="Rp. 40.000">
                            </div>
                            <div class="p-0 m-0 col-3 col-sm-4 my-1">
                                <button type="submit" class="d-flex justify-content-center nowrap w-100 btn btn-danger text-center px-2 delete-btn" data-id="<?= $value['cart_id']?>">
                                    <i class="me-2 bi bi-trash3"></i>
                                    <span class="d-none d-sm-block">Hapus</span>
                                </button>
                            </div>

 
                          </div>
                          
                          <hr class="d-none d-md-block mb-1">

                          <div class="d-flex d-sm-grid text-start justify-content-start ps-2">
                            <small class="w-fit d-flex nowrap flex-fill text-start p-0">
                            <i class="me-2 bi bi-box-seam"></i>380 <span class="ms-1 d-none d-md-block"> tersisa</span></small>
                            <small class="w-fit d-flex nowrap flex-fill text-start p-0">
                            <i class="me-2 bi bi-tags"></i>30 <span class="ms-1 d-none d-md-block"> terjual</span></small>
                          </div>

                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <?php }?>
