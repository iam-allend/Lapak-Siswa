<?php

namespace App\Models;

use CodeIgniter\Model;

class PajakModel extends Model
{
    protected $table = 'pajak';
    protected $primaryKey = 'id_pajak';
    protected $allowedFields = ['id_level', 'besaran'];
}