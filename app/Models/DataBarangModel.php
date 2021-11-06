<?php

namespace App\Models;

use CodeIgniter\Model;

class DataBarangModel extends Model
{
    protected $table = 'data_barang';
    protected $allowedFields = ['nama_barang', 'jenis_barang', 'stok', 'satuan'];

    public function getAllBarang()
    {
        return $this->table('data_barang')->findAll();
    }

    public function hapusData($id)
    {
        return $this->table('data_barang')->delete($id);
    }
}
