<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriProductModel extends Model
{
    protected $table = 'kategori_product';
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama'];
}