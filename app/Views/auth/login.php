<?= $this->include('auth/layOutTemplate/header'); ?>

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
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
              <p class="mb-4">Silahkan masuk untuk melanjutkan</p>

              <form class="mb-3" action="<?= base_url('auth/login') ?>" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email or Username</label>
                    <input
                        type="text"
                        class="form-control"
                        id="email"
                        name="email-username"
                        placeholder="Masukkan email atau username"
                        autofocus
                    />
                </div>
                <div class="mb-3 form-password-toggle">
                    <div class="d-flex justify-content-between">
                        <label class="form-label" for="password">Password</label>
                    </div>
                    <div class="input-group input-group-merge">
                        <input
                            type="password"
                            id="password"
                            class="form-control"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password"
                        />
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
                </div>
              </form>


              <p class="text-center">
                <span>Belum punya akun?</span>
                <a href="<?= base_url('register')?>">
                  <span>Registrasi disini!</span>
                </a>
              </p>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

<?= $this->include('auth/layOutTemplate/footer'); ?>