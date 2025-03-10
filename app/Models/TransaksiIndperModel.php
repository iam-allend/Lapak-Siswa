<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiIndperModel extends Model
{
    protected $table = 'transaksi_industri_perusahaan';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = [
        'id_product', 'id_industri', 'id_customer', 'quantity', 'price_at_transaction', 'total_price', 'status_order', 'updated_at', 'created_at'
    ];

    // Ambil data transaksi beserta detail produk, industri, dan customer
    public function getTransactionsWithDetails()
    {
        return $this->db->table('transaksi_industri_perusahaan')
            ->select('transaksi_industri_perusahaan.*, product_industri_perusahaan.product_name, industri_perusahaan.nama as nama_industri, customer.full_name as customer_name, customer.email, customer.no_telp, customer.saldo')
            ->join('product_industri_perusahaan', 'product_industri_perusahaan.id_product = transaksi_industri_perusahaan.id_product', 'left')
            ->join('industri_perusahaan', 'industri_perusahaan.id_industri = transaksi_industri_perusahaan.id_industri', 'left')
            ->join('customer', 'customer.id_customer = transaksi_industri_perusahaan.id_customer', 'left')
            ->get()
            ->getResultArray();
    }

    // Ambil detail transaksi berdasarkan ID
    public function getTransactionWithDetails($id)
    {
        return $this->db->table('transaksi_industri_perusahaan')
            ->select('transaksi_industri_perusahaan.*, product_industri_perusahaan.product_name, industri_perusahaan.nama as nama_industri, customer.full_name as customer_name, customer.email, customer.no_telp, customer.saldo')
            ->join('product_industri_perusahaan', 'product_industri_perusahaan.id_product = transaksi_industri_perusahaan.id_product', 'left')
            ->join('industri_perusahaan', 'industri_perusahaan.id_industri = transaksi_industri_perusahaan.id_industri', 'left')
            ->join('customer', 'customer.id_customer = transaksi_industri_perusahaan.id_customer', 'left')
            ->where('transaksi_industri_perusahaan.id_transaksi', $id)
            ->get()
            ->getRowArray();
    }
}