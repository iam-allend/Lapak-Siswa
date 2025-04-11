<?php
namespace App\Models;

use CodeIgniter\Model;

class DepositModel extends Model
{
    protected $table = 'deposit';
    protected $primaryKey = 'id_deposit';
    protected $allowedFields = [
        'id_customer', 
        'id_bank', 
        'jumlah_deposit', 
        'saldo_masuk',
        'bukti_transfer',
        'status'
    ];

    public function getDepositWithDetails($id = null)
    {
        $builder = $this->db->table($this->table)
            ->select('deposit.*, customer.full_name, customer.email, bank.nama_bank, bank.nomor_rekening')
            ->join('customer', 'customer.id_customer = deposit.id_customer')
            ->join('bank', 'bank.id_bank = deposit.id_bank')
            ->orderBy('deposit.created_at', 'DESC');

        if ($id) {
            return $builder->where('deposit.id_deposit', $id)->get()->getRowArray();
        }

        return $builder->get()->getResultArray();
    }
}