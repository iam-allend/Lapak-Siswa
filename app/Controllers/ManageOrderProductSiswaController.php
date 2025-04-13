<?php

namespace App\Controllers;

use App\Models\UrlImageProductSiswaModel;
use App\Models\OrderProductSiswaModel;
use App\Models\ProductSiswaModel;
use App\Models\CustomerModel;
use App\Models\AdminModel;
use App\Models\KeuanganModel;
use CodeIgniter\Controller;

class ManageOrderProductSiswaController extends Controller
{
    protected $transaksiModel;
    protected $productModel;
    protected $urlImageProductModel;
    protected $customerModel;
    protected $adminModel;
    protected $keuanganModel;

    public function __construct()
    {
        $this->urlImageProductModel = new UrlImageProductSiswaModel();
        $this->transaksiModel = new OrderProductSiswaModel();
        $this->productModel = new ProductSiswaModel();
        $this->customerModel = new CustomerModel();
        $this->adminModel = new AdminModel();
        $this->keuanganModel = new KeuanganModel(); // Inisialisasi KeuanganModel

    }

    // Menampilkan daftar transaksi
    public function index()
    {
        // Ambil semua transaksi beserta detailnya
        $transactions = $this->transaksiModel->getTransactionsWithDetails();

        // Ambil gambar untuk setiap produk yang terkait dengan transaksi
        foreach ($transactions as &$transaction) {
            $product = $this->productModel->find($transaction['id_product']);
            if ($product) {
                $transaction['images'] = $this->urlImageProductModel->getImagesByProductId($product['id_product']);
            } else {
                $transaction['images'] = []; // Jika produk tidak ditemukan, set images kosong
            }
        }

        $data = [
            'transactions' => $transactions, // Kirim data transaksi beserta gambar ke view
            'activePage' => 'Manage Order Product Siswa',
            'tittle' => 'Lapak Siswa | Kelola Transaksi',
            'navigasi' => 'Manage Order Product Siswa'
        ];

        return view('backend/page/order-product-siswa/manage-order-product-siswa', $data);
    }

    // Menampilkan form tambah transaksi
    public function create()
    {
        $data = [
            'products' => $this->productModel->getProductWithCategoryAndAdmin(),
            'customers' => $this->customerModel->findAll(),
            'admins' => $this->adminModel->findAll(),
            'activePage' => 'Tambah Transaksi',
            'tittle' => 'Lapak Siswa | Tambah Transaksi',
            'navigasi' => 'Tambah Data Transaksi'
        ];

        return view('backend/page/order-product-siswa/add-order-product-siswa', $data);
    }

    // Method untuk menyimpan transaksi baru
        public function store()
        {
            // Validasi input
            $validation = $this->validate([
                'id_product' => 'required|numeric',
                'id_customer' => 'required|numeric',
                'quantity' => 'required|numeric|min_length[1]',
            ]);

            if (!$validation) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            try {
                // Ambil data produk dan customer
                $product = $this->productModel->find($this->request->getPost('id_product'));
                $customer = $this->customerModel->find($this->request->getPost('id_customer'));

                // Hitung total harga
                $quantity = $this->request->getPost('quantity');
                $totalPrice = $product['price_final'] * $quantity;

                // Validasi saldo customer
                if ($customer['saldo'] < $totalPrice) {
                    return redirect()->back()->withInput()->with('error', 'Saldo customer tidak mencukupi!');
                }

                // Simpan transaksi
                $transactionData = [
                    'id_product' => $this->request->getPost('id_product'),
                    'id_admin' => $this->request->getPost('id_admin'),
                    'id_customer' => $this->request->getPost('id_customer'),
                    'quantity' => $quantity,
                    'price_at_transaction' => $product['price_final'],
                    'total_price' => $totalPrice,
                    'status_order' => 'proses',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ];

                // Simpan transaksi ke database
                $transactionId = $this->transaksiModel->insert($transactionData);

                // Kurangi saldo customer
                $this->customerModel->update($customer['id_customer'], [
                    'saldo' => $customer['saldo'] - $totalPrice
                ]);

                // // Simpan catatan keuangan
                // $this->keuanganModel->addKeuangan([
                //     'id_transaksi' => $transactionId,
                //     'jumlah' => $totalPrice,
                //     'jenis' => 'pendapatan',
                //     'keterangan' => 'Transaksi produk siswa #' . $transactionId,
                //     'created_at' => date('Y-m-d H:i:s')
                // ]);

                return redirect()->to('/manage-order-product-siswa')->with('primary', 'Transaksi berhasil ditambahkan!');

            } catch (\Exception $e) {
                // Tangkap error dan tampilkan pesan
                return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
            }
        }

    // Menampilkan form edit status transaksi
    public function edit($id) {
        // Ambil data transaksi dengan JOIN ke tabel produk
        $transaction = $this->transaksiModel->getTransactionWithDetails($id);
    
        if (!$transaction) {
            return redirect()->to('/manage-order-product-siswa')->with('error', 'Transaksi tidak ditemukan!');
        }
    
        $data = [
            'transaction' => $transaction, // Pastikan data ini memiliki key 'product_name'
            'activePage' => 'Edit Transaksi',
            'tittle' => 'Lapak Siswa | Edit Transaksi',
            'navigasi' => 'Edit Data Transaksi'
        ];
    
        return view('backend/page/order-product-siswa/edit-order-product-siswa', $data);
    }

    // Mengupdate status transaksi (misal: ke "selesai")
    public function update($id)
    {
        $transaction = $this->transaksiModel->find($id);
        $transactiondetail = $this->transaksiModel->getTransactionWithDetails($id);

        if (!$transaction) {
            return redirect()->to('/manage-order-product-siswa')->with('error', 'Transaksi tidak ditemukan!');
        }

        $newStatus = $this->request->getPost('status_order');

        // Jika status diubah ke "selesai" DAN sebelumnya bukan "selesai"
        if ($newStatus === 'selesai' && $transaction['status_order'] !== 'selesai') {
            // 1. Update stok produk
            $product = $this->productModel->find($transaction['id_product']);
            $this->productModel->update($product['id_product'], [
                'stock' => $product['stock'] - $transaction['quantity'],
                'sell' => $product['sell'] + $transaction['quantity']
            ]);

            // 2. Tambahkan catatan keuangan HANYA jika status berubah ke selesai
            $this->keuanganModel->addKeuangan([
                'id_transaksi' => $id,
                'jumlah' => $transaction['total_price'],
                'jenis' => 'pendapatan',
                'keterangan' => 'Transaksi produk siswa #' . $id . " - " . $transactiondetail['product_name'],
                'asal' => 'Success Order Produk Siswa',
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        // 3. Update status transaksi untuk SEMUA kasus
        $this->transaksiModel->update($id, [
            'status_order' => $newStatus,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/manage-order-product-siswa')->with('primary', 'Status transaksi berhasil diubah!');
    }

    // Menghapus transaksi (jika diperlukan)
    public function delete($id)
    {
        $transaction = $this->transaksiModel->find($id);

        // Kembalikan saldo customer jika transaksi dihapus
        $customer = $this->customerModel->find($transaction['id_customer']);
        $this->customerModel->update($customer['id_customer'], [
            'saldo' => $customer['saldo'] + $transaction['total_price']
        ]);

        $this->transaksiModel->delete($id);

        return redirect()->to('/manage-order-product-siswa')->with('primary', 'Transaksi berhasil dihapus!');
    }
}