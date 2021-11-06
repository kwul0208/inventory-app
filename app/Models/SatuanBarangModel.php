<?php

namespace App\Models;

use CodeIgniter\Model;

class satuanBarangModel extends Model
{
    protected $table = 'satuan_barang';
    protected $allowedFields = ['satuan'];

    public function getAllSatuan()
    {
        return $this->table('satuan_barang')->findAll();
    }

    public function hapusData($id)
    {
        return $this->table('satuan_barang')->delete($id);
    }
}
