<?php

namespace App\Controllers;

use App\Models\ProductSiswaModel;
use App\Models\UrlImageProductSiswaModel;
use App\Models\KategoriProductModel;
use App\Models\PajakModel;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class ManageProductSiswaController extends Controller
{
    protected $productModel;
    protected $urlImageProductModel;
    protected $kategoriProductModel;
    protected $adminModel;
    protected $pajakModel;

    public function __construct()
    {
        $this->productModel = new ProductSiswaModel();
        $this->urlImageProductModel = new UrlImageProductSiswaModel();
        $this->kategoriProductModel = new KategoriProductModel();
        $this->adminModel = new AdminModel();
        $this->pajakModel = new PajakModel();
    }

    // Menampilkan daftar produk
    public function index()
    {
        // Ambil semua produk
        $products = $this->productModel->getProductWithCategoryAndAdmin();

        // Ambil gambar untuk setiap produk
        foreach ($products as &$product) {
            $product['images'] = $this->urlImageProductModel->getImagesByProductId($product['id_product']);
        }

        $data = [
            'products' => $products, // Kirim data produk beserta gambar ke view
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
            'activePage' => 'Manage Product Siswa',
            'tittle' => 'Lapak Siswa | Tambah Produk',
            'navigasi' => 'Tambah Data Produk',
            'kategoris' => $this->kategoriProductModel->findAll(),
            'admins' => $this->adminModel->where('id_level', 3)->findAll(),
            'pajak' => $this->pajakModel->where('id_level', 3)->first() // Ambil pajak untuk level admin 3
        ];
        return view('backend/page/product-siswa/add-product-siswa', $data);
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
            'discount' => 'numeric',
            'expired' => 'permit_empty|valid_date', // Opsional, format tanggal valid
            'images.*' => 'uploaded[images]|is_image[images]|max_size[images,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Hitung harga akhir (price - discount)
        $price = (float) $this->request->getPost('price');
        $discount = (float) $this->request->getPost('discount', null);
        $priceFinal = $price - ($price * ($discount / 100));

        $productData = [
            // Data lainnya...
            'price_final' => $priceFinal,
        ];

        // Simpan data produk
        $productData = [
            'id_admin' => $this->request->getPost('id_admin'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'stock' => $this->request->getPost('stock'),
            'price' => $price,
            'price_final' => $priceFinal,
            'weight' => $this->request->getPost('weight'),
            'expired' => $this->request->getPost('expired') ?: null, // Jika expired kosong, set ke null
            'discount' => $discount,
            'status_registrasi' => $this->request->getPost('status_registrasi'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Simpan data produk ke database
        $productId = $this->productModel->insert($productData);

        // Simpan gambar produk
        $images = $this->request->getFiles();
        foreach ($images['images'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move(FCPATH . 'img_product', $newName);

                $this->urlImageProductModel->save([
                    'id_product' => $productId,
                    'url' => 'img_product/' . $newName,
                ]);
            }
        }

        return redirect()->to('/manage-product-siswa')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        $admin = $this->adminModel->find($product['id_admin']);
        $pajak = $this->pajakModel->where('id_level', $admin['id_level'])->first();

        $data = [
            'product' => $product,
            'kategoris' => $this->kategoriProductModel->findAll(),
            'admins' => $this->adminModel->findAll(),
            'images' => $this->urlImageProductModel->getImagesByProductId($id),
            'pajak' => $pajak,
            'activePage' => 'Manage Product Siswa',
            'tittle' => 'Lapak Siswa | Edit Produk',
            'navigasi' => 'Edit Data Produk'
        ];
        return view('backend/page/product-siswa/edit-product-siswa', $data);
    }

    public function update($id)
    {
        // dd($this->request->getPost()); // Debug data yang dikirim dari form
        
        // Validasi input
        $validation = $this->validate([
            'product_name' => 'required|min_length[3]',
            'id_kategori' => 'required',
            'id_admin' => 'required',
            'description' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'expired' => 'permit_empty|valid_date', // Opsional, format tanggal valid
            'images.*' => 'is_image[images]|max_size[images,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Hitung harga akhir (price - discount)
        $price = (float) $this->request->getPost('price');
        $discount = (float) $this->request->getPost('discount', null);
        $priceFinal = $price - ($price * ($discount / 100));

        $productData = [
            // Data lainnya...
            'price_final' => $priceFinal,
        ];

        // Update data produk
        $productData = [
            'id_admin' => $this->request->getPost('id_admin'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'stock' => $this->request->getPost('stock'),
            'price' => $price,
            'price_final' => $priceFinal,
            'weight' => $this->request->getPost('weight'),
            'expired' => $this->request->getPost('expired') ?: null, // Jika expired kosong, set ke null
            'discount' => $discount,
            'status_registrasi' => $this->request->getPost('status_registrasi'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->productModel->update($id, $productData);

        // Simpan gambar baru
        $images = $this->request->getFiles();
        foreach ($images['images'] as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getRandomName();
                $image->move(FCPATH . 'img_product', $newName);

                $this->urlImageProductModel->save([
                    'id_product' => $id,
                    'url' => 'img_product/' . $newName,
                ]);
            }
        }

        return redirect()->to('/manage-product-siswa')->with('success', 'Produk berhasil diperbarui');
    }

    // Menghapus produk
    public function delete($id)
    {
       // Hapus gambar terkait
        $images = $this->urlImageProductModel->where('id_product', $id)->findAll();
        foreach ($images as $image) {
            $filePath = FCPATH . $image['url']; // Gunakan FCPATH untuk path lengkap
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        // Hapus data produk
        $this->productModel->delete($id);
        return redirect()->to('/manage-product-siswa')->with('success', 'Produk berhasil dihapus');
    }

    public function deleteImage($imageId)
    {
        $image = $this->urlImageProductModel->find($imageId);
        if ($image && file_exists(FCPATH . $image['url'])) {
            unlink(FCPATH . $image['url']);
        }
        $this->urlImageProductModel->delete($imageId);
        return redirect()->back()->with('success', 'Gambar berhasil dihapus');
    }
    
}

