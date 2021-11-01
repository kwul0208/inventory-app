<?php

namespace App\Controllers;

use App\Models\Db_model;
use App\Models\DataBarangModel;
use App\Models\JenisBarangModel;
use App\Models\satuanBarangModel;

use CodeIgniter\Controller;

class Admin extends Controller
{
    protected $dbModel;

    public function __construct()
    {
        $this->dbModel = new Db_model();
        $this->dataBarangModel = new DataBarangModel();
        $this->jenisBarangModel = new JenisBarangModel();
        $this->satuanBarangModel = new satuanBarangModel();
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
        $data['jenisBarang'] = $this->jenisBarangModel->getAllJenis();
        $data['satuanBarang'] = $this->satuanBarangModel->getAllSatuan();

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

    // jenis Barang
    public function jenisBarang()
    {
        $data['title'] = 'Jenis Barang';
        $data['jenisBarang'] = $this->jenisBarangModel->getAllJenis();

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/jenisBarang', $data);
        echo view('templates/footer');
    }

    public function tambahJenis()
    {
        $data['title'] = 'Tambah Barang';

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/tambahJenis');
    }

    public function saveJenis()
    {
        $input = $this->validate([
            'jenis' => 'required'
        ]);

        if (!$input) {
            $data['title'] = 'Tambah Barang';

            echo view('templates/header', $data);
            echo view('templates/sidebar');
            echo view('templates/navbar');
            echo view('pages/tambahJenis');
        }

        $this->jenisBarangModel->save([
            'jenis' => $this->request->getVar('jenis')
        ]);

        return redirect()->to('Admin/jenisBarang');
    }

    // end

    // satuan
    public function satuanBarang()
    {
        $data['title'] = 'Satuan Barang';
        $data['satuanBarang'] = $this->satuanBarangModel->getAllSatuan();

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/satuanBarang', $data);
        echo view('templates/footer');
    }

    public function tambahSatuan()
    {
        $data['title'] = 'Satuan Barang';

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/tambahSatuan');
    }

    public function saveSatuan()
    {

        $input = $this->validate([
            'satuan' => 'required'
        ]);

        if (!$input) {
            $data['title'] = 'Satuan Barang';

            echo view('templates/header', $data);
            echo view('templates/sidebar');
            echo view('templates/navbar');
            echo view('pages/tambahSatuan');
        } else {
            $this->satuanBarangModel->save([
                'satuan' => $this->request->getVar('satuan')
            ]);

            return redirect()->to('Admin/satuanBarang');
        }
    }
    // end



}
