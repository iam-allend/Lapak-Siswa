<?php include("LayOutTemplate/header.php"); ?>


<section class="sub-bnr">
  <div class="position-center-center">
    <div class="container">
      <h4>Contact us</h4>
      <hr class="main">
      <!-- Breadcrumb -->
      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Contact us</li>
      </ol>
    </div>
  </div>
  <div class="scroll"> <a href="#content" class="go-down"></a></div>
</section>


<section class="contact-section pb-100 pt-100" id="content">
  <div class="container">
    <div class="section-title text-center">
      <span>Contact Us</span>
      <h2>HUbungi Kami</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
    </div>
    <div class="row">
      <div class="col-lg-3">
        <div class="row">
          <div class="col-lg-12 col-sm-6">
            <div class="contact-card">
              <i class="fas fa-mobile-alt"></i>
              <ul>
                <li>
                  <a href="tel:">
                    +62 2832948172
                  </a>
                </li>
                <li>

                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12 col-sm-6">
            <div class="contact-card">
              <i class="far fa-envelope"></i>
              <ul>
                <li>
                  <a href="#">
                  smk10smg@yahoo.co.id
                  </a>
                </li>
                <li>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-12 col-sm-6 offset-lg-0 offset-sm-3">
            <div class="contact-card">
              <i class="fas fa-map-marker-alt"></i>
              <ul>
                <li>
                  Tanah Mas,Semarang ,Indonesia
                  
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="contact-area">
          <h3>HUbungi Kami</h3>
          <form id="contactForm" novalidate="true">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" name="name" id="name" class="form-control" required="" data-error="masukkan nama anda" placeholder="Your Name">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control" required="" data-error="masukan email anda" placeholder="Your Email">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="number" name="number" id="number" class="form-control" required="" data-error="masukan nomor hp anda" placeholder="Phone Number">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <input type="text" name="subject" id="subject" class="form-control" required="" data-error="Silahkan isi subjek anda" placeholder="Your Subject">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <textarea name="message" class="message-field" id="message" rows="5" required="" data-error="Tulis Pesan disini" placeholder="Write Message"></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-sm-12">
                <button type="submit" class="default-btn contact-btn disabled" style="pointer-events: all; cursor: pointer;">
                  Kirim
                </button>
                <div id="msgSubmit" class="h3 alert-text text-center hidden"></div>
                <div class="clearfix"></div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("LayOutTemplate/footer.php"); ?>