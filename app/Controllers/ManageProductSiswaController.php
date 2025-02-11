<?php

namespace App\Controllers;

use App\Models\ProductSiswaModel;
use App\Models\UrlImageProductSiswaModel;
use App\Models\KategoriProductModel;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class ManageProductSiswaController extends Controller
{
    protected $productModel;
    protected $urlImageProductModel;
    protected $kategoriProductModel;
    protected $adminModel;

    public function __construct()
    {
        $this->productModel = new ProductSiswaModel();
        $this->urlImageProductModel = new UrlImageProductSiswaModel();
        $this->kategoriProductModel = new KategoriProductModel();
        $this->adminModel = new AdminModel();
    }

    // Menampilkan daftar produk
    public function index()
    {
        $data = [
            'products' => $this->productModel->getProductWithCategoryAndAdmin(),
            'activePage' => 'Manage Product Siswa',
            'tittle' => 'Lapak Siswa | Kelola Produk Siswa',
            'navigasi' => 'Manage Product Siswa Data'
        ];
        return view('backend/page/product-siswa/manage-product-siswa', $data);
    }

    // Menampilkan form untuk menambah produk
    public function create()
    {
        $data = [
            'activePage' => 'Manage Product',
            'tittle' => 'Lapak Siswa | Tambah Produk',
            'navigasi' => 'Tambah Data Produk',
            'kategoris' => $this->kategoriProductModel->findAll(),
            'admins' => $this->adminModel->findAll(),
        ];
        return view('backend/page/product-siswa/add-product', $data);
    }

    // Menyimpan data produk baru
    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'product_name' => 'required|min_length[3]',
            'id_kategori' => 'required',
            'id_admin' => 'required',
            'description' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'images.*' => 'uploaded[images]|is_image[images]|max_size[images,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data produk
        $productData = [
            'id_admin' => $this->request->getPost('id_admin'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'stock' => $this->request->getPost('stock'),
            'price' => $this->request->getPost('price'),
            'price_final' => $this->request->getPost('price_final'),
            'weight' => $this->request->getPost('weight'),
            'sell' => $this->request->getPost('sell'),
            'expired' => $this->request->getPost('expired'),
            'discount' => $this->request->getPost('discount'),
            'status_registrasi' => $this->request->getPost('status_registrasi'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $productId = $this->productModel->insert($productData);

        // Simpan gambar produk
        $images = $this->request->getFiles();
        foreach ($images['images'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move(WRITEPATH . 'uploads/img_product', $newName);

                $this->urlImageProductModel->save([
                    'id_product' => $productId,
                    'url' => 'uploads/img_product-siswa/' . $newName,
                ]);
            }
        }

        return redirect()->to('/manage-product')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $data = [
            'product' => $this->productModel->find($id),
            'kategoris' => $this->kategoriProductModel->findAll(),
            'admins' => $this->adminModel->findAll(),
            'images' => $this->urlImageProductModel->getImagesByProductId($id),
            'activePage' => 'Manage Product',
            'tittle' => 'Lapak Siswa | Edit Produk',
            'navigasi' => 'Edit Data Produk'
        ];
        return view('backend/page/product-siswa/edit-product', $data);
    }

    // Memperbarui data produk
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'product_name' => 'required|min_length[3]',
            'id_kategori' => 'required',
            'id_admin' => 'required',
            'description' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'images.*' => 'is_image[images]|max_size[images,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Update data produk
        $productData = [
            'id_admin' => $this->request->getPost('id_admin'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'stock' => $this->request->getPost('stock'),
            'price' => $this->request->getPost('price'),
            'price_final' => $this->request->getPost('price_final'),
            'weight' => $this->request->getPost('weight'),
            'sell' => $this->request->getPost('sell'),
            'expired' => $this->request->getPost('expired'),
            'discount' => $this->request->getPost('discount'),
            'status_registrasi' => $this->request->getPost('status_registrasi'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->productModel->update($id, $productData);

        // Simpan gambar baru
        $images = $this->request->getFiles();
        foreach ($images['images'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move(WRITEPATH . 'uploads/img_product', $newName);

                $this->urlImageProductModel->save([
                    'id_product' => $id,
                    'url' => 'uploads/img_product-siswa/' . $newName,
                ]);
            }
        }

        return redirect()->to('/manage-product')->with('success', 'Produk berhasil diperbarui');
    }

    // Menghapus produk
    public function delete($id)
    {
        // Hapus gambar terkait
        $images = $this->urlImageProductModel->where('id_product', $id)->findAll();
        foreach ($images as $image) {
            if (file_exists(WRITEPATH . $image['url'])) {
                unlink(WRITEPATH . $image['url']);
            }
        }

        // Hapus data produk
        $this->productModel->delete($id);
        return redirect()->to('/manage-product')->with('success', 'Produk berhasil dihapus');
    }
}