<?php

namespace App\Controllers;
use App\Models\CartModel;
use App\Models\BankModel;
use App\Models\CustomerModel;
use App\Models\OrderProductSiswaModel;
use App\Models\UrlImageProductSiswaModel;

class CartController extends BaseController
{
    protected $cartModel;
    protected $urlImageProductSiswaModel;
    protected $bankModel;
    protected $deposit;
    protected $transaksiSiswa;
    protected $session;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->bankModel = new BankModel();
        $this->deposit = new CustomerModel();
        $this->transaksiSiswa = new OrderProductSiswaModel();
        $this->urlImageProductSiswaModel = new UrlImageProductSiswaModel();

    }

    public function index()
    {
        $this->session = session();

        if (!$this->session->has('logged_in')) {
            return redirect()->to(base_url('login'))->with('alert','belum_login');
        }
        
        $userId = session()->get('id_customer');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You need to log in first.'); 
        }

        $cart = $this->cartModel->getProdukCart($userId);

        foreach ($cart as &$product) {
            $product['images'] = $this->urlImageProductSiswaModel->getImages($product['id_product']);
        }
        unset($product); 

        $saldo = $this->deposit
              ->where('id_customer', $userId)
              ->first(); 

        $data = [
            'activePage' => 'Keranjang',
            'banks' => $this->bankModel->findAll(),
            'tittle' => 'Lapak Siswa | Keranjang', 
            'navigasi' => 'Keranjang',
            'cart' => $cart,
            'saldo' => $saldo
        ];

        return view('frontend/dashboard/cart', $data);
    }

    public function getCartCount()
    {
        helper('cart_helper'); 

        $cartCount = countCart(); 

        return $this->response->setJSON(['count' => $cartCount]);
    }

    public function add_cart()
    {
        $this->cartModel = new CartModel();

        if ($this->request->isAJAX()) {
            $product_id = $this->request->getPost('product_id');
            $user_id = $this->request->getPost('user_id');
            $quantity = $this->request->getPost('quantity');

            if (!is_numeric($product_id) || !is_numeric($user_id) || !is_numeric($quantity)) {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid input data']);
            }

            $existingCartItem = $this->cartModel->where('user_id', $user_id)
                                                ->where('product_id', $product_id)
                                                ->first();

            if ($existingCartItem) {
                $existingCartItem['quantity'] += $quantity;
                if ($this->cartModel->update($existingCartItem['cart_id'], $existingCartItem)) {
                    $message = 'Berhasil menambahkan produk ke keranjang!';
                } else {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan produk ke keranjang!']);
                }
            } else {
                $cartData = [
                    'product_id' => $product_id,
                    'user_id' => $user_id,
                    'quantity' => $quantity,
                ];
                if (!$this->cartModel->insert($cartData)) {
                    return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menambahkan produk ke keranjang!']);
                }
                $message = 'Berhasil menambahkan produk ke keranjang!';
            }

            $cartCount = $this->cartModel->where('user_id', $user_id)->countAllResults();

            return $this->response->setJSON([
                'status' => 'success',
                'message' => $message,
                'cart_count' => $cartCount
            ]);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid request']);
    }

    public function hapus($id)
    {
        if (!$id) {
            return redirect()->back()->with('error', 'ID tidak valid.');
        }

        if ($this->cartModel->delete($id)) {
            return redirect()->to('/cart')->with('alert', 'delete_cart');
        } else {
            return redirect()->to('/cart')->with('alert', 'Gagal menghapus item.');
        }
    }


    public function updateQuantity()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getJSON();
            $id = $data->id;
            $quantity = $data->quantity;

            if ($this->cartModel->update($id, ['quantity' => $quantity])) {
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error']);
            }
        }

        return $this->response->setStatusCode(405); 
    }

    public function checkout()
{
    $userId = session()->get('id_customer');

    // Ambil saldo pengguna yang login
    $saldo = $this->deposit
                  ->where('id_customer', $userId)
                  ->first();

    // Pastikan saldo cukup untuk transaksi
    if ($saldo && $saldo['saldo'] > 0) {
        // Ambil semua input dari form (array)
        $id_produk = $this->request->getPost('id_produk');
        $id_admin = $this->request->getPost('id_admin');
        $id_customer = $this->request->getPost('id_customer');
        $qty = $this->request->getPost('qty');
        $harga = $this->request->getPost('harga');
        $totalItem = $this->request->getPost('totalItem');

        $data = [];
        $totalTransaction = 0; // Untuk menghitung total transaksi

        // Persiapkan data transaksi dan hitung total transaksi
        foreach ($id_produk as $i => $idProd) {
            $totalTransaction += $totalItem[$i];  // Menambahkan total item ke total transaksi

            $data[] = [
                'id_product' => $idProd,
                'id_admin' => $id_admin[$i],
                'id_customer' => $id_customer[$i],
                'quantity' => $qty[$i],
                'price_at_transaction' => $harga[$i],
                'total_price' => $totalItem[$i],
                'status_order' => 'proses'
            ];
        }

        // Cek apakah saldo cukup
        if ($saldo['saldo'] >= $totalTransaction) {
            // Insert transaksi ke database
            $this->transaksiSiswa->insertBatch($data);

            // Kurangi saldo pengguna berdasarkan total transaksi
            $newSaldo = $saldo['saldo'] - $totalTransaction;

            // Update saldo di tabel deposit
            $this->deposit->update(
                $saldo['id_customer'], 
                ['saldo' => $newSaldo]
            );

            // Hapus item cart yang terkait dengan user setelah transaksi selesai
            $this->cartModel->where('user_id', $userId)->delete();

            return redirect()->to(base_url('cart'))->with('alert', 'checkout_sukses');
        } else {
            return redirect()->to(base_url('cart'))->with('alert', 'saldo_tidak_cukup');
        }
    } else {
        return redirect()->to(base_url('cart'))->with('alert', 'saldo_tidak_ditemukan');
    }
}



}
