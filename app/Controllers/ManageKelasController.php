<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\KelasModel;

class ManageKelasController extends Controller
{
    protected $kelasModel;


    public function __construct()
    {
        $this->kelasModel = new KelasModel();
    }

    // Menampilkan daftar siswa
    public function index()
    {
        $data = [

            'kelass' => $this->kelasModel->findAll(),            
            'activePage' => 'Manage Kelas',
            'tittle' => 'Lapak Siswa | Kelola Kelas',
            'navigasi' => 'Manage Kelas Data'
        ];
        return view('backend/page/kelas/manage-kelas', $data);
    }

    // Menampilkan form untuk menambah siswa
    public function create()
    {

        $data = [
            'activePage' => 'Manage Kelas',
            'tittle' => 'Lapak Siswa | Kelola Kelas',
            'navigasi' => 'Tambah Data Kelas',
            'kelas' => $this->kelasModel->findAll(), // Ambil semua data kelas
        ];

        return view('backend/page/kelas/add-kelas', $data);
    }

    // Menyimpan data kelas baru
    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'nama' => 'required|is_unique[kelas.nama]',
            'wali_kelas' => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        // Save kelas data
        $this->kelasModel->save([
            'nama' => $this->request->getPost('nama'),
            'wali_kelas' => $this->request->getPost('wali_kelas'),
        ]);

        return redirect()->to('/manage-kelas')->with('success', 'Siswa created successfully');
    }
    // Menampilkan form untuk mengedit siswa
    public function edit($id)
    {
        // Ambil data kelas berdasarkan ID
        $kelas = $this->kelasModel->find($id);

        if (!$kelas) {
            // Jika data kelas tidak ditemukan, redirect ke halaman manage-kelas dengan pesan error
            return redirect()->to('/manage-kelas')->with('error', 'Data kelas tidak ditemukan.');
        }

        $data = [
            'kelas' => $kelas, // Kirim data kelas spesifik yang ingin diedit
            'activePage' => 'Manage Kelas',
            'tittle' => 'Lapak Siswa | Edit Kelas',
            'navigasi' => 'Edit Data Kelas'
        ];

        return view('backend/page/kelas/edit-kelas', $data);
    }

    // Memperbarui data kelas
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'nama' => "required|min_length[3]|is_unique[kelas.nama,id_kelas,{$id}]",
            'wali_kelas' => 'required|min_length[3]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data kelas yang ada
        $kelasData = $this->kelasModel->find($id);
        if (!$kelasData) {
            return redirect()->to('/manage-kelas')->with('error', 'Data kelas tidak ditemukan.');
        }

        // Data yang akan diupdate
        $dataToUpdate = [
            'nama' => $this->request->getPost('nama'),
            'wali_kelas' => $this->request->getPost('wali_kelas'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // Update data kelas
        $this->kelasModel->update($id, $dataToUpdate);

        return redirect()->to('/manage-kelas')->with('success', "Kelas '{$dataToUpdate['nama']}' berhasil diperbarui.");
    }

    // Menghapus Kelas
    public function delete($id)
    {
        // Ambil data kelas yang ada
        $kelasData = $this->kelasModel->find($id);

        // Hapus Kelas dari database
        $this->kelasModel->delete($id);
        $nama = $this->request->getPost('nama') ?: $kelasData['nama'];
        return redirect()->to('/manage-kelas')->with('success', "Kelas '{$nama}' Delete successfully");
    }
}