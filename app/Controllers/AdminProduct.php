<?php

namespace App\Controllers;

use App\Models\ProductModel; // Pastikan Anda sudah membuat ProductModel.php
use CodeIgniter\Controller;
use CodeIgniter\Files\File; 
use CodeIgniter\HTTP\ResponseInterface; 

// Pastikan BaseController Anda ada dan di-extend dengan benar
class AdminProduct extends BaseController
{
    protected $productModel; // Properti untuk menyimpan instance ProductModel

    public function __construct()
    {
        $this->productModel = new ProductModel(); // Inisialisasi ProductModel
        helper(['form', 'url']); // Memuat helper form dan url untuk validasi dan base_url()
    }

    /**
     * Menampilkan halaman manajemen produk di panel admin.
     * Metode ini memuat bagian-bagian template dan view manage_product.php.
     */
    public function index()
    {
        $data = [
            'title' => 'Manajemen Produk Mobile App', // Judul halaman
            // Tambahkan data lain yang mungkin diperlukan oleh template backend Anda,
            // seperti informasi admin yang sedang login (misal: dari session).
            // Contoh: 'nama_admin' => session()->get('nama_admin'),
            //         'level_admin' => session()->get('level_admin')
        ];
        
        // Memuat tampilan template backend Anda secara berurutan
        // header.php: Biasanya berisi awal HTML, tag <head>, dan awal <body> atau layout wrapper
        echo view('backend/layOutTemplate/header', $data); 
        // sidebar.php: Berisi navigasi samping atau menu
        echo view('backend/layOutTemplate/sidebar', $data); 

        // manage_product.php: Ini adalah konten utama halaman manajemen produk
        echo view('backend/page/product/manage_product', $data); 

        // footer.php: Biasanya berisi penutup HTML, script JavaScript global, dan penutup layout wrapper
        echo view('backend/layOutTemplate/footer', $data); 
    }

    /**
     * Metode AJAX untuk mengambil semua data produk dari database 'android'.
     * Mengembalikan data dalam format JSON.
     */
    public function getProductsAjax()
    {
        // Mendapatkan semua produk menggunakan ProductModel
        $products = $this->productModel->getAllProducts();

        // Mengembalikan respons sukses dengan data produk dalam format JSON
        return $this->response->setJSON([
            'status' => 'sukses',
            'data'   => $products,
            'message' => 'Data produk berhasil diambil.'
        ]);
    }

    /**
     * Metode AJAX untuk mengambil detail satu produk berdasarkan 'kode' produk.
     * Mengembalikan data produk dalam format JSON atau pesan error jika tidak ditemukan.
     * @param string $kode Kode produk yang akan dicari.
     */
    public function getProductDetailsAjax($kode)
    {
        // Mencari produk berdasarkan kode menggunakan ProductModel
        $product = $this->productModel->getProductByKode($kode);

        if ($product) {
            // Jika produk ditemukan, kembalikan detailnya
            return $this->response->setJSON([
                'status' => 'sukses',
                'data'   => $product,
                'message' => 'Detail produk berhasil diambil.'
            ]);
        } else {
            // Jika produk tidak ditemukan, kembalikan pesan error 404 Not Found
            return $this->response->setJSON([
                'status' => 'gagal',
                'message' => 'Produk tidak ditemukan.'
            ], ResponseInterface::HTTP_NOT_FOUND); 
        }
    }

    /**
     * Metode AJAX untuk menyimpan (menambah atau mengedit) data produk.
     * Menerima data melalui POST, termasuk file foto.
     */
    public function saveProductAjax()
    {
        // Aturan validasi untuk setiap input form
        $validationRules = [
            'merk' => 'required',
            'kategori' => 'required',
            'satuan' => 'required',
            'hargabeli' => 'required|numeric',
            'diskonbeli' => 'required|numeric',
            'hargapokok' => 'required|numeric',
            'hargajual' => 'required|numeric',
            'diskonjual' => 'required|numeric',
            'stok' => 'required|integer',
            'deskripsi' => 'permit_empty', // Deskripsi bisa kosong
            'foto' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/gif]', // Validasi file foto
        ];

        // Lakukan validasi input
        if (!$this->validate($validationRules)) {
            // Jika validasi gagal, kembalikan respons error dengan pesan validasi
            return $this->response->setJSON([
                'status' => 'gagal',
                'message' => 'Validasi gagal',
                'errors' => $this->validator->getErrors()
            ], ResponseInterface::HTTP_BAD_REQUEST); 
        }

        // Ambil data dari input POST
        $kode = $this->request->getPost('kode'); // Kode produk (kosong jika menambah baru)
        $data = [
            'merk' => $this->request->getPost('merk'),
            'kategori' => $this->request->getPost('kategori'),
            'satuan' => $this->request->getPost('satuan'),
            'hargabeli' => (float)$this->request->getPost('hargabeli'), // Konversi ke float
            'diskonbeli' => (float)$this->request->getPost('diskonbeli'),
            'hargapokok' => (float)$this->request->getPost('hargapokok'),
            'hargajual' => (float)$this->request->getPost('hargajual'),
            'diskonjual' => (float)$this->request->getPost('diskonjual'),
            'stok' => (int)$this->request->getPost('stok'), // Konversi ke integer
            'deskripsi' => $this->request->getPost('deskripsi')
        ];

        $file = $this->request->getFile('foto'); // Mengambil file foto yang diunggah
        $old_foto = null; // Inisialisasi nama foto lama

        // Logika untuk Mode Edit (jika 'kode' sudah ada)
        if (!empty($kode)) {
            $existingProduct = $this->productModel->getProductByKode($kode);
            if ($existingProduct) {
                $old_foto = $existingProduct['foto']; // Simpan nama foto lama
            }
        } else { // Logika untuk Mode Tambah (jika 'kode' kosong)
            // Generate kode produk baru (contoh: CI001, CI002, dst.)
            $lastProduct = $this->productModel->orderBy('kode', 'DESC')->first();
            $newKodeNum = 1;
            if ($lastProduct && preg_match('/^CI(\d+)$/', $lastProduct['kode'], $matches)) {
                $newKodeNum = (int)$matches[1] + 1;
            }
            $kode = 'CI' . str_pad($newKodeNum, 3, '0', STR_PAD_LEFT); 
            $data['kode'] = $kode; // Tambahkan kode baru ke data
        }

        // Penanganan Upload File Foto
        // Memastikan file diunggah, valid, dan belum dipindahkan
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName(); // Memberikan nama unik pada file
            // Path untuk menyimpan gambar, relatif dari folder public/ CodeIgniter Anda
            // Contoh: public/API_Product/images/product/
            $publicPath = 'API_Product/images/product/'; 
            $uploadPath = ROOTPATH . 'public/' . $publicPath; // Path absolut ke folder penyimpanan

            // Buat direktori jika belum ada
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true); // Izin 0777 untuk memastikan bisa ditulis (sesuaikan di produksi)
            }

            // Pindahkan file yang diunggah ke folder tujuan
            if ($file->move($uploadPath, $newName)) {
                $data['foto'] = $newName; // Simpan nama file baru ke data

                // Jika ini mode edit dan ada foto lama, hapus foto lama tersebut
                if (!empty($old_foto) && file_exists($uploadPath . $old_foto)) {
                    unlink($uploadPath . $old_foto);
                }
            } else {
                // Jika gagal memindahkan file, kembalikan error
                return $this->response->setJSON([
                    'status' => 'gagal',
                    'message' => 'Gagal mengunggah foto: ' . $file->getErrorString()
                ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else if (!empty($kode) && !$file->isValid()) { 
            // Jika mode edit dan tidak ada file baru diunggah, pertahankan foto lama
            $data['foto'] = $old_foto; 
        } else { 
            // Jika mode tambah dan tidak ada file diunggah, atau ada masalah lain dengan file, set foto menjadi null
            $data['foto'] = null; 
        }

        $result = false;
        if ($this->productModel->getProductByKode($kode)) { 
            // Jika kode produk sudah ada di database, lakukan update
            $result = $this->productModel->updateProduct($kode, $data);
            $message = 'Produk berhasil diperbarui.';
        } else { 
            // Jika kode produk belum ada, lakukan insert sebagai produk baru
            $result = $this->productModel->addProduct($data);
            $message = 'Produk baru berhasil ditambahkan.';
        }

        if ($result) {
            // Jika operasi database sukses
            return $this->response->setJSON([
                'status' => 'sukses',
                'message' => $message
            ]);
        } else {
            // Jika operasi database gagal
            return $this->response->setJSON([
                'status' => 'gagal',
                'message' => 'Gagal menyimpan produk ke database.'
            ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * Metode AJAX untuk menghapus produk berdasarkan 'kode' produk.
     * Menerima kode produk melalui POST.
     */
    public function deleteProductAjax()
    {
        $kode = $this->request->getPost('kode');

        // Validasi input kode
        if (empty($kode)) {
            return $this->response->setJSON([
                'status' => 'gagal',
                'message' => 'Kode produk tidak diberikan.'
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }

        // Cari produk yang akan dihapus untuk mendapatkan nama fotonya
        $existingProduct = $this->productModel->getProductByKode($kode);
        if ($existingProduct) {
            // Jika ada foto, coba hapus file fotonya dari server
            if (!empty($existingProduct['foto'])) {
                $publicPath = 'API_Product/images/product/';
                $fotoPath = ROOTPATH . 'public/' . $publicPath . $existingProduct['foto'];
                if (file_exists($fotoPath)) {
                    unlink($fotoPath); // Hapus file foto
                }
            }
            
            // Hapus record dari database
            if ($this->productModel->deleteProductByKode($kode)) {
                return $this->response->setJSON([
                    'status' => 'sukses',
                    'message' => 'Produk berhasil dihapus.'
                ]);
            } else {
                // Jika gagal menghapus dari database
                return $this->response->setJSON([
                    'status' => 'gagal',
                    'message' => 'Gagal menghapus produk dari database.'
                ], ResponseInterface::HTTP_INTERNAL_SERVER_ERROR);
            }
        } else {
            // Jika produk tidak ditemukan
            return $this->response->setJSON([
                'status' => 'gagal',
                'message' => 'Produk tidak ditemukan.'
            ], ResponseInterface::HTTP_NOT_FOUND);
        }
    }
}