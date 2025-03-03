<?php

namespace App\Controllers;
use App\Models\ProductSiswaModel;
use App\Models\KategoriModel;
use App\Models\AdminModel;
use App\Models\UrlImageProductSiswaModel;


class Home extends BaseController
{
    protected $productModel;
    protected $kategoriModel;
    protected $adminModel;
    protected $urlImageProductSiswaModel;

    public function __construct()
    {
        $this->productModel = new ProductSiswaModel();
        $this->kategoriModel = new KategoriModel();
        $this->urlImageProductSiswaModel = new UrlImageProductSiswaModel();
        $this->adminModel = new AdminModel();
    }

    public function index()
    {
        $data = [
            'tittle' => 'Beranda',
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
    public function profile()
    {
        $data = [
            'tittle' => 'Dashboard Profile',
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
    public function detail()
    {
        $data = [
            'tittle' => 'Detail Produk',
        ];
        return view('frontend/detail_produk', $data);
    }
    public function cart()
    {
        $data = [
            'tittle' => 'Keranjang',
        ];
        return view('frontend/cart', $data);
    }
}
