<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $allowedFields = [
        'id_level', 'full_name', 'username', 'email', 'password', 'no_telp', 'gender', 'alamat', 'saldo', 'updated_at', 'created_at'
    ];

    public function getCustomerWithLevel()
    {
        return $this->db->table('customer')
            ->select('customer.*, level_user.nama')
            ->join('level_user', 'level_user.id_level = customer.id_level', 'left')
            ->get()
            ->getResultArray();
    }
}