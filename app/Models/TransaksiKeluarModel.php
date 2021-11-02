<?php

namespace App\Models;


use CodeIgniter\Model;

class TransaksiKeluarModel extends Model
{

    protected $table = 'transaksi_keluar';
    protected $allowedFields = ['nama_barang', 'jenis_barang', 'stok', 'satuan', 'tanggal'];

    public function getAllkeluar()
    {
        return $this->table('transaksi_keluar')->findAll();
    }
}
