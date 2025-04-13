<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table      = 'cart';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['user_id', 'product_id', 'quantity'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getProduk($userId){
        return $this->select('cart.*,
                              product_siswa.*,
                              url_image_product_siswa.*')
                    ->join('product_siswa','cart.product_id = product_siswa.id_product')
                    ->join('url_image_product_siswa','cart.product_id = url_image_product_siswa.id_product')
                    ->where('cart.user_id', $userId)
                    ->findAll();
    }

    public function getProdukCart($userId){
        return $this->select('cart.*, product_siswa.*')
                    ->join('product_siswa','cart.product_id = product_siswa.id_product')
                    ->where('cart.user_id', $userId)
                    ->findAll();
    }
}