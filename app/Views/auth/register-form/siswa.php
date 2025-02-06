                <div class="mb-3">
                  <label for="username" class="form-label">Full Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="fullname"
                    placeholder="Enter your name"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Kelas</label>
                  <select class="form-select" name="kelas" id="" required>
                    <option value="">-- Pilih --</option>
                    <?php foreach($kelas as $value){?>
                    <option value="<?= $value['id_kelas']?>"><?= $value['nama']?></option>
                    <?php };?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Gender</label>
                  <select class="form-select" name="gender" id="" required>
                    <option value="">-- Pilih --</option>
                    <option value="male">Laki-Laki</option>
                    <option value="female">Perempuan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder="Enter your username"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email" required />
                </div>
                <div class="mb-3 form-password-toggle">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Foto Profile</label>
                  <input type="file" class="form-control" name="photo" required>
                </div>
