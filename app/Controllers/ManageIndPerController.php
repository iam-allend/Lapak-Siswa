<?php

namespace App\Controllers;

use App\Models\IndustriModel;
use App\Models\AdminModel;
use CodeIgniter\Controller;

class ManageIndPerController extends Controller
{
    protected $industriModel;
    protected $adminModel;

    public function __construct()
    {
        $this->industriModel = new IndustriModel();
        $this->adminModel = new AdminModel();
    }

    // Menampilkan daftar industri
    public function index()
    {
        $data = [
            'industris' => $this->industriModel->getIndustriWithAdmin(),
            'activePage' => 'Manage Industri',
            'tittle' => 'Lapak Siswa | Kelola Industri',
            'navigasi' => 'Manage Industri Data'
        ];
        return view('backend/page/industri/manage-industri', $data);
    }

    // Menampilkan form untuk menambah industri
    public function create()
    {
        $data = [
            'activePage' => 'Manage Industri',
            'tittle' => 'Lapak Siswa | Industri',
            'navigasi' => 'Tambah Data Industri',
            'admins' => $this->adminModel->findAll(), // Ambil semua data admin
        ];

        return view('backend/page/industri/add-industri', $data);
    }

    // Menyimpan data industri baru
    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'nama' => 'required|min_length[3]',
            'tipe_indper' => 'required',
            'username' => 'required|is_unique[industri_perusahaan.username]',
            'email' => 'required|valid_email|is_unique[industri_perusahaan.email]',
            'password' => 'required|min_length[6]',
            'tgl_mulai_kerjasama' => 'required',
            'tgl_selesai_kerjasama' => 'required',
            'url_image' => 'uploaded[url_image]|is_image[url_image]|max_size[url_image,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Upload image
        $file = $this->request->getFile('url_image');
        $fileName = $file->getRandomName();
        $file->move('img_user', $fileName);

        // Save industri data
        $this->industriModel->save([
            'id_admin' => $this->request->getPost('id_admin'),
            'id_level' => 2, // Misalnya, level industri adalah 2
            'nama' => $this->request->getPost('nama'),
            'tipe_indper' => $this->request->getPost('tipe_indper'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'tgl_mulai_kerjasama' => $this->request->getPost('tgl_mulai_kerjasama'),
            'tgl_selesai_kerjasama' => $this->request->getPost('tgl_selesai_kerjasama'),
            'url_image' => 'img_user/' . $fileName,
            'status_registrasi' => $this->request->getPost('status_registrasi'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/manage-indper')->with('success', 'Industri created successfully');
    }

    // Menampilkan form untuk mengedit industri
    public function edit($id)
    {
        $data = [
            'industri' => $this->industriModel->find($id),
            'admins' => $this->adminModel->findAll(),
            'activePage' => 'Manage Industri',
            'tittle' => 'Lapak Siswa | Edit Industri',
            'navigasi' => 'Edit Data Industri'
        ];
        return view('backend/page/industri/edit-industri', $data);
    }

    // Memperbarui data industri
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'nama' => 'min_length[3]',
            'username' => "min_length[5]|is_unique[industri_perusahaan.username,id_industri,{$id}]",
            'email' => "valid_email|min_length[6]|is_unique[industri_perusahaan.email,id_industri,{$id}]",
            'url_image' => 'is_image[url_image]|max_size[url_image,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data industri yang ada
        $industriData = $this->industriModel->find($id);
        $dataToUpdate = [];

        // Cek dan tambahkan field yang diubah
        if ($this->request->getPost('nama')) {
            $dataToUpdate['nama'] = $this->request->getPost('nama');
        }
        if ($this->request->getPost('username')) {
            $dataToUpdate['username'] = $this->request->getPost('username');
        }
        if ($this->request->getPost('email')) {
            $dataToUpdate['email'] = $this->request->getPost('email');
        }
        if ($this->request->getPost('tipe_indper')) {
            $dataToUpdate['tipe_indper'] = $this->request->getPost('tipe_indper');
        }
        if ($this->request->getPost('tgl_mulai_kerjasama')) {
            $dataToUpdate['tgl_mulai_kerjasama'] = $this->request->getPost('tgl_mulai_kerjasama');
        }
        if ($this->request->getPost('tgl_selesai_kerjasama')) {
            $dataToUpdate['tgl_selesai_kerjasama'] = $this->request->getPost('tgl_selesai_kerjasama');
        }
        if ($this->request->getPost('status_registrasi') !== null) {
            $dataToUpdate['status_registrasi'] = $this->request->getPost('status_registrasi');
        }
        // Cek jika ada password baru yang diinput
        if ($this->request->getPost('password')) {
            $dataToUpdate['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        // Cek jika ada file gambar yang diupload
        $file = $this->request->getFile('url_image');
        if ($file && $file->isValid()) {
            // Path direktori untuk menyimpan gambar
            $imgPath = 'img_user/';
            
            // Hapus gambar lama jika bukan gambar default
            if ($industriData['url_image'] && $industriData['url_image'] != 'img_user/user.png') {
                @unlink($industriData['url_image']);
            }

            // Simpan gambar baru
            $fileName = $file->getRandomName();
            $file->move($imgPath, $fileName);
            $dataToUpdate['url_image'] = $imgPath . $fileName;
        } else {
            // Jika tidak ada gambar baru, pertahankan gambar lama
            $dataToUpdate['url_image'] = $industriData['url_image'];
        }

        // Update industri data
        $this->industriModel->update($id, $dataToUpdate + ['updated_at' => date('Y-m-d H:i:s')]);

        $nama = $this->request->getPost('nama') ?: $industriData['nama'];
        return redirect()->to('/manage-indper')->with('success', "Industri '{$nama}' Updated successfully");
    }

    // Menghapus industri
    public function delete($id)
    {
        // Ambil data industri yang ada
        $industriData = $this->industriModel->find($id);

        // Hapus gambar profil jika bukan gambar default
        if ($industriData['url_image'] && $industriData['url_image'] != 'img_user/user.png') {
            @unlink($industriData['url_image']);
        }

        // Hapus industri dari database
        $this->industriModel->delete($id);
        $nama = $this->request->getPost('nama') ?: $industriData['nama'];
        return redirect()->to('/manage-indper')->with('success', "Industri '{$nama}' Delete successfully");
    }
}