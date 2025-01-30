<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class ManageAdminContoller extends Controller
{
    protected $adminModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }

    // Menampilkan daftar admin
    public function index()
    {
        $data['admins'] = $this->adminModel->findAll();
        $nav['activePage'] = 'Manage Admin';
        return view('backend/page/manage-admin', $data, $nav);
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
        $file->move('image-user/admin', $fileName);

        // Save admin data
        $this->adminModel->save([
            'id_level' => $this->request->getPost('id_level'),
            'full_name' => $this->request->getPost('full_name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'gender' => $this->request->getPost('gender'),
            'url_image' => 'image-user/admin/' . $fileName,
            'status_registrasi' => $this->request->getPost('status_registrasi'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin')->with('success', 'Admin created successfully');
    }

    // Menampilkan form untuk mengedit admin
    public function edit($id)
    {
        $data['admin'] = $this->adminModel->find($id);
        return view('admin/edit', $data);
    }

    // Memperbarui data admin
    public function update($id)
    {
        $validation = $this->validate([
            'full_name' => 'required|min_length[3]',
            'username' => 'required',
            'email' => 'required|valid_email',
            'gender' => 'required',
            'status_registrasi' => 'required',
            'url_image' => 'is_image[url_image]|max_size[url_image,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Check if a new image is uploaded
        $file = $this->request->getFile('url_image');
        if ($file->isValid()) {
            $fileName = $file->getRandomName();
            $file->move('image-user/admin', $fileName);
            $urlImage = 'image-user/admin/' . $fileName;
        } else {
            $urlImage = $this->adminModel->find($id)['url_image']; // Keep the old image if no new one is uploaded
        }

        // Update admin data
        $this->adminModel->update($id, [
            'id_level' => $this->request->getPost('id_level'),
            'full_name' => $this->request->getPost('full_name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'gender' => $this->request->getPost('gender'),
            'url_image' => $urlImage,
            'status_registrasi' => $this->request->getPost('status_registrasi'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/admin')->with('success', 'Admin updated successfully');
    }

    // Menghapus admin
    public function delete($id)
    {
        $this->adminModel->delete($id);
        return redirect()->to('/admin')->with('success', 'Admin deleted successfully');
    }
}