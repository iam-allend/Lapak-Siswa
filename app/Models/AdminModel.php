<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['username', 'password', 'id_level', 'email']; // Pastikan 'email' ada di sini

    public function getUserByUsernameOrEmail($usernameOrEmail)
    {
        return $this->select('admin.*, level.nama AS level_name')
                    ->join('level_user level', 'admin.id_level = level.id_level') // Pastikan join dengan tabel level_user
                    ->where('admin.username', $usernameOrEmail)
                    ->orWhere('admin.email', $usernameOrEmail) // Mencari berdasarkan email juga
                    ->first();
    }
}