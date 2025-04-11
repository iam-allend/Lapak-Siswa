<?php

namespace App\Controllers;
use App\Models\CartModel;
use App\Models\UrlImageProductSiswaModel;

class CartController extends BaseController
{
    protected $cartModel;
    protected $urlImageProductSiswaModel;

    protected $session;

    public function __construct()
    {
        $this->cartModel = new CartModel();
        $this->urlImageProductSiswaModel = new UrlImageProductSiswaModel();

    }

    public function index()
    {
        $userId = session()->get('id_customer');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You need to log in first.'); 
        }

        $cart = $this->cartModel->getProduk($userId);

        foreach ($cart as &$product) {
            $product['images'] = $this->urlImageProductSiswaModel->getImagesByProductId($product['id_product']);
        }
        unset($product); 

        $data = [
            'activePage' => 'Keranjang',
            'tittle' => 'Lapak Siswa | Keranjang', 
            'navigasi' => 'Keranjang',
            'cart' => $cart
        ];

        return view('frontend/dashboard/cart', $data);
    }

    public function getCartItems()
    {
        $userId = session()->get('id_customer');

        if (!$userId) {
            return redirect()->to('/login')->with('error', 'You need to log in first.'); 
        }

        $cart = $this->cartModel->getProduk($userId);

        foreach ($cart as &$product) {
            $product['images'] = $this->urlImageProductSiswaModel->getImagesByProductId($product['id_product']);
        }
        unset($product);

        $data = [
            'activePage' => 'Keranjang',
            'tittle' => 'Lapak Siswa | Keranjang',
            'navigasi' => 'Keranjang',
            'cart' => $cart
        ];

        return view('frontend/dashboard/cart_produk', $data);
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
        if ($this->request->isAJAX()) {
            if ($this->cartModel->delete($id)) {
                return $this->response->setJSON(['status' => 'success', 'message' => 'Item deleted successfully.']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete item.']);
            }
        }
    }  

}
