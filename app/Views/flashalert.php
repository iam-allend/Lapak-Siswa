<?php if (session()->getFlashdata('alert') === 'register_sukses'): ?>
    <script>
        Swal.fire({
            title: 'Akun Anda telah berhasil dibuat!',
            text: 'Silakan login untuk melanjutkan.',
            icon: 'success',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'login_sukses'): ?>
    <script>
        Swal.fire({
            title: 'Anda telah berhasil masuk!',
            icon: 'success',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'belum_login'): ?>
    <script>
        Swal.fire({
            title: 'Akses dilarang!',
            icon: 'error',
            text: 'silahkan login terlebih dahulu',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'add_cart'): ?>
    <script>
        Swal.fire({
            title: 'berhasil menambah produk!',
            icon: 'success',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'checkout_sukses'): ?>
    <script>
        Swal.fire({
            title: 'berhasil menambah produk!',
            icon: 'success',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'saldo_tidak_cukup'): ?>
    <script>
        Swal.fire({
            title: 'Saldo tidak cukup!',
            icon: 'error',
            text: 'silakan top up terlebih dahulu',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'delete_cart'): ?>
    <script>
        Swal.fire({
            title: 'berhasil menghapus produk!',
            icon: 'success',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'add_cart_failed'): ?>
    <script>
        Swal.fire({
            title: 'gagal menambah produk!',
            icon: 'error',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'profile-admin'): ?>
    <script>
        Swal.fire({
            title: 'Profile berhasil di Update!',
            icon: 'success',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'validate_usn_login'): ?>
    <script>
        Swal.fire({
            title: 'Gagal masuk!',
            text: 'Periksa kembali username anda!',
            icon: 'error',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'validate_email_login'): ?>
    <script>
        Swal.fire({
            title: 'Gagal masuk!',
            text: 'Periksa kembali email anda!',
            icon: 'error',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'validate_pw_login'): ?>
    <script>
        Swal.fire({
            title: 'Gagal masuk!',
            text: 'Periksa kembali password anda!',
            icon: 'error',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'validate_status_account'): ?>
    <script>
        Swal.fire({
            title: 'Akun belum terverifikasi!',
            text: 'Silahkan hubungi TU untuk verifikasi akun!',
            icon: 'error',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'validate_usn_email'): ?>
    <script>
        Swal.fire({
            title: 'Username dan Email sudah digunakan!',
            text: 'Silahkan gunakan username dan email yang lain',
            icon: 'error',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'validate_username'): ?>
    <script>
        Swal.fire({
            title: 'Username sudah digunakan!',
            text: 'Silahkan gunakan username yang lain',
            icon: 'error',
            confirmButtonText: 'Oke',
        });
    </script>
<?php elseif (session()->getFlashdata('alert') === 'validate_email'): ?>
    <script>
        Swal.fire({
            title: 'Email sudah digunakan!',
            text: 'Silahkan gunakan email yang lain',
            icon: 'error',
            confirmButtonText: 'Oke',
        });
    </script>

<?php endif; ?>