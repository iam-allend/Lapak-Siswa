<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class ManageAdminController extends Controller
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    // Menampilkan daftar admin
    public function index()
    {
        $data = [
            'admins' => $this->adminModel->findAll(),
            'activePage' => 'Manage Admin',
            'tittle' => 'Lapak Siswa | Kelola Admin',
            'navigasi' => 'Manage Admin Data'
        ];
        return view('backend/page/admin/manage-admin', $data);
    }

    // Menampilkan form untuk menambah admin
    public function create()
    {
        return view('admin/create');
    }

    // Menyimpan data admin baru
    public function store()
    {
        $validation = $this->validate([
            'full_name' => 'required|min_length[3]',
            'username' => 'required|is_unique[admin.username]',
            'email' => 'required|valid_email|is_unique[admin.email]',
            'password' => 'required|min_length[6]',
            'gender' => 'required',
            'status_registrasi' => 'required',
            'url_image' => 'uploaded[url_image]|is_image[url_image]|max_size[url_image,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload image
        $file = $this->request->getFile('url_image');
        $fileName = $file->getRandomName();
        $file->move('img_user', $fileName);

        // Save admin data
        $this->adminModel->save([
            'id_level' => $this->request->getPost('id_level'),
            'full_name' => $this->request->getPost('full_name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'gender' => $this->request->getPost('gender'),
            'url_image' => 'img_user/' . $fileName, // Pastikan ini benar
            'status_registrasi' => $this->request->getPost('status_registrasi'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin')->with('success', 'Admin created successfully');
    }

    // Menampilkan form untuk mengedit admin
    public function edit($id)
    {
        $data = [
            'admin' => $this->adminModel->find($id),
            'activePage' => 'Manage Admin',
            'tittle' => 'Lapak Siswa | Admin',
            'navigasi' => 'Edit Data Admin'
        ];
        return view('backend\page\admin\edit-admin', $data);
    }

    // Memperbarui data admin
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'full_name' => 'min_length[3]',
            'username' => 'min_length[5]',
            'email' => 'valid_email|min_length[6]',
            'url_image' => 'is_image[url_image]|max_size[url_image,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data admin yang ada
        $adminData = $this->adminModel->find($id);
        $dataToUpdate = [];

        // Cek dan tambahkan field yang diubah
        if ($this->request->getPost('full_name')) {
            $dataToUpdate['full_name'] = $this->request->getPost('full_name');
        }
        if ($this->request->getPost('username')) {
            $dataToUpdate['username'] = $this->request->getPost('username');
        }
        if ($this->request->getPost('email')) {
            $dataToUpdate['email'] = $this->request->getPost('email');
        }
        if ($this->request->getPost('gender')) {
            $dataToUpdate['gender'] = $this->request->getPost('gender');
        }
        if ($this->request->getPost('status_registrasi')) {
            $dataToUpdate['status_registrasi'] = $this->request->getPost('status_registrasi');
        }

        // Cek jika ada file gambar yang diupload
        $file = $this->request->getFile('url_image');
        if ($file && $file->isValid()) {
            // Path direktori untuk menyimpan gambar
            $imgPath = 'img_user/';
            
            // Hapus gambar lama jika bukan gambar default
            if ($adminData['url_image'] && $adminData['url_image'] != 'img_user/user.png') {
                @unlink($adminData['url_image']);
            }

            // Simpan gambar baru
            $fileName = $file->getRandomName();
            $file->move($imgPath, $fileName);
            $dataToUpdate['url_image'] = $imgPath . $fileName; // Update URL gambar
        } else {
            // Jika tidak ada gambar baru, pertahankan gambar lama
            $dataToUpdate['url_image'] = $adminData['url_image'];
        }

        // Update admin data
        $this->adminModel->update($id, $dataToUpdate + ['updated_at' => date('Y-m-d H:i:s')]);

        return redirect()->to('/admin')->with('success', 'Admin updated successfully');
    }

    // Menghapus admin
    public function delete($id)
    {
        $this->adminModel->delete($id);
        return redirect()->to('/admin')->with('success', 'Admin deleted successfully');
    }
}