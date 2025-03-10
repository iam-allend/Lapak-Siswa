<?php

namespace App\Controllers;
use App\Models\AdminModel;

class MyProfileController extends BaseController
{
    protected $modelAdmin;
    public function index() {
        $data['tittle'] = 'Profile';
        return view('backend/page/myprofile', $data);
    }

    public function update() {
        $this->modelAdmin = new AdminModel();
        $id = $this->request->getPost('id');
        $data = [
            'full_name' => $this->request->getPost('nama'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
        ];
        
        // Jika password tidak kosong, tambahkan ke data dengan hashing
        $cekInput = $this->request->getPost('password');
        if (!empty($cekInput)) {
            $data['password'] = password_hash($cekInput, PASSWORD_DEFAULT);
        }
        
        // Update data ke database
        $this->modelAdmin->update($id, $data);
        
        // Update session
        session()->set('fullname', $data['full_name']);
        session()->set('username', $data['username']);
        session()->set('email', $data['email']);
        
        return redirect()->to(base_url('profile-admin'))->with('alert', 'profile-admin');
    }
    
}
