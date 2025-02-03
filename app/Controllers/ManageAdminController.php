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
            'admins' => $this->adminModel->where('id_level', 3)->findAll(),
            'activePage' => 'Manage Admin',
            'tittle' => 'Lapak Siswa | Kelola Admin',
            'navigasi' => 'Manage Admin Data'
        ];
        return view('backend/page/admin/manage-admin', $data);
    }

    // Menampilkan form untuk menambah admin
    public function create()
    {
        $data = [
            'activePage' => 'Manage Admin',
            'tittle' => 'Lapak Siswa | Admin',
            'navigasi' => 'Tambah Data Admin'
        ];
        return view('backend/page/admin/add-admin', $data);
    }

    // Menyimpan data admin baru
    public function store()
    {
        // Validasi input dengan pesan kustom
        $validationRules = [
            'full_name' => 'required|min_length[3]',
            'username' => 'required|min_length[5]|is_unique[admin.username]',
            'email' => 'required|valid_email|is_unique[admin.email]',
            'password' => 'required|min_length[6]',
            'gender' => 'required',
            'status_registrasi' => 'required',
            'url_image' => 'uploaded[url_image]|is_image[url_image]|max_size[url_image,2048]',
        ];

        $customMessages = [
            'username' => [
                'is_unique' => 'Username "{value}" sudah digunakan.',
            ],
            'email' => [
                'is_unique' => 'Email "{value}" sudah digunakan.',
            ],
        ];

        if (!$this->validate($validationRules, $customMessages)) {
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
            'url_image' => 'img_user/' . $fileName,
            'status_registrasi' => $this->request->getPost('status_registrasi'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/manage-admin')->with('success', 'Admin created successfully');
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
        // Ambil data admin yang ada
        $adminData = $this->adminModel->find($id);

        // Validasi input
        $validationRules = [
            'full_name' => 'min_length[3]',
            'username' => "min_length[5]|is_unique[admin.username,id_admin,{$id}]",
            'email' => "valid_email|min_length[6]|is_unique[admin.email,id_admin,{$id}]",
            'url_image' => 'is_image[url_image]|max_size[url_image,2048]',
        ];

        $customMessages = [
            'username' => [
                'is_unique' => 'Username "{value}" sudah digunakan.',
            ],
            'email' => [
                'is_unique' => 'Email "{value}" sudah digunakan.',
            ],
        ];
    
        if (!$this->validate($validationRules, $customMessages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Cek dan tambahkan field yang diubah
        $dataToUpdate = [];
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
        if ($this->request->getPost('status_registrasi') !== null) {
            $dataToUpdate['status_registrasi'] = $this->request->getPost('status_registrasi');
        }
        // Cek jika ada password baru yang diinput
        if ($this->request->getPost('password')) {
            $dataToUpdate['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT); // Hash password
        }
        
        // Cek jika ada file gambar yang diupload
        $file = $this->request->getFile('url_image');
        if ($file && $file->isValid()) {
            $imgPath = 'img_user/';
            
            // Hapus gambar lama jika bukan gambar default
            if ($adminData['url_image'] && $adminData['url_image'] != 'img_user/user.png') {
                @unlink($adminData['url_image']);
            }

            // Simpan gambar baru
            $fileName = $file->getRandomName();
            $file->move($imgPath, $fileName);
            $dataToUpdate['url_image'] = $imgPath . $fileName;
        } else {
            $dataToUpdate['url_image'] = $adminData['url_image'];
        }

        // Update admin data
        $this->adminModel->update($id, $dataToUpdate + ['updated_at' => date('Y-m-d H:i:s')]);

        $username = $this->request->getPost('username') ?: $adminData['username'];
        return redirect()->to('/manage-admin')->with('success', "Admin '{$username}' Updated successfully");
    }

    // Menghapus admin
    public function delete($id)
    {
        // Ambil data admin yang ada
        $adminData = $this->adminModel->find($id);

        // Hapus gambar profil jika bukan gambar default
        if ($adminData['url_image'] && $adminData['url_image'] != 'img_user/user.png') {
            @unlink($adminData['url_image']);
        }

        // Hapus admin dari database
        $this->adminModel->delete($id);
        $username = $this->request->getPost('username') ?: $adminData['username'];
        return redirect()->to('/manage-admin')->with('success', "Admin '{$username}' Delete successfully");
    }
}