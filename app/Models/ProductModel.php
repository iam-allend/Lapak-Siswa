<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    // Tentukan group database yang akan digunakan, di sini 'androidDB'
    protected $DBGroup = 'androidDB'; 
    
    protected $table = 'tbl_product'; // Nama tabel produk di database 'android'
    protected $primaryKey = 'kode'; 

    protected $useAutoIncrement = false; 
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 

    // Kolom-kolom yang bisa diisi (sesuai dengan kolom di tbl_product Anda)
    protected $allowedFields = [
        'kode', 'merk', 'kategori', 'satuan',
        'hargabeli', 'diskonbeli', 'hargapokok', 'hargajual',
        'diskonjual', 'stok', 'foto', 'deskripsi', 'view'
    ];

    protected $useTimestamps = false; 
    protected $dateFormat    = 'datetime';

    // Metode untuk mengambil semua produk
    public function getAllProducts()
    {
        return $this->findAll();
    }

    // Metode untuk mengambil detail produk berdasarkan kode
    public function getProductByKode($kode)
    {
        return $this->find($kode);
    }

    // Metode untuk menambahkan produk
    public function addProduct($data)
    {
        return $this->insert($data);
    }

    // Metode untuk memperbarui produk
    public function updateProduct($kode, $data)
    {
        return $this->update($kode, $data);
    }

    // Metode untuk menghapus produk
    public function deleteProductByKode($kode)
    {
        return $this->delete($kode);
    }
}