<?php

namespace App\Models;

use CodeIgniter\Model;

class UrlImageProductSiswaModel extends Model
{
    protected $table = 'url_image_product_siswa';
    protected $primaryKey = 'id_url_image_product';
    protected $allowedFields = ['id_product', 'url'];

    // public function getImagesByProductId($id_product)
    // {
    //     return $this->where('id_product', $id_product)->findAll();
    // }
    
    public function getImagesByProductId($id_product)
    {
        return $this->db->table('url_image_product_siswa')
            ->where('id_product', $id_product)
            ->get()
            ->getResultArray();
    }

    public function getImages($id_product)
    {
        return $this->db->table('url_image_product_siswa')
            ->where('id_product', $id_product)
            ->orderBy('id_product', 'ASC') // atau 'DESC' sesuai kebutuhan
            ->limit(1)
            ->get()
            ->getRowArray(); // ambil satu baris saja
    }


}