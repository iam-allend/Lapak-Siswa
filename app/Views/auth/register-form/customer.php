                <div class="mb-3">
                  <label for="username" class="form-label">Nama Lengkap</label>
                  <input
                    type="text"
                    class="form-control"
                    name="fullname"
                    placeholder="Masukan Nama Lengkap"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Jenis Kelamin</label>
                  <select class="form-select" name="gender" id="" required>
                    <option value="">-- Pilih --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input
                    type="text"
                    class="form-control"
                    name="username"
                    placeholder="Masukan username"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Masukan email" required />
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
                    <!-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> -->
                  </div>
                </div>
                <div class="mb-3">
                  <label for="alamat" class="form-label">Alamat</label>
                  <textarea class="form-control" name="alamat"></textarea>
                </div>
                <div class="mb-3">
                  <label for="telepon" class="form-label">No Telepon</label>
                  <input type="number" class="form-control" name="telp" placeholder="Masukan No Telepon" required />
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Foto Profile</label>
                  <input type="file" class="form-control" name="photo" required>
                </div>
