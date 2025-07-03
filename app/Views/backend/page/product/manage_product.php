<div class="container-fluid mt-4"> 
    <h1 class="h3 mb-4 text-gray-800 text-center">Kelola Produk Mobile App</h1> 

    <div id="notification" class="alert" role="alert" style="display: none;"></div>

    <button id="addProductBtn" class="btn btn-primary mb-3"><i class="fas fa-plus-circle me-2"></i> Tambah Produk Baru</button>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Merk</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Foto</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="productListTableBody">
                        </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="productFormContainer" class="card shadow mb-4 form-section" style="display: none;">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><span id="formTitle">Tambah</span> Produk</h6>
        </div>
        <div class="card-body">
            <form id="productForm" enctype="multipart/form-data">
                <input type="hidden" id="productCode" name="kode">

                <div class="mb-3">
                    <label for="merk" class="form-label">Merk:</label>
                    <input type="text" id="merk" name="merk" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori:</label>
                    <input type="text" id="kategori" name="kategori" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan:</label>
                    <input type="text" id="satuan" name="satuan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="hargabeli" class="form-label">Harga Beli:</label>
                    <input type="number" id="hargabeli" name="hargabeli" step="0.01" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="diskonbeli" class="form-label">Diskon Beli (%):</label>
                    <input type="number" id="diskonbeli" name="diskonbeli" step="0.01" value="0" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="hargapokok" class="form-label">Harga Pokok:</label>
                    <input type="number" id="hargapokok" name="hargapokok" step="0.01" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="hargajual" class="form-label">Harga Jual:</label>
                    <input type="number" id="hargajual" name="hargajual" step="0.01" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="diskonjual" class="form-label">Diskon Jual (%):</label>
                    <input type="number" id="diskonjual" name="diskonjual" step="0.01" value="0" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="stok" class="form-label">Stok:</label>
                    <input type="number" id="stok" name="stok" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi:</label>
                    <textarea id="deskripsi" name="deskripsi" rows="5" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Produk:</label>
                    <input type="file" id="foto" name="foto" accept="image/*" class="form-control">
                    <img id="currentProductFoto" src="" alt="Foto Produk" class="current-foto-preview" style="display: none;">
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="button" id="cancelFormBtn" class="btn btn-secondary me-2">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->section('javascript'); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const API_BASE_URL = '<?= base_url('API_Product/') ?>'; 
        const productListTableBody = document.getElementById('productListTableBody');
        const addProductBtn = document.getElementById('addProductBtn');
        const productFormContainer = document.getElementById('productFormContainer');
        const productForm = document.getElementById('productForm');
        const formTitle = document.getElementById('formTitle');
        const cancelFormBtn = document.getElementById('cancelFormBtn');
        const productCodeInput = document.getElementById('productCode');
        const currentProductFoto = document.getElementById('currentProductFoto');
        const notification = document.getElementById('notification');
        const fotoInput = document.getElementById('foto'); 
        let isEditMode = false;
        function showNotification(message, type) {
            notification.textContent = message;
            notification.className = `alert alert-${type === 'success' ? 'success' : 'danger'}`; 
            notification.style.display = 'block';
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000); 
        }

        function resetForm() {
            productForm.reset();
            productCodeInput.value = ''; 
            formTitle.textContent = 'Tambah';
            currentProductFoto.style.display = 'none';
            currentProductFoto.src = '';
            fotoInput.value = ''; 
            isEditMode = false;
        }

        function showForm() {
            productFormContainer.style.display = 'block';
            window.scrollTo(0, document.body.scrollHeight); 
        }

        function hideForm() {
            productFormContainer.style.display = 'none';
        }

        async function fetchProducts() {
            productListTableBody.innerHTML = '<tr><td colspan="7" class="text-center py-3"><i class="fas fa-spinner fa-spin me-2"></i>Memuat produk...</td></tr>';
            try {
                const response = await fetch(`${API_BASE_URL}get_all_products.php`); 
                const data = await response.json();

                productListTableBody.innerHTML = ''; 
                if (data.status === 'sukses' && data.data && data.data.length > 0) {
                    data.data.forEach(product => {
                        const row = productListTableBody.insertRow();
                        row.insertCell(0).textContent = product.kode;
                        row.insertCell(1).textContent = product.merk;
                        row.insertCell(2).textContent = product.kategori;
                        row.insertCell(3).textContent = formatRupiah(product.hargajual);
                        row.insertCell(4).textContent = product.stok;

                        const fotoCell = row.insertCell(5);
                        if (product.foto) {
                            const img = document.createElement('img');
                            img.src = `${API_BASE_URL}images/product/${product.foto}`; 
                            img.alt = product.merk;
                            img.className = 'product-img'; 
                            fotoCell.appendChild(img);
                        } else {
                            fotoCell.textContent = 'N/A';
                        }

                        const actionCell = row.insertCell(6);
                        const editBtn = document.createElement('button');
                        editBtn.innerHTML = '<i class="fas fa-edit"></i> Edit';
                        editBtn.className = 'btn btn-secondary btn-sm me-2';
                        editBtn.onclick = () => editProduct(product.kode);

                        const deleteBtn = document.createElement('button');
                        deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i> Hapus';
                        deleteBtn.className = 'btn btn-danger btn-sm';
                        deleteBtn.onclick = () => deleteProduct(product.kode);

                        actionCell.appendChild(editBtn);
                        actionCell.appendChild(deleteBtn);
                    });
                } else {
                    productListTableBody.innerHTML = '<tr><td colspan="7" class="text-center py-3">Tidak ada produk tersedia.</td></tr>';
                }
            } catch (error) {
                console.error('Error fetching products:', error);
                productListTableBody.innerHTML = '<tr><td colspan="7" class="text-center py-3 text-danger">Gagal memuat produk. Terjadi kesalahan jaringan.</td></tr>';
                showNotification('Gagal memuat produk. Terjadi kesalahan jaringan.', 'error');
            }
        }

        productForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(productForm); 
            const url = isEditMode ? `${API_BASE_URL}edit_product.php` : `${API_BASE_URL}add_product.php`;

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData 
                });
                const result = await response.json();

                if (result.status === 'sukses') {
                    showNotification(result.message, 'success');
                    resetForm();
                    hideForm();
                    fetchProducts(); 
                } else {
                    showNotification(result.message || 'Operasi gagal.', 'error');
                }
            }
            catch (error) {
                console.error('Error saving product:', error);
                showNotification('Gagal menyimpan produk. Terjadi kesalahan jaringan.', 'error');
            }
        });

        async function editProduct(kode) {
            try {
                const response = await fetch(`${API_BASE_URL}get_product_details.php?kode=${kode}`); 
                const data = await response.json();

                if (data.status === 'sukses' && data.data) {
                    const product = data.data;
                    productCodeInput.value = product.kode;
                    document.getElementById('merk').value = product.merk;
                    document.getElementById('kategori').value = product.kategori;
                    document.getElementById('satuan').value = product.satuan;
                    document.getElementById('hargabeli').value = product.hargabeli;
                    document.getElementById('diskonbeli').value = product.diskonbeli;
                    document.getElementById('hargapokok').value = product.hargapokok;
                    document.getElementById('hargajual').value = product.hargajual;
                    document.getElementById('diskonjual').value = product.diskonjual;
                    document.getElementById('stok').value = product.stok;
                    document.getElementById('deskripsi').value = product.deskripsi;

                    if (product.foto) {
                        currentProductFoto.src = `${API_BASE_URL}images/product/${product.foto}`;
                        currentProductFoto.style.display = 'block';
                    } else {
                        currentProductFoto.style.display = 'none';
                    }

                    formTitle.textContent = 'Edit';
                    isEditMode = true;
                    showForm();
                } else {
                    showNotification('Detail produk tidak ditemukan.', 'error');
                }
            } catch (error) {
                console.error('Error fetching product details:', error);
                showNotification('Gagal memuat detail produk.', 'error');
            }
        }

        async function deleteProduct(kode) {
            if (!confirm(`Apakah Anda yakin ingin menghapus produk dengan kode ${kode}?`)) {
                return;
            }

            try {
                const response = await fetch(`${API_BASE_URL}delete_product.php`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `kode=${encodeURIComponent(kode)}`
                });
                const result = await response.json();

                if (result.status === 'sukses') {
                    showNotification(result.message, 'success');
                    fetchProducts(); 
                } else {
                    showNotification(result.message || 'Penghapusan gagal.', 'error');
                }
            } catch (error) {
                console.error('Error deleting product:', error);
                showNotification('Gagal menghapus produk. Terjadi kesalahan jaringan.', 'error');
            }
        }

        addProductBtn.addEventListener('click', () => {
            resetForm();
            showForm();
        });

        cancelFormBtn.addEventListener('click', () => {
            hideForm();
            resetForm();
        });

        fetchProducts();

        function formatRupiah(number) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(number);
        }
    });
</script>
<?= $this->endSection(); ?>