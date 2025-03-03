<?php
namespace App\Models;

use CodeIgniter\Model;

class LevelUserModel extends Model
{
    protected $table = 'level_user';
    protected $primaryKey = 'id_level';
    protected $allowedFields = ['nama_level'];
}