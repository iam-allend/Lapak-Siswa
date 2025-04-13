<script>
document.addEventListener('DOMContentLoaded', function () {
  const quantityInputs = document.querySelectorAll('.quantity-input');

  quantityInputs.forEach(input => {
    input.addEventListener('input', function () {
      const cartId = this.dataset.id;
      const quantity = parseInt(this.value) || 1;
      const price = parseFloat(this.dataset.price);
      const discountPercent = parseFloat(this.dataset.disc);

      // Elemen terkait
      const totalHargaEl = document.querySelector(`.total-harga-per-item[data-id='${cartId}']`);
      const discountEl = document.querySelector(`.discount-amount[data-id='${cartId}']`);

      // Hitung diskon dan total harga
      const discountNominal = (price * discountPercent / 100) * quantity;
      const totalPerItem = (price * quantity) - discountNominal;

      // Format ke Rupiah
      const formatRupiah = num => 'Rp. ' + num.toLocaleString('id-ID');

      // Update nilai ke input
      totalHargaEl.value = formatRupiah(totalPerItem);
      discountEl.value = '-' + formatRupiah(discountNominal);
      discountEl.dataset.quantity = quantity; // Update juga quantity di atribut data

      // Optional: update total semua harga di keranjang
      updateTotalHarga();
    });
  });

  function updateTotalHarga() {
    let total = 0;
    document.querySelectorAll('.total-harga-per-item').forEach(item => {
      const value = item.value.replace(/[^\d]/g, '');
      total += parseInt(value) || 0;
    });

    document.getElementById('totalHarga').innerText = 'Rp. ' + total.toLocaleString('id-ID');
  }

  // Trigger hitung awal saat halaman dimuat
  quantityInputs.forEach(input => input.dispatchEvent(new Event('input')));
});
</script>
