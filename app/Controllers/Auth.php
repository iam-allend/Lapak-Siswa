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
    
        if (!$this->validate([
            'photo' => [
                'uploaded[photo]',
                'mime_in[photo,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                'max_size[photo,4096]',
            ],
        ])) {
            return redirect()->back()->with('error', 'Invalid file.');
        }
    
        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
    
        $existingUser = $this->adminModel->where('username', $username)->orWhere('email', $email)->first();
        if ($existingUser) {
            if ($existingUser['username'] === $username && $existingUser['email'] === $email) {
                return redirect()->back()->with('alert', 'validate_usn_email');
            } elseif ($existingUser['username'] === $username) {
                return redirect()->back()->with('alert', 'validate_username');
            } elseif ($existingUser['email'] === $email) {
                return redirect()->back()->with('alert', 'validate_email');
            }
        }
    
        $file = $this->request->getFile('photo');
        $newName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/img_user', $newName);
    
        $password = $this->request->getPost('password');
        $data = [
            'id_level' => $this->request->getPost('level'),
            'full_name' => $this->request->getPost('fullname'),
            'username' => $username,
            'email' => $email,
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

        $usnEmail = $this->request->getPost('email-username');
        $password = $this->request->getPost('password');

        if (filter_var($usnEmail, FILTER_VALIDATE_EMAIL)) {
            $user = $this->loginModel->getUser($usnEmail, 'email');
            $errorMessage = "validate_email_login";
        } else {
            $user = $this->loginModel->getUser($usnEmail, 'username');
            $errorMessage = "validate_usn_login";
        }

        if (!$user) {
            return redirect()->to(base_url('login'))->with('alert', $errorMessage);
        }

        if ($user['status_registrasi'] == 0) { 
            return redirect()->to(base_url('login'))->with('alert', 'validate_status_account');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->to(base_url('login'))->with('alert', 'validate_pw_login');
        }

        $sessionData = [
            'id_admin'   => $user['id_admin'],
            'id_level'   => $user['admin_id_level'],
            'nama_level' => $user['nama'],
            'fullname'   => $user['full_name'],
            'username'   => $user['username'],
            'email'      => $user['email'],
            'gender'     => $user['gender'],
            'url_image'  => $user['url_image'],
            'logged_in'  => true
        ];
        $session->set($sessionData);

        $redirectRoutes = [
            3 => 'dashboard',
            4 => 'dashboard',
            2 => '/',
            1 => 'customer/dashboard',
            5 => 'industri/dashboard'
        ];

        $redirectUrl = $redirectRoutes[$user['admin_id_level']] ?? 'login';

        return redirect()->to(base_url($redirectUrl))->with('alert', 'login_sukses');
    }
    public function logout()
    {
        session()->destroy(); // Menghancurkan session
        return redirect()->to('login'); // Ganti dengan URL login yang sesuai
    }
}