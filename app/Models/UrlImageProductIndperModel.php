<?php

namespace App\Models;

use CodeIgniter\Model;

class UrlImageProductIndperModel extends Model
{
    protected $table = 'url_image_product_indper';
    protected $primaryKey = 'id_url_image_product';
    protected $allowedFields = ['id_product', 'url'];

    // Ambil gambar berdasarkan id_product
    public function getImagesByProductId($id_product)
    {
        return $this->where('id_product', $id_product)->findAll();
    }
}