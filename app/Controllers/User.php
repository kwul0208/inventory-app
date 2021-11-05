<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Db_model;
use App\Models\DataBarangModel;


$session = \Config\Services::session();

if (!$session->get('log')) {
    return redirect()->to('/');
};

if ($session->get('role_id') !== '2') {
    return redirect()->to('User');
}

class User extends Controller
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
        $data['barang'] = $this->dataBarangModel->getAllBarang();


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/dashboard');
        echo view('templates/footer');
    }
}
