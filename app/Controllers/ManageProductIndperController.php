<?php

namespace App\Controllers;

use App\Models\ProductIndperModel;
use App\Models\UrlImageProductIndperModel;
use App\Models\KategoriProductModel;
use App\Models\PajakModel;
use App\Models\IndustriModel;
use CodeIgniter\Controller;

class ManageProductIndperController extends Controller
{
    protected $productModel;
    protected $urlImageProductModel;
    protected $kategoriProductModel;
    protected $industriModel;
    protected $pajakModel;

    public function __construct()
    {
        $this->productModel = new ProductIndperModel();
        $this->urlImageProductModel = new UrlImageProductIndperModel();
        $this->kategoriProductModel = new KategoriProductModel();
        $this->industriModel = new IndustriModel();
        $this->pajakModel = new PajakModel();
    }

    // Menampilkan daftar produk
    public function index()
    {
        // Ambil semua produk
        $products = $this->productModel->getProductWithCategoryAndIndustri();

        // Ambil gambar untuk setiap produk
        foreach ($products as &$product) {
            $product['images'] = $this->urlImageProductModel->getImagesByProductId($product['id_product']);
        }

        $data = [
            'products' => $products,
            'activePage' => 'Manage Product Industri/Perusahaan',
            'tittle' => 'Lapak Industri/Perusahaan | Kelola Produk',
            'navigasi' => 'Manage Product Industri/Perusahaan Data'
        ];

        return view('backend/page/product-indper/manage-product-indper', $data);
    }

    // Menampilkan form untuk menambah produk
    public function create()
    {
        $data = [
            'activePage' => 'Manage Product Industri/Perusahaan',
            'tittle' => 'Lapak Industri/Perusahaan | Tambah Produk',
            'navigasi' => 'Tambah Data Produk',
            'kategoris' => $this->kategoriProductModel->findAll(),
            'industris' => $this->industriModel->findAll(),
            'pajak' => $this->pajakModel->where('id_level', 5)->first() // Ambil pajak untuk level industri (id_level = 5)
        ];
        return view('backend/page/product-indper/add-product-indper', $data);
    }

    // Menyimpan data produk baru
    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'product_name' => 'required|min_length[3]',
            'id_kategori' => 'required',
            'id_industri' => 'required',
            'description' => 'required',
            'stock' => 'required|numeric',
            'price' => 'required|numeric',
            'weight' => 'required|numeric',
            'discount' => 'numeric',
            'expired' => 'permit_empty|valid_date',
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
            'id_industri' => $this->request->getPost('id_industri'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'stock' => $this->request->getPost('stock'),
            'price' => $price,
            'price_final' => $priceFinal,
            'weight' => $this->request->getPost('weight'),
            'expired' => $this->request->getPost('expired') ?: null,
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

        return redirect()->to('/manage-product-indper')->with('success', 'Produk berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $product = $this->productModel->find($id);
        $industri = $this->industriModel->find($product['id_industri']);
        $pajak = $this->pajakModel->where('id_level', $industri['id_level'])->first();

        $data = [
            'product' => $product,
            'kategoris' => $this->kategoriProductModel->findAll(),
            'industris' => $this->industriModel->findAll(),
            'images' => $this->urlImageProductModel->getImagesByProductId($id),
            'pajak' => $pajak,
            'activePage' => 'Manage Product Industri/Perusahaan',
            'tittle' => 'Lapak Industri/Perusahaan | Edit Produk',
            'navigasi' => 'Edit Data Produk'
        ];
        return view('backend/page/product-indper/edit-product-indper', $data);
    }

    // Memperbarui data produk
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'product_name' => 'min_length[3]',
            // 'id_kategori' => 'required',
            // 'id_industri' => 'required',
            // 'description' => 'required',
            // 'stock' => 'required|numeric',
            // 'price' => 'required|numeric',
            // 'weight' => 'required|numeric',
            'expired' => 'permit_empty|valid_date',
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
            'id_industri' => $this->request->getPost('id_industri'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'product_name' => $this->request->getPost('product_name'),
            'description' => $this->request->getPost('description'),
            'stock' => $this->request->getPost('stock'),
            'price' => $price,
            'price_final' => $priceFinal,
            'weight' => $this->request->getPost('weight'),
            'expired' => $this->request->getPost('expired') ?: null,
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

        return redirect()->to('/manage-product-indper')->with('success', 'Produk berhasil diperbarui');
    }

    // Menghapus produk
    public function delete($id)
    {
        // Hapus gambar terkait
        $images = $this->urlImageProductModel->where('id_product', $id)->findAll();
        foreach ($images as $image) {
            $filePath = FCPATH . $image['url']; // Path lengkap ke file gambar
            if (file_exists($filePath)) {
                unlink($filePath); // Hapus file gambar dari server
            }
            $this->urlImageProductModel->delete($image['id_url_image_product']); // Hapus record gambar dari database
        }

        // Hapus data produk
        $this->productModel->delete($id);

        return redirect()->to('/manage-product-indper')->with('success', 'Produk berhasil dihapus');
    }

    // Menghapus gambar produk
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