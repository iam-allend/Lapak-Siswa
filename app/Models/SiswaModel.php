<?php

namespace App\Models;

use App\Controllers\Admin;
use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = [
        'id_admin', 'id_kelas', 'id_level', 'full_name', 'username', 'email', 'password', 'gender', 'url_image', 'status_registrasi', 'updated_at', 'created_at'
    ];

    public function getSiswaWithGroupAndKelas()
    {
        return $this->db->table('siswa')
            ->select('siswa.*, admin.group_name, kelas.nama as kelas, admin.full_name as nama_admin, kelas.wali_kelas') // Ambil group_name dari admin dan nama kelas dari kelas
            ->join('admin', 'admin.id_admin = siswa.id_admin', 'left') // Join dengan tabel admin
            ->join('kelas', 'kelas.id_kelas = siswa.id_kelas', 'left') // Join dengan tabel kelas
            ->get()
            ->getResultArray();
    }

}