<?php

namespace App\Models;


use CodeIgniter\Model;

class JenisBarangModel extends Model
{
    protected $table = 'jenis_barang';
    protected $allowedFields = ['jenis'];

    public function getAllJenis()
    {
        return $this->table('jenis_barang')->findAll();
    }

    public function hapusData($id)
    {
        return $this->table('jenis_barang')->delete($id);
    }
}
