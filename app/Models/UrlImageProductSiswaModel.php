<?php

namespace App\Models;

use CodeIgniter\Model;

class UrlImageProductSiswaModel extends Model
{
    protected $table = 'url_image_product_siswa';
    protected $primaryKey = 'id_url_image_product';
    protected $allowedFields = ['id_product', 'url'];

    public function getImagesByProductId($id_product)
    {
        return $this->where('id_product', $id_product)->findAll();
    }
}