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
    
        $user = $this->loginModel->getUser($username);
    
        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'id_admin'  => $user['id_admin'],
                'id_level'  => $user['id_level'],
                'fullname'  => $user['full_name'],
                'username'  => $user['username'],
                'email'     => $user['email'],
                'gender'    => $user['gender'],
                'url_image' => $user['url_image'],
                'logged_in' => true
            ];
            $session->set($sessionData);
    
            $redirectRoutes = [
                3 => 'dashboard',
                4 => 'dashboard',
                2 => '/',
                1 => 'customer/dashboard',
                5 => 'industri/dashboard'
            ];
    
            $redirectUrl = isset($redirectRoutes[$user['id_level']]) ? base_url($redirectRoutes[$user['id_level']]) : base_url('login');
            
            return redirect()->to($redirectUrl)->with('alert', 'login_sukses');
        }
        
        return redirect()->to(base_url('login'))->with('alert', 'login_gagal');
    }
    
    public function logout()
    {
        session()->destroy(); // Menghancurkan session
        return redirect()->to('login'); // Ganti dengan URL login yang sesuai
    }
}