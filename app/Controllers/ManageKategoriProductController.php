<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\KategoriProductModel;

class ManageKategoriProductController extends Controller
{
    protected $kategoriProductModel;


    public function __construct()
    {
        $this->kategoriProductModel = new KategoriProductModel();
    }

    // Menampilkan daftar siswa
    public function index()
    {
        $data = [

            'categories' => $this->kategoriProductModel->findAll(),            
            'activePage' => 'Manage Kategori Product',
            'tittle' => 'Lapak Siswa | Kelola Kategori',
            'navigasi' => 'Manage Kategori Data'
        ];
        return view('backend/page/kategori-product/manage-kategori-product', $data);
    }

    // Menampilkan form untuk menambah siswa
    public function create()
    {

        $data = [
            'activePage' => 'Manage Kategori Product',
            'tittle' => 'Lapak Siswa | Kelola Kategori Product',
            'navigasi' => 'Tambah Data Kategori Product',
            'kategori' => $this->kategoriProductModel->findAll(), // Ambil semua data kategori product
        ];

        return view('backend/page/kategori-product/add-kategori-product', $data);
    }

    // Menyimpan data kategori product baru
    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'nama' => 'required|is_unique[kategori_product.nama]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        // Save Kategori data
        $this->kategoriProductModel->save([
            'nama' => $this->request->getPost('nama'),
        ]);

        return redirect()->to('/manage-kategori-product')->with('success', 'Siswa created successfully');
    }
    // Menampilkan form untuk mengedit siswa
    public function edit($id)
    {
        // Ambil data kategori product berdasarkan ID
        $kategori = $this->kategoriProductModel->find($id);

        if (!$kategori) {
            // Jika data kategori product tidak ditemukan, redirect ke halaman manage-kategori-product dengan pesan error
            return redirect()->to('/manage-kategori-product')->with('error', 'Data kategori product tidak ditemukan.');
        }

        $data = [
            'kategori' => $kategori, // Kirim data kategori product spesifik yang ingin diedit
            'activePage' => 'Manage Kategori Product',
            'tittle' => 'Lapak Siswa | Kelola Kategori Product',
            'navigasi' => 'Edit Data Kategori Product',
        ];

        return view('backend/page/kategori-product/edit-kategori-product', $data);
    }

    // Memperbarui data kategori product
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'nama' => "required|min_length[3]|is_unique[kategori_product.nama,id_kategori,{$id}]",
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data kategori product yang ada
        $kategoriData = $this->kategoriProductModel->find($id);
        if (!$kategoriData) {
            return redirect()->to('/manage-kategori-product')->with('error', 'Data kategori product tidak ditemukan.');
        }

        // Data yang akan diupdate
        $dataToUpdate = [
            'nama' => $this->request->getPost('nama'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update data kategori product
        $this->kategoriProductModel->update($id, $dataToUpdate);

        return redirect()->to('/manage-kategori-product')->with('success', "Kategori '{$dataToUpdate['nama']}' berhasil diperbarui.");
    }

    // Menghapus Kategori
    public function delete($id)
    {
        // Ambil data kategori product yang ada
        $kategoriData = $this->kategoriProductModel->find($id);

        // Hapus Kategori dari database
        $this->kategoriProductModel->delete($id);
        $nama = $this->request->getPost('nama') ?: $kategoriData['nama'];
        return redirect()->to('/manage-kategori-product')->with('success', "Kategori '{$nama}' Delete successfully");
    }
}