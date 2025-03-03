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

    public function getTransactionsWithDetails() {//AMBIL DNGN TANPA ID
        return $this->db->table('transaksi_siswa')
            ->select('
                transaksi_siswa.*, 
                product_siswa.product_name, 
                admin.full_name as admin_name, 
                customer.username as customer_name,
                customer.saldo, customer.no_telp, customer.email
            ')
            ->join('product_siswa', 'product_siswa.id_product = transaksi_siswa.id_product')
            ->join('admin', 'admin.id_admin = transaksi_siswa.id_admin')
            ->join('customer', 'customer.id_customer = transaksi_siswa.id_customer')
            ->get()
            ->getResultArray();
    }

    public function getTransactionWithDetails($id) {//AMBIL PER ID
        return $this->db->table('transaksi_siswa')
            ->select('
                transaksi_siswa.*, 
                product_siswa.product_name, 
                product_siswa.price_final as price_at_transaction,
                admin.full_name as admin_name,
                customer.username as customer_name, customer.saldo
            ')
            ->join('product_siswa', 'product_siswa.id_product = transaksi_siswa.id_product')
            ->join('admin', 'admin.id_admin = transaksi_siswa.id_admin')
            ->join('customer', 'customer.id_customer = transaksi_siswa.id_customer')
            ->where('transaksi_siswa.id_transaksi', $id)
            ->get()
            ->getRowArray();
    }
}

