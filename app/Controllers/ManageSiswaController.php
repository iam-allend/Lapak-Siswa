<?php

namespace App\Controllers;

use App\Models\SiswaModel;
use CodeIgniter\Controller;
// Ambil data kelas dari tabel kelas
use \App\Models\KelasModel;
use \App\Models\AdminModel;

class ManageSiswaController extends Controller
{
    protected $siswaModel;
    protected $kelasModel;
    protected $adminModel;


    public function __construct()
    {
        $this->siswaModel = new SiswaModel();
        $this->kelasModel = new KelasModel();
        $this->adminModel = new AdminModel();
    }

    // Menampilkan daftar siswa
    public function index()
    {
        $data = [

            'siswas' => $this->siswaModel->getSiswaWithGroupAndKelas(),            
            'activePage' => 'Manage Siswa',
            'tittle' => 'Lapak Siswa | Kelola Siswa',
            'navigasi' => 'Manage Siswa Data'
        ];
        return view('backend/page/siswa/manage-siswa', $data);
    }

    // Menampilkan form untuk menambah siswa
    public function create()
    {

        $data = [
            'activePage' => 'Manage Siswa',
            'tittle' => 'Lapak Siswa | Siswa',
            'navigasi' => 'Tambah Data Siswa',
            'kelas' => $this->kelasModel->findAll(), // Ambil semua data kelas
            'admins' => $this->adminModel->findAll(), // Ambil semua data admin
        ];

        return view('backend/page/siswa/add-siswa', $data);
    }

    // Menyimpan data siswa baru
    public function store()
    {
        // Validasi input
        $validation = $this->validate([
            'full_name' => 'required|min_length[3]',
            'username' => 'required|is_unique[siswa.username]',
            'email' => 'required|valid_email|is_unique[siswa.email]',
            'password' => 'required|min_length[6]',
            'gender' => 'required',
            'id_kelas' => 'required', // Pastikan id_kelas diambil dari form
            'id_admin' => 'required', // Pastikan id_admin diambil dari form
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

        // Save siswa data
        $this->siswaModel->save([
            'id_admin' => $this->request->getPost('id_admin'), // Ambil id_admin dari form
            'id_kelas' => $this->request->getPost('id_kelas'), // Ambil id_kelas dari form
            'id_level' => 1, // Misalnya, level siswa adalah 1
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

        return redirect()->to('/manage-siswa')->with('success', 'Siswa created successfully');
    }
    // Menampilkan form untuk mengedit siswa
    public function edit($id)
    {
        $data = [
            'siswa' => $this->siswaModel->find($id),
            'activePage' => 'Manage Siswa',
            'tittle' => 'Lapak Siswa | Siswa',
            'navigasi' => 'Edit Data Siswa'
        ];
        return view('backend/page/siswa/edit-siswa', $data);
    }

    // Memperbarui data siswa
    public function update($id)
    {
        // Validasi input
        $validation = $this->validate([
            'full_name' => 'min_length[3]',
            'username' => "min_length[5]|is_unique[siswa.username,id_siswa,{$id}]",
            'email' => "valid_email|min_length[6]|is_unique[siswa.email,id_siswa,{$id}]",
            'url_image' => 'is_image[url_image]|max_size[url_image,2048]',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Ambil data siswa yang ada
        $siswaData = $this->siswaModel->find($id);
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
        if ($this->request->getPost('kelas')) {
            $dataToUpdate['kelas'] = $this->request->getPost('kelas');
        }
        if ($this->request->getPost('status_registrasi') !== null) {
            $dataToUpdate['status_registrasi'] = $this->request->getPost('status_registrasi');
        }

        // Cek jika ada file gambar yang diupload
        $file = $this->request->getFile('url_image');
        if ($file && $file->isValid()) {
            // Path direktori untuk menyimpan gambar
            $imgPath = 'img_user/';
            
            // Hapus gambar lama jika bukan gambar default
            if ($siswaData['url_image'] && $siswaData['url_image'] != 'img_user/user.png') {
                @unlink($siswaData['url_image']);
            }

            // Simpan gambar baru
            $fileName = $file->getRandomName();
            $file->move($imgPath, $fileName);
            $dataToUpdate['url_image'] = $imgPath . $fileName;
        } else {
            // Jika tidak ada gambar baru, pertahankan gambar lama
            $dataToUpdate['url_image'] = $siswaData['url_image'];
        }

        // Update siswa data
        $this->siswaModel->update($id, $dataToUpdate + ['updated_at' => date('Y-m-d H:i:s')]);

        $username = $this->request->getPost('username') ?: $siswaData['username'];
        return redirect()->to('/manage-siswa')->with('success', "Siswa '{$username}' Updated successfully");
    }

    // Menghapus siswa
    public function delete($id)
    {
        // Ambil data siswa yang ada
        $siswaData = $this->siswaModel->find($id);

        // Hapus gambar profil jika bukan gambar default
        if ($siswaData['url_image'] && $siswaData['url_image'] != 'img_user/user.png') {
            @unlink($siswaData['url_image']);
        }

        // Hapus siswa dari database
        $this->siswaModel->delete($id);
        $username = $this->request->getPost('username') ?: $siswaData['username'];
        return redirect()->to('/manage-siswa')->with('success', "Siswa '{$username}' Delete successfully");
    }
}