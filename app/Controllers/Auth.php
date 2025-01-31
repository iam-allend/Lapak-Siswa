<?php

namespace App\Controllers;

use App\Models\AdminModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $adminModel;
    protected $loginModel;

    public function index() {

        $data = [
            'tittle' => 'Login',
        ];
        return view('auth/login', $data);
    }
    public function register() {

        $data = [
            'tittle' => 'Register',
        ];
        return view('auth/register', $data);
    }

    public function add_register(){
        $this->adminModel = new AdminModel();

        // Validasi file
        if (!$this->validate([
            'photo' => [
                'uploaded[photo]',
                'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'max_size[photo,4096]', // max 4MB
            ],
        ])) {
            return redirect()->back()->with('error', 'Invalid file.');
        }

        // Mengambil file dan mengubah namanya
        $file = $this->request->getFile('photo');
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/img_user', $newName);


        $password = $this->request->getPost('password');
        $data = [
            'id_level' => $this->request->getPost('level'),
            'full_name' => $this->request->getPost('fullname'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'gender' => $this->request->getPost('gender'),
            'url_image' => $newName,
            'status_registrasi' => false
        ];
        $this->adminModel->insert($data);
        return redirect()->to(base_url('login'))->with('alert','register_sukses');
    }

    public function login()
    {
        $session = session();
        $this->loginModel = new AdminModel();

        $username = $this->request->getPost('email-username');
        $password = $this->request->getPost('password');
        $level = $this->request->getPost('level');

        $user = $this->loginModel->getUser($username, $level);

        if ($user) {
            if (password_verify($password, $user['password'])) { // Gunakan password_verify()
                $sessionData = [
                    'id_admin' => $user['id_admin'],
                    'id_level' => $user['id_level'],
                    'fullname' => $user['full_name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'gender' => $user['gender'],
                    'url_image' => $user['url_image'],
                    'logged_in' => true
                ];
                $session->set($sessionData);

                if ($level == 3) {
                    return redirect()->to(base_url('dashboard'))->with('alert','login_sukses');
                } elseif ($level == 4) {
                    return redirect()->to(base_url('superadmin/dashboard'))->with('alert','login_sukses');
                } elseif ($level == 2) {
                    return redirect()->to(base_url('siswa/dashboard'))->with('alert','login_sukses');
                } elseif ($level == 1) {
                    return redirect()->to(base_url('customer/dashboard'))->with('alert','login_sukses');
                } elseif ($level == 5) {
                    return redirect()->to(base_url('industri/dashboard'))->with('alert','login_sukses');
                }
            } else {
                return redirect()->to(base_url('login'))->with('alert','login_gagal');
            }
        } else {
            return redirect()->to(base_url('login'))->with('alert','login_gagal');
        }
    }

    public function logout()
    {
        session()->destroy(); // Menghancurkan session
        return redirect()->to('login'); // Ganti dengan URL login yang sesuai
    }
}