<script>
    function formatRupiah(angka) {
    return new Intl.NumberFormat('id-ID', {
      style: 'currency',
      currency: 'IDR'
    }).format(angka);
  }

  function hitungTotalHarga() {
  let total = 0;

  document.querySelectorAll('.quantity-input').forEach(input => {
    const qty = parseInt(input.value);
    const price = parseFloat(input.dataset.price);
    const discount = parseInt(input.dataset.disc); // Diskon dari database (%)

    if (!isNaN(qty) && !isNaN(price) && !isNaN(discount)) {
      const subtotal = qty * price;
      const diskon = subtotal * (discount / 100); // Diskon dihitung dari persentase
      total += subtotal - diskon;
    }
  });

  const formatted = formatRupiah(total);

  // Tampilkan hasil
  const totalHargaId = document.getElementById('totalHarga');
  if (totalHargaId) {
    totalHargaId.textContent = formatted;
  }

  document.querySelectorAll('.totalHarga').forEach(el => {
    el.textContent = formatted;
  });
}


  function hitungTotalHarga() {
  let total = 0;
  let totalDiskon = 0;

  document.querySelectorAll('.quantity-input').forEach(input => {
    const qty = parseInt(input.value);
    const price = parseFloat(input.dataset.price);
    const discount = parseInt(input.dataset.disc); // Diskon dari database (%)

    if (!isNaN(qty) && !isNaN(price) && !isNaN(discount)) {
      const subtotal = qty * price;
      const diskon = subtotal * (discount / 100);

      total += subtotal - diskon;
      totalDiskon += diskon;
    }
  });

  const formattedTotal = "Rp. " + formatRupiah(total);
  const formattedDiskon = "-Rp. " + formatRupiah(Math.round(totalDiskon));

  // Tampilkan total harga
  const totalHargaId = document.getElementById('totalHarga');
  if (totalHargaId) {
    totalHargaId.textContent = formattedTotal;
  }
  document.querySelectorAll('.totalHarga').forEach(el => {
    el.textContent = formattedTotal;
  });

  // Tampilkan total diskon
  const diskonId = document.getElementById('totalDiskon');
  if (diskonId) {
    diskonId.textContent = formattedDiskon;
  }
  document.querySelectorAll('.totalDiskon').forEach(el => {
    el.textContent = formattedDiskon;
  });
}



  // Event listener setiap quantity berubah
  document.querySelectorAll('.quantity-input').forEach(input => {
    input.addEventListener('change', function () {
      const cartId = this.dataset.id;
      const quantity = this.value;

      // Kirim AJAX ke server untuk update quantity
      fetch(`<?= base_url('cart/updateQuantity') ?>`, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
        },
        body: JSON.stringify({
          id: cartId,
          quantity: quantity
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          console.log('Quantity updated');
          hitungTotalHarga(); // update total
        } else {
          alert('Gagal update quantity');
        }
      });
    });
  });

  document.querySelectorAll('.quantity-input').forEach(input => {
  input.addEventListener('input', function () {
    const quantity = parseInt(this.value) || 0;
    const price = parseFloat(this.dataset.price) || 0;
    const discount = parseInt(this.dataset.disc) || 0; // Ambil diskon dari atribut
    const cartId = this.dataset.id;

    const subtotal = price * quantity;
    const diskonNominal = subtotal * (discount / 100);
    const total = subtotal - diskonNominal;

    // Update total per item di UI
    const totalInput = document.querySelector(`.total-harga-per-item[data-id="${cartId}"]`);
    if (totalInput) {
      totalInput.value = `Rp. ${new Intl.NumberFormat('id-ID').format(total)}`;
    }

    // (Opsional) Update total seluruh pesanan
    updateTotalOrder();

    // (Opsional) Kirim ke server untuk update quantity di database
    fetch(`<?= base_url('cart/updateQuantity') ?>`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
      },
      body: JSON.stringify({
        cart_id: cartId,
        quantity: quantity
      })
    }).then(res => res.json())
      .then(response => {
        if (!response.status || response.status !== 'success') {
          alert('Gagal update quantity.');
        }
      });
  });
});

function updateTotalOrder() {
  let total = 0;
  document.querySelectorAll('.quantity-input').forEach(input => {
    const quantity = parseInt(input.value);
    const price = parseFloat(input.dataset.price);
    const discount = parseInt(this.dataset.disc) || 0;
    const discountedPrice = price - (price * (discount / 100));
    total += discountedPrice * quantity;
  });

  document.querySelector('#total-order').textContent = `Rp. ${new Intl.NumberFormat('id-ID').format(total)}`;
}

  // Hitung total pertama kali saat halaman load
  window.addEventListener('DOMContentLoaded', hitungTotalHarga);

  document.querySelectorAll('.quantity-input').forEach(function(input) {
    input.addEventListener('input', function () {
      const cartId = this.dataset.id;
      const price = parseInt(this.dataset.price);
      const discount = parseInt(this.dataset.disc);
      const quantity = parseInt(this.value) || 0;

      const row = this.closest('.row');
      const discountField = row.querySelector('.discount-amount');

      // Hitung diskon real-time
      const diskonNominal = (price * (discount / 100)) * quantity;
      if (discountField) {
        discountField.value = `-Rp. ${formatRupiah(diskonNominal)}`;
      }

      // Kirim ke server pakai AJAX
      fetch("<?= base_url('cart/updateQuantity') ?>", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
          "X-Requested-With": "XMLHttpRequest" // CI4 AJAX check
        },
        body: JSON.stringify({
          cart_id: cartId,
          quantity: quantity
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.status === "success") {
          updateGrandTotal();
        }
      });
    });
  });

  function formatRupiah(angka) {
    return angka.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  }

  function updateGrandTotal() {
    let total = 0;
    document.querySelectorAll('.quantity-input').forEach(function(input) {
      const price = parseInt(input.dataset.price);
      const qty = parseInt(input.value) || 0;
      const discount = parseInt(input.dataset.disc);
      total += (price - (discount / 100)) * qty;
    });

    const display = document.querySelector('.grand-total');
    if (display) {
      display.textContent = `Total : Rp. ${formatRupiah(total)}`;
    }
  }

  // Jalankan saat load awal
  updateGrandTotal();


</script>