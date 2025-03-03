<?php
namespace App\Models;

use CodeIgniter\Model;

class PajakModel extends Model
{
    protected $table = 'pajak';
    protected $primaryKey = 'id_pajak';
    protected $allowedFields = ['id_level', 'besaran'];

    // Ambil data pajak + nama level
    public function getPajakWithLevel()
    {
        return $this->db->table('pajak')
            ->select('pajak.*, level_user.nama as nama_level')
            ->join('level_user', 'level_user.id_level = pajak.id_level')
            ->get()
            ->getResultArray();
    }
}