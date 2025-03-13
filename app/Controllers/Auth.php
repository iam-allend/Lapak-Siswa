<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\SiswaModel;
use App\Models\KelasModel;
use App\Models\CustomerModel;
use App\Models\IndustriModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $adminModel;
    protected $siswaModel;
    protected $kelasModel;
    protected $customerModel;
    protected $industriModel;
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

    public function getContent()
    {
        $this->kelasModel = new KelasModel();
        $data['kelas'] = $this->kelasModel->findAll();

        if ($this->request->isAJAX()) {
            $level = $this->request->getPost('level'); 

            $content = "";

            switch ($level) {
                case "4":
                    $content = view('auth/register-form/superadmin'); 
                    break;
                case "3":
                    $content = view('auth/register-form/admin');
                    break;
                case "1":
                    $content = view('auth/register-form/siswa',$data);
                    break;
                case "2":
                    $content = view('auth/register-form/customer');
                    break;
                case "5":
                    $content = view('auth/register-form/industri');
                    break;
                default:
                    $content = "<p style='color:red;'>Halaman tidak ditemukan</p>";
                    break;
            }

            return $this->response->setJSON(['content' => $content]); 
        }

        return redirect()->to(base_url()); 
    }

    public function add_register(){
        $this->adminModel = new AdminModel();
        $this->siswaModel = new SiswaModel();
        $this->customerModel = new CustomerModel();
        $this->industriModel = new IndustriModel();

        $level = $this->request->getPost('level'); 
        switch($level){
            case "2": //customer
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
            
                $existingUser = $this->customerModel->where('username', $username)->orWhere('email', $email)->first();
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
                $file->move(ROOTPATH . 'public/backend/img_customer', $newName);
            
                $password = $this->request->getPost('password');
                $data = [
                    'id_level' => $this->request->getPost('level'),
                    'full_name' => $this->request->getPost('fullname'),
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'gender' => $this->request->getPost('gender'),
                    'alamat' => $this->request->getPost('alamat'),
                    'no_telp' => $this->request->getPost('telp'),
                    'url_image' => $newName,
                    'status_registrasi' => false
                ];
                $this->customerModel->insert($data);
                return redirect()->to(base_url('login'))->with('alert','register_sukses');

                break;
            case "1": //siswa
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
            
                $existingUser = $this->siswaModel->where('username', $username)->orWhere('email', $email)->first();
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
                $file->move(ROOTPATH . 'public/backend/img_siswa', $newName);
            
                $password = $this->request->getPost('password');
                $data = [
                    'id_level' => $this->request->getPost('level'),
                    'full_name' => $this->request->getPost('fullname'),
                    'id_kelas' => $this->request->getPost('kelas'),
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'gender' => $this->request->getPost('gender'),
                    'url_image' => $newName,
                    'status_registrasi' => false
                ];
                $this->siswaModel->insert($data);
                return redirect()->to(base_url('login'))->with('alert','register_sukses');
        
                break;
            case "3": //admin
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
        
                break;
            case "4": //superadmin
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
        
                break;
            case "5": //collaborator
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
            
                $existingUser = $this->industriModel->where('username', $username)->orWhere('email', $email)->first();
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
                $file->move(ROOTPATH . 'public/img_collaborator', $newName);
            
                $password = $this->request->getPost('password');
                $data = [
                    'id_level' => $this->request->getPost('level'),
                    'nama' => $this->request->getPost('fullname'),
                    'tipe_indper' => $this->request->getPost('jenis'),
                    'username' => $username,
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'tgl_mulai_kerjasama' => $this->request->getPost('startDate'),
                    'url_image' => $newName,
                    'status_registrasi' => false
                ];
                $this->industriModel->insert($data);
                return redirect()->to(base_url('login'))->with('alert','register_sukses');

                break;
        }
    }

    public function login()
    {
        $session = session();
        $request = service('request');

        $usnEmail = $request->getPost('email-username');
        $password = $request->getPost('password');

        if (filter_var($usnEmail, FILTER_VALIDATE_EMAIL)) {
            $column = 'email';
            $errorMessage = 'validate_email_login';
        } else {
            $column = 'username';
            $errorMessage = 'validate_usn_login';
        }

        $tables = [
            'admin'              => new AdminModel(),
            'customer'           => new CustomerModel(),
            'siswa'              => new SiswaModel(),
            'industri_perusahaan' => new IndustriModel(),
        ];

        $user = null;
        $userTable = null;

        foreach ($tables as $table => $model) {
            $user = $model->getUser($usnEmail, $column);
            if ($user) {
                $userTable = $table;
                break;
            }
        }

        if (!$user) {
            return redirect()->to(base_url('login'))->with('alert', $errorMessage);
        }

        if ($userTable !== 'customer' && isset($user['status_registrasi']) && $user['status_registrasi'] == 0) {
            return redirect()->to(base_url('login'))->with('alert', 'validate_status_account');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->to(base_url('login'))->with('alert', 'validate_pw_login');
        }

        $sessionData = [
            'logged_in' => true,
            'user_table' => $userTable, 
        ];

        switch ($userTable) {
            case 'admin':
                $sessionData['id_admin']   = $user['id_admin'];
                $sessionData['id_level']  = $user['id_level'];
                $sessionData['fullname']  = $user['full_name'];
                $sessionData['username']  = $user['username'];
                $sessionData['email']     = $user['email'];
                $sessionData['gender']    = $user['gender'];
                $sessionData['group_name'] = $user['group_name'];
                $sessionData['url_image'] = $user['url_image'];
                break;

            case 'customer':
                $sessionData['id_customer']   = $user['id_customer'];
                $sessionData['id_level']  = $user['id_level']; 
                $sessionData['fullname']  = $user['full_name'];
                $sessionData['username']  = $user['username'];
                $sessionData['email']     = $user['email'];
                $sessionData['gender']    = $user['gender'];
                $sessionData['url_image'] = $user['url_image'];
                break;

            case 'siswa':
                $sessionData['id_siswa']   = $user['id_siswa'];
                $sessionData['id_level']  = $user['id_level']; 
                $sessionData['fullname']  = $user['full_name'];
                $sessionData['username']  = $user['username'];
                $sessionData['email']     = $user['email'];
                $sessionData['gender']    = $user['gender'];
                $sessionData['url_image'] = $user['url_image'];
                break;

            case 'industri_perusahaan':
                $sessionData['id_industri']   = $user['id_industri'];
                $sessionData['id_level']  = $user['id_level']; 
                $sessionData['fullname']  = $user['nama'];
                $sessionData['username']  = $user['username'];
                $sessionData['email']     = $user['email'];
                $sessionData['url_image'] = $user['url_image'];
                break;
        }

        $session->set($sessionData);

        $redirectRoutes = [
            1 => 'profile',
            2 => 'profile',
            3 => 'dashboard',
            4 => 'dashboard',
            5 => 'industri/dashboard',
        ];

        return redirect()->to(base_url($redirectRoutes[$sessionData['id_level']] ?? 'login'))->with('alert', 'login_sukses');
    }
    public function logout()
    {
        session()->destroy(); // Menghancurkan session
        return redirect()->to('login'); // Ganti dengan URL login yang sesuai
    }
}