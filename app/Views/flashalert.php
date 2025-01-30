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
<?php elseif (session()->getFlashdata('alert') === 'login_gagal'): ?>
    <script>
        Swal.fire({
            title: 'Gagal masuk!',
            text: 'Periksa kembali username/password anda!',
            icon: 'error',
            confirmButtonText: 'Oke',
        });
    </script>
<?php endif; ?>