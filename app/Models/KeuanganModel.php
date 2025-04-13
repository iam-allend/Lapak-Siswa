<?php

namespace App\Models;

use CodeIgniter\Model;

class KeuanganModel extends Model
{
    protected $table = 'keuangan';
    protected $primaryKey = 'id_keuangan';
    protected $allowedFields = [
        'id_transaksi', 'jumlah', 'jenis', 'keterangan', 'asal', 'created_at', 'updated_at'
    ];

    // Method untuk menambahkan catatan keuangan
    public function addKeuangan($data)
    {
        return $this->insert($data);
    }
}