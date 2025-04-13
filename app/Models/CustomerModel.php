<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $allowedFields = [
        'id_level', 'full_name', 'username', 'email', 'password', 
        'no_telp', 'gender', 'alamat', 'saldo', 'url_image', 
        'updated_at', 'created_at'
    ];

    public function getCustomerWithLevel()
    {
        return $this->db->table('customer')
            ->select('customer.*, level_user.nama')
            ->join('level_user', 'level_user.id_level = customer.id_level', 'left')
            ->get()
            ->getResultArray();
    }

    public function getUser($usnEmail, $type = 'username')
    {
        return $this->select('id_customer, id_level, full_name, username, email, password, gender, url_image, no_telp, alamat')
                    ->where($type, $usnEmail)
                    ->first();
    }

    public function updateProfile($id, $data)
    {
        // Jika ada password baru
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }

        // Set updated_at
        $data['updated_at'] = date('Y-m-d H:i:s');

        return $this->update($id, $data);
    }
}