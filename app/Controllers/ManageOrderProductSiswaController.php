<?php

namespace App\Controllers;

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
    protected $customerModel;
    protected $adminModel;
    protected $keuanganModel;

    public function __construct()
    {
        $this->transaksiModel = new OrderProductSiswaModel();
        $this->productModel = new ProductSiswaModel();
        $this->customerModel = new CustomerModel();
        $this->adminModel = new AdminModel();
    }

    // Menampilkan daftar transaksi
    public function index()
    {
        $transactions = $this->transaksiModel->getTransactionsWithDetails();

        $data = [
            'transactions' => $transactions,
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

    public function store()
    {
        // dd($this->request->getPost());
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
                'id_admin' => $this->request->getPost('id_admin'), // id_admin diambil dari input hidden
                'id_customer' => $this->request->getPost('id_customer'),
                'quantity' => $quantity,
                'price_at_transaction' => $product['price_final'], // Simpan harga saat transaksi
                'total_price' => $totalPrice,
                'status_order' => 'proses',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->transaksiModel->insert($transactionData);

            // Kurangi saldo customer
            $this->customerModel->update($customer['id_customer'], [
                'saldo' => $customer['saldo'] - $totalPrice
            ]);

            return redirect()->to('/manage-order-product-siswa')->with('success', 'Transaksi berhasil ditambahkan!');

        } catch (\Exception $e) {
            // Tangkap error dan tampilkan pesan
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Menampilkan form edit status transaksi
    public function edit($id)
    {
        $transaction = $this->transaksiModel->getTransactionsWithDetails($id);

        $data = [
            'transaction' => $transaction,
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
        $newStatus = $this->request->getPost('status');

        // Jika status diubah ke "selesai", kurangi stok produk
        if ($newStatus === 'selesai' && $transaction['status'] !== 'selesai') {
            $product = $this->productModel->find($transaction['id_product']);
            $this->productModel->update($product['id_product'], [
                'stock' => $product['stock'] - $transaction['quantity'],
                'sell' => $product['sell'] + $transaction['quantity']
            ]);

            // Log keuangan (jika diperlukan)
            $this->keuanganModel->insert([
                'id_transaksi' => $id,
                'jumlah' => $transaction['total_price'],
                'jenis' => 'pendapatan',
                'keterangan' => 'Transaksi produk siswa #' . $id,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        $this->transaksiModel->update($id, [
            'status_order' => $newStatus,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/manage-order-product-siswa')->with('success', 'Status transaksi berhasil diubah!');
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

        return redirect()->to('/manage-order-product-siswa')->with('success', 'Transaksi berhasil dihapus!');
    }
}