<?= $this->include('auth/layOutTemplate/header'); ?>

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register Card -->
           
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="<?= base_url('home') ?>" class="app-brand-link gap-2">
                <span class="app-brand-logo demo mt-3">
                <img width="150" src="<?= base_url('logo/logo-text-green.webp') ?>" alt="">
              </span>
                  <span class="d-none app-brand-text demo text-body fw-bolder">Lapak Siswa</span>
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Selamat datang di Lapak Siswa👋</h4>
              <p class="mb-4">Silahkan daftar akun untuk melanjutkan</p>
              <!-- <p class="mb-4">Mohon daftar untuk menjelajahi lebih lanjut</p> -->

              <form class="mb-3" action="<?= base_url('auth/register')?>" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="username" class="form-label">Daftar Sebagai</label>
                  <select class="form-select" name="level" id="levelSelect" required>
                    <option value="">-- Pilih --</option>
                    <!-- <option value="4">Super Admin</option> -->
                    <option value="3">Guru</option>
                    <option value="1">Siswa</option>
                    <option value="2">Customer</option>
                    <option value="5">Collaborator</option>
                  </select>
                </div>
                <div id="content">

                </div>

                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                    <label class="form-check-label" for="terms-conditions">
                      I agree to
                      <a href="javascript:void(0);">privacy policy & terms</a>
                    </label>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">Sign up</button>
              </form>

              <p class="text-center">
                <span>Already have an account?</span>
                <a href="<?= base_url('login')?>">
                  <span>Sign in instead</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>

    <!-- / Content -->

    <?= $this->include('auth/layOutTemplate/footer'); ?>