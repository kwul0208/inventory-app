<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Db_model;
use App\Models\DataBarangModel;
use App\Models\TransaksiKeluarModel;
use App\Models\TransaksiMasukModel;

use TCPDF;


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
        $this->transaksiMasukModel = new TransaksiMasukModel();
        $this->transaksiKeluarModel = new TransaksiKeluarModel();
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

    public function laporanStok()
    {
        $data['title'] = 'Dashboard';
        $data['barang'] = $this->dataBarangModel->getAllBarang();


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/Laporan/laporanStok', $data);
        echo view('templates/footer');
    }

    public function printStokBarang()
    {
        $data['barang'] = $this->dataBarangModel->getAllBarang();

        $html = view('print/stok', $data);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');

        $pdf->Output('Stok Barang', 'I');
    }

    // laporan masuk
    public function laporanStokMasuk()
    {
        $data['title'] = 'Laporan Stok Masuk';
        $data['barang'] = $this->transaksiMasukModel->getAllTMasuk();


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/Laporan/laporanMasuk', $data);
        echo view('templates/footer');
    }

    public function printLaporanMasuk()
    {
        $data['barang'] = $this->transaksiMasukModel->getAllTMasuk();

        $html = view('print/masuk', $data);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');

        $pdf->Output('Laporan Masuk', 'I');
    }


    // laporan keluar
    public function laporanStokKeluar()
    {
        $data['title'] = 'Laporan Stok Keluar';
        $data['barang'] = $this->transaksiKeluarModel->getAllkeluar();


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/Laporan/laporanKeluar', $data);
        echo view('templates/footer');
    }

    public function printLaporanKeluar()
    {
        $data['barang'] = $this->transaksiKeluarModel->getAllkeluar();

        $html = view('print/keluar', $data);

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');

        $pdf->Output('Laporan Keluar', 'I');
    }
}
