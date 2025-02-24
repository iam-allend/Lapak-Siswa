<?php
namespace App\Models;
use CodeIgniter\Model;

class OrderProductSiswaModel extends Model {
    protected $table = 'transaksi_siswa';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_product', 'id_admin', 'id_customer', 'quantity', 
        'price_at_transaction', 'total_price', 'status_order', 
        'created_at', 'updated_at'
    ];

    public function getTransactionsWithDetails() {
        return $this->db->table('transaksi_siswa')
            ->select('
                transaksi_siswa.*, 
                product_siswa.product_name, 
                admin.full_name as admin_name, 
                customer.username as customer_name,
                customer.saldo
            ')
            ->join('product_siswa', 'product_siswa.id_product = transaksi_siswa.id_product')
            ->join('admin', 'admin.id_admin = transaksi_siswa.id_admin')
            ->join('customer', 'customer.id_customer = transaksi_siswa.id_customer')
            ->get()
            ->getResultArray();
    }
}

