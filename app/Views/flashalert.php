<?php if (session()->getFlashdata('alert') === 'register_sukses'): ?>
    <script>
        Swal.fire({
            title: 'Akun Anda telah berhasil dibuat!',
            text: 'Silakan login untuk melanjutkan.',
            icon: 'success',
            confirmButtonText: 'Oke',
        });
    </script>
<?php endif; ?>