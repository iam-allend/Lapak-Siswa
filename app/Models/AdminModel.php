<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields = ['id_level','full_name','username',
    'email','password','gender','group_name','url_image','status_registrasi']; // Pastikan 'email' ada di sini
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUser($username, $level)
    {
        return $this->where('username', $username)
                    ->where('id_level', $level)
                    ->first();
    }

    public function getUserByUsernameOrEmail($usernameOrEmail)
    {
        return $this->select('admin.*, level.nama AS level_name')
                    ->join('level_user level', 'admin.id_level = level.id_level') // Pastikan join dengan tabel level_user
                    ->where('admin.username', $usernameOrEmail)
                    ->orWhere('admin.email', $usernameOrEmail) // Mencari berdasarkan email juga
                    ->first();
    }
}