<?php

namespace App\Controllers;

use App\Models\Db_model;
use App\Models\DataBarangModel;

use CodeIgniter\Controller;

class Admin extends Controller
{
    protected $dbModel;

    public function __construct()
    {
        $this->dbModel = new Db_model();
        $this->dataBarangModel = new DataBarangModel();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/dashboard');
        echo view('templates/footer');
    }

    // tambah barang baru
    public function dataBarang()
    {
        $data['title'] = 'Data Barang';

        $data['barang'] = $this->dataBarangModel->getAllBarang();


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/dataBarang', $data);
        echo view('templates/footer');
    }

    public function tambahBarang()
    {
        $data['title'] = 'Tambah Barang';

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/tambahBarang', $data);
        echo view('templates/footer');
    }

    public function saveBarang()
    {
        $data['title'] = 'Tambah Barang';

        helper(['form', 'url']);

        $input = $this->validate([
            'nama' => 'required'
        ]);

        if (!$input) {

            echo view('templates/header', $data);
            echo view('templates/sidebar');
            echo view('templates/navbar');
            echo view('pages/tambahBarang', $data);
            echo view('templates/footer');
        }

        $this->dataBarangModel->save([
            'nama_barang' => $this->request->getVar('nama'),
            'jenis_barang' => $this->request->getVar('jenis'),
            'satuan' => $this->request->getVar('satuan')
        ]);

        return redirect()->to('/Admin/dataBarang');
    }



    // end
}
