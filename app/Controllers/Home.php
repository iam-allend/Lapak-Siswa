<?php

namespace App\Controllers;
use App\Models\ProductSiswaModel;
use App\Models\KategoriModel;
use App\Models\AdminModel;
use App\Models\CustomerModel;
use App\Models\UrlImageProductSiswaModel;


class Home extends BaseController
{
    protected $productModel;
    protected $kategoriModel;
    protected $adminModel;
    protected $deposit;
    protected $session;
    protected $urlImageProductSiswaModel;

    public function __construct()
    {
        $this->productModel = new ProductSiswaModel();
        $this->kategoriModel = new KategoriModel();
        $this->deposit = new CustomerModel();
        $this->session = session();
        $this->urlImageProductSiswaModel = new UrlImageProductSiswaModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $products = $this->productModel->getProductsWithDetails();

        // Ambil gambar untuk setiap produk
        foreach ($products as &$product) {
            $product['images'] = $this->urlImageProductSiswaModel->getImagesByProductId($product['id_product']);
        }

        $userId = session()->get('id_customer');

        $saldo = $this->deposit
                    ->where('id_customer', $userId)
                    ->first();
        
        $data = [
            'products' => $products,
            'activePage' => 'Produk Siswa',
            'tittle' => 'Beranda',
            'navigasi' => 'Produk Siswa',
            'saldo' => $saldo
        ];
        return view('frontend/index', $data);
    }

    public function about()
    {
        $data = [
            'tittle' => 'Tentang Kami',
        ];
        return view('frontend/about', $data);
    }
    public function dashboard()
    {
        $this->session = session();

        if (!$this->session->has('logged_in')) {
            return redirect()->to(base_url('login'))->with('alert','belum_login');
        }
        $data = [
            'activePage' => 'Dashboard Customer',
            'tittle' => 'Lapak Siswa | Dashboard',
            'navigasi' => 'Dashboard'
        ];
        return view('frontend/dashboard/dashboard', $data);
    }
    public function profile()
    {
        $data = [
            'activePage' => 'Profile',
            'tittle' => 'Lapak Siswa | Profile',
            'navigasi' => 'Profile'
        ];
        return view('frontend/dashboard/profile', $data);
    }
    public function contactus()
    {
        $data = [
            'tittle' => 'Hubungi Kami',
        ];
        return view('frontend/contactus', $data);
    }
    public function shop()
    {
        $products = $this->productModel->getProductsWithDetails();

        // Ambil gambar untuk setiap produk
        foreach ($products as &$product) {
            $product['images'] = $this->urlImageProductSiswaModel->getImagesByProductId($product['id_product']);
        }
        
        $data = [
            'products' => $products,
            'activePage' => 'Produk Siswa',
            'tittle' => 'Shop',
            'navigasi' => 'Produk Siswa'
        ];
        return view('frontend/shop', $data);
    }
    public function shoptest()
    {
        $products = $this->productModel->getProductsWithDetails();

        // Ambil gambar untuk setiap produk
        foreach ($products as &$product) {
            $product['images'] = $this->urlImageProductSiswaModel->getImagesByProductId($product['id_product']);
        }
        
        $data = [
            'products' => $products,
            'activePage' => 'Produk Siswa',
            'tittle' => 'Shop',
            'navigasi' => 'Produk Siswa'
        ];
        return view('frontend/shoptest', $data);
    }
    public function detail()
    {
        $data = [
            'tittle' => 'Detail Produk',
        ];
        return view('frontend/detail_produk', $data);
    }

    public function blog()
    {
        $data = [
            'activePage' => 'blog',
            'tittle' => 'Lapak Siswa | blog',
            'navigasi' => 'blog'
        ];
        return view('frontend/blog', $data);
    }

    public function mitra()
    {
        $data = [
            'activePage' => 'mitra',
            'tittle' => 'Lapak Siswa | mitra',
            'navigasi' => 'mitra'
        ];
        return view('frontend/mitra', $data);
    }

    public function testimonial()
    {
        $data = [
            'activePage' => 'testimonial',
            'tittle' => 'Lapak Siswa | testimonial',
            'navigasi' => 'testionial'
        ];
        return view('frontend/testimonial', $data);
    }
}
