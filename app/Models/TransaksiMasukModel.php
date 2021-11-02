<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiMasukModel extends Model
{
    protected $table = 'transaksi_masuk';
    protected $allowedFields = ['nama_barang', 'jenis_barang', 'stok', 'satuan', 'tanggal'];

    public function getAllTMasuk()
    {
        return $this->table('transaksi_masuk')->findAll();
    }
}
