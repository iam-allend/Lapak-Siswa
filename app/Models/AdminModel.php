<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = [
        'id_level','full_name','username', 'email', 'password', 
        'gender', 'url_image', 'status_registrasi', 'updated_at' ]; // Pastikan 'email' ada di sini
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    
    protected $validationRules = [
        'full_name' => 'required|min_length[3]',
        'username' => 'required|is_unique[admin.username]',
        'email' => 'required|valid_email|is_unique[admin.email]',
        'password' => 'required|min_length[6]',
        'gender' => 'required',
        'status_registrasi' => 'required',
    ];

    public function getUserByUsernameOrEmail($usernameOrEmail)
    {
        return $this->select('admin.*, level.nama AS level_name')
                    ->join('level_user level', 'admin.id_level = level.id_level') // Pastikan join dengan tabel level_user
                    ->where('admin.username', $usernameOrEmail)
                    ->orWhere('admin.email', $usernameOrEmail) // Mencari berdasarkan email juga
                    ->first();
    }

}