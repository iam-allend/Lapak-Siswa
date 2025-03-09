<?php

namespace App\Controllers;

use App\Models\TransaksiIndperModel;
use App\Models\ProductIndperModel;
use App\Models\IndustriModel;
use App\Models\CustomerModel;
use App\Models\KeuanganModel;
use CodeIgniter\Controller;
use App\Models\UrlImageProductIndperModel;

class ManageOrderProductIndperController extends Controller
{
    protected $transaksiModel;
    protected $productModel;
    protected $industriModel;
    protected $customerModel;
    protected $keuanganModel;
    protected $urlImageProductModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiIndperModel();
        $this->productModel = new ProductIndperModel();
        $this->industriModel = new IndustriModel();
        $this->customerModel = new CustomerModel();
        $this->keuanganModel = new KeuanganModel();
        $this->urlImageProductModel = new UrlImageProductIndperModel();
    }

    // Menampilkan daftar transaksi
    // Di ManageTransaksiIndperController
    public function index()
    {
        // Ambil semua transaksi beserta detailnya
        $transactions = $this->transaksiModel->getTransactionsWithDetails();

        // Ambil gambar untuk setiap produk yang terkait dengan transaksi
        foreach ($transactions as &$transaction) {
            $product = $this->productModel->find($transaction['id_product']);
            if ($product) {
                // Ambil gambar produk dari tabel url_image_product_indper
                $transaction['images'] = $this->urlImageProductModel->getImagesByProductId($product['id_product']);
            } else {
                $transaction['images'] = []; // Jika produk tidak ditemukan, set images kosong
            }
        }

        $data = [
            'transactions' => $transactions, // Kirim data transaksi beserta gambar ke view
            'activePage' => 'Manage Order Product IndPer',
            'tittle' => 'Lapak Industri/Perusahaan | Kelola Transaksi',
            'navigasi' => 'Manage Transaksi Data'
        ];

        return view('backend/page/order-product-indper/manage-order-product-indper', $data);
    }

    // Menampilkan form tambah transaksi
    public function create()
    {
        $data = [
            'products' => $this->productModel->getProductsWithIndustri(), // Gunakan method baru
            'industris' => $this->industriModel->findAll(),
            'customers' => $this->customerModel->findAll(),
            'activePage' => 'Tambah Transaksi',
            'tittle' => 'Lapak Industri/Perusahaan | Tambah Transaksi',
            'navigasi' => 'Tambah Data Transaksi'
        ];

        return view('backend/page/order-product-indper/add-order-product-indper', $data);
    }

    // Menyimpan transaksi baru
    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'id_product' => 'required|numeric',
            'id_industri' => 'required|numeric',
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
                'id_industri' => $this->request->getPost('id_industri'),
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

            return redirect()->to('/manage-order-product-indper')->with('primary', 'Transaksi berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // Menampilkan form edit status transaksi
    public function edit($id)
    {
        $transaction = $this->transaksiModel->getTransactionWithDetails($id);

        if (!$transaction) {
            return redirect()->to('/manage-order-product-indper')->with('error', 'Transaksi tidak ditemukan!');
        }

        $data = [
            'transaction' => $transaction,
            'activePage' => 'Edit Transaksi',
            'tittle' => 'Lapak Industri/Perusahaan | Edit Transaksi',
            'navigasi' => 'Edit Data Transaksi'
        ];

        return view('backend/page/order-product-indper/edit-order-product-indper', $data);
    }

    // Mengupdate status transaksi
    public function update($id)
    {
        $transaction = $this->transaksiModel->find($id);
        $transactionDetail = $this->transaksiModel->getTransactionWithDetails($id);

        if (!$transaction) {
            return redirect()->to('/manage-order-product-indper')->with('error', 'Transaksi tidak ditemukan!');
        }

        $newStatus = $this->request->getPost('status_order');

        // Jika status diubah ke "selesai", kurangi stok produk dan tambahkan catatan keuangan
        if ($newStatus === 'selesai' && $transaction['status_order'] !== 'selesai') {
            $product = $this->productModel->find($transaction['id_product']);
            $this->productModel->update($product['id_product'], [
                'stock' => $product['stock'] - $transaction['quantity'],
                'sell' => $product['sell'] + $transaction['quantity']
            ]);

            // Simpan catatan keuangan
            $this->keuanganModel->addKeuangan([
                'id_transaksi' => $id,
                'jumlah' => $transaction['total_price'],
                'jenis' => 'pendapatan',
                'keterangan' => 'Transaksi industri/perusahaan #' . $id . " - " . $transactionDetail['product_name'],
                'asal' => 'Order Produk',
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        // Update status transaksi
        $this->transaksiModel->update($id, [
            'status_order' => $newStatus,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/manage-order-product-indper')->with('primary', 'Status transaksi berhasil diubah!');
    }

    // Menghapus transaksi
    public function delete($id)
    {
        $transaction = $this->transaksiModel->find($id);

        // Kembalikan saldo customer jika transaksi dihapus
        $customer = $this->customerModel->find($transaction['id_customer']);
        $this->customerModel->update($customer['id_customer'], [
            'saldo' => $customer['saldo'] + $transaction['total_price']
        ]);

        $this->transaksiModel->delete($id);

        return redirect()->to('/manage-order-product-indper')->with('primary', 'Transaksi berhasil dihapus!');
    }
}