<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductIndperModel extends Model
{
    protected $table = 'product_industri_perusahaan';
    protected $primaryKey = 'id_product';
    protected $allowedFields = [
        'id_industri', 'id_kategori', 'product_name', 'description', 'stock', 'price', 'price_final', 'weight', 'sell', 'discount', 'status_registrasi', 'expired', 'updated_at', 'created_at'
    ];

    // Ambil produk beserta kategori dan industri/perusahaan
    public function getProductWithCategoryAndIndustri()
    {
        return $this->db->table('product_industri_perusahaan')
            ->select('product_industri_perusahaan.*, kategori_product.nama as nama_kategori, industri_perusahaan.nama as nama_industri')
            ->join('kategori_product', 'kategori_product.id_kategori = product_industri_perusahaan.id_kategori', 'left')
            ->join('industri_perusahaan', 'industri_perusahaan.id_industri = product_industri_perusahaan.id_industri', 'left')
            ->get()
            ->getResultArray();
    }

    // Ambil gambar produk berdasarkan id_product
    public function getImagesByProductId($id_product)
    {
        return $this->db->table('url_image_product_indper')
            ->where('id_product', $id_product)
            ->get()
            ->getResultArray();
    }
}