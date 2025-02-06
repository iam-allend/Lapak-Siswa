<?php

namespace App\Models;

use CodeIgniter\Model;

class IndustriModel extends Model
{
    protected $table = 'industri_perusahaan';
    protected $primaryKey = 'id_industri';
    protected $allowedFields = [
        'id_admin', 'id_level', 'nama', 'tipe_indper', 'username', 'email', 'password', 'superadmin_name', 'tgl_mulai_kerjasama', 'tgl_selesai_kerjasama', 'url_image', 'status_registrasi', 'updated_at', 'created_at'
    ];

    public function getIndustriWithAdmin()
    {
        return $this->db->table('industri_perusahaan')
            ->select('industri_perusahaan.*, admin.full_name as nama_admin')
            ->join('admin', 'admin.id_admin = industri_perusahaan.id_admin', 'left')
            ->get()
            ->getResultArray();
    }
}