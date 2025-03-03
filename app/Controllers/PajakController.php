<?php

namespace App\Controllers;

use App\Models\PajakModel;
use App\Models\LevelUserModel;
use CodeIgniter\Controller;

class PajakController extends Controller
{
    protected $pajakModel;
    protected $levelUserModel;
    public function __construct()
    {
        $this->pajakModel = new PajakModel();
        $this->levelUserModel = new LevelUserModel(); // Tambahkan ini
    }

    // Tampilkan daftar pajak dengan nama level
    public function index()
    {
        $data = [
            'pajak' => $this->pajakModel->getPajakWithLevel(), // Pakai method join
            'activePage' => 'Manage Pajak',
            'tittle' => 'Lapak Siswa | Kelola Pajak',
            'navigasi' => 'Manage Pajak Data'
        ];
        return view('backend/page/pajak/manage-pajak', $data);
    }

    // Tampilkan form tambah pajak dengan dropdown level
    public function create()
    {
        $data = [
            'levels' => $this->levelUserModel->findAll(), // Ambil semua level
            'activePage' => 'Manage Pajak',
            'tittle' => 'Lapak Siswa | Tambah Pajak',
            'navigasi' => 'Tambah Data Pajak'
        ];
        return view('backend/page/pajak/add-pajak', $data);
    }

    // Menyimpan data pajak baru
    public function store()
    {
        $validation = $this->validate([
            'id_level' => 'required|numeric',
            'besaran' => 'required|numeric'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pajakModel->save([
            'id_level' => $this->request->getPost('id_level'),
            'besaran' => $this->request->getPost('besaran')
        ]);

        return redirect()->to('/manage-pajak')->with('success', 'Pajak berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit pajak
    public function edit($id)
    {
        $data = [
            'pajak' => $this->pajakModel->find($id),
            'levels' => $this->levelUserModel->findAll(), // Ambil semua level
            'activePage' => 'Manage Pajak',
            'tittle' => 'Lapak Siswa | Edit Pajak',
            'navigasi' => 'Edit Data Pajak'
        ];
        return view('backend/page/pajak/edit-pajak', $data);
    }

    // Menyimpan perubahan data pajak
    public function update($id)
    {
        $validation = $this->validate([
            'id_level' => 'required|numeric',
            'besaran' => 'required|numeric'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->pajakModel->update($id, [
            'id_level' => $this->request->getPost('id_level'),
            'besaran' => $this->request->getPost('besaran')
        ]);

        return redirect()->to('/manage-pajak')->with('success', 'Pajak berhasil diperbarui');
    }

    // Menghapus data pajak
    public function delete($id)
    {
        $this->pajakModel->delete($id);
        return redirect()->to('/manage-pajak')->with('success', 'Pajak berhasil dihapus');
    }
}