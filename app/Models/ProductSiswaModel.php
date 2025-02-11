<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductSiswaModel extends Model
{
    protected $table = 'product_siswa';
    protected $primaryKey = 'id_product';
    protected $allowedFields = [
        'id_admin', 'id_kategori', 'product_name', 'description', 'stock', 'price', 'price_final', 'weight', 'sell', 'expired', 'discount', 'status_registrasi', 'created_at', 'updated_at'
    ];

    public function getProductWithCategoryAndAdmin()
    {
        return $this->db->table('product_siswa')
            ->select('product_siswa.*, kategori_product.nama, admin.full_name as nama_admin')
            ->join('kategori_product', 'kategori_product.id_kategori = product_siswa.id_kategori', 'left')
            ->join('admin', 'admin.id_admin = product_siswa.id_admin', 'left')
            ->get()
            ->getResultArray();
    }
}