<?php

namespace App\Controllers;

use App\Models\Db_model;
use App\Models\DataBarangModel;
use App\Models\JenisBarangModel;
use App\Models\satuanBarangModel;
use App\Models\TransaksiKeluarModel;
use App\Models\TransaksiMasukModel;
use CodeIgniter\Controller;

use TCPDF;

class Admin extends Controller
{
    protected $dbModel;

    public function __construct()
    {
        $this->dbModel = new Db_model();
        $this->dataBarangModel = new DataBarangModel();
        $this->jenisBarangModel = new JenisBarangModel();
        $this->satuanBarangModel = new satuanBarangModel();
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

    // tambah barang baru
    public function dataBarang()
    {
        $data['title'] = 'Data Barang';

        // $coba = $this->dataBarangModel->where('id', 8)->find();
        // dd($coba[0]['nama_barang']);

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

    // TRANSAKSI
    // barang Masuk
    public function barangMasuk()
    {
        $data['title'] = 'Barang Masuk';
        $data['barang'] = $this->transaksiMasukModel->getAllTMasuk();

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/Transaksi/barangMasuk', $data);
        echo view('templates/footer');
    }

    public function tambahBarangMasuk()
    {
        $data['title'] = 'Tambah Barang Masuk';
        $data['jenisBarang'] = $this->jenisBarangModel->getAllJenis();
        $data['satuanBarang'] = $this->satuanBarangModel->getAllSatuan();
        $data['barang'] = $this->dataBarangModel->getAllBarang();


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/Transaksi/tambahBarangMasuk');
    }

    public function savebarangMasuk()
    {
        $input = $this->validate([
            'stok' => 'required|numeric',

        ]);

        if (!$input) {
            $data['jenisBarang'] = $this->jenisBarangModel->getAllJenis();
            $data['satuanBarang'] = $this->satuanBarangModel->getAllSatuan();
            $data['barang'] = $this->dataBarangModel->getAllBarang();


            $data['title'] = 'Tambah Barang Masuk';

            echo view('templates/header', $data);
            echo view('templates/sidebar');
            echo view('templates/navbar');
            echo view('pages/Transaksi/tambahBarangMasuk');
        } else {
            $format = "Y-m-d";
            $this->transaksiMasukModel->save([
                'nama_barang' => $this->request->getVar('nama'),
                'stok' => $this->request->getVar('stok'),
                'jenis_barang' => $this->request->getVar('jenis'),
                'satuan' => $this->request->getVar('satuan'),
                'tanggal' => date($format)
            ]);

            $stok_barang = $this->dataBarangModel->where('nama_barang',  $this->request->getVar('nama'))->find()[0]['stok'];

            $data = [
                'stok' => $stok_barang + $this->request->getVar('stok')
            ];

            $id_barang = $this->dataBarangModel->where('nama_barang',  $this->request->getVar('nama'))->find()[0]['id'];
            $this->dataBarangModel->update($id_barang, $data);

            return redirect()->to('Admin/barangMasuk');
        }
    }

    // barang keluar
    public function barangKeluar()
    {
        $data['title'] = 'Barang Masuk';
        $data['barang'] = $this->transaksiKeluarModel->getAllkeluar();

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/Transaksi/barangKeluar', $data);
        echo view('templates/footer');
    }

    public function tambahBarangKeluar()
    {
        $data['title'] = 'Tambah Barang Keluar';
        $data['jenisBarang'] = $this->jenisBarangModel->getAllJenis();
        $data['satuanBarang'] = $this->satuanBarangModel->getAllSatuan();
        $data['barang'] = $this->dataBarangModel->getAllBarang();


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/Transaksi/tambahBarangKeluar');
    }

    public function saveBarangKeluar()
    {
        $input = $this->validate([
            'stok' => 'required|numeric',

        ]);

        if (!$input) {
            $data['jenisBarang'] = $this->jenisBarangModel->getAllJenis();
            $data['satuanBarang'] = $this->satuanBarangModel->getAllSatuan();
            $data['barang'] = $this->dataBarangModel->getAllBarang();


            $data['title'] = 'Tambah Barang Masuk';

            echo view('templates/header', $data);
            echo view('templates/sidebar');
            echo view('templates/navbar');
            echo view('pages/Transaksi/tambahBarangMasuk');
        } else {
            $format = "Y-m-d";
            $this->transaksiKeluarModel->save([
                'nama_barang' => $this->request->getVar('nama'),
                'stok' => $this->request->getVar('stok'),
                'jenis_barang' => $this->request->getVar('jenis'),
                'satuan' => $this->request->getVar('satuan'),
                'tanggal' => date($format)
            ]);

            $stok_barang = $this->dataBarangModel->where('nama_barang',  $this->request->getVar('nama'))->find()[0]['stok'];

            $data = [
                'stok' => $stok_barang - $this->request->getVar('stok')
            ];

            $id_barang = $this->dataBarangModel->where('nama_barang',  $this->request->getVar('nama'))->find()[0]['id'];
            $this->dataBarangModel->update($id_barang, $data);

            return redirect()->to('Admin/barangKeluar');
        }
    }

    // END TRANSAKSI

    // LAPORAN
    // stokAll
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

    // END

    // PENGATURAN
    public function dataAdmin()
    {
        $data['title'] = 'Data Admin';
        $data['pengguna'] = $this->dbModel->where('role_id', 1)->findAll();


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/pengaturan/Admin', $data);
        echo view('templates/footer');
    }

    public function tambahAdmin()
    {
        $data['title'] = 'Tambah Admin';


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/pengaturan/tambahAdmin', $data);
        echo view('templates/footer');
    }

    public function saveAdmin()
    {
        $data = [
            'title' =>  'Tambah Admin'
        ];

        helper(['form', 'url']);


        $input = $this->validate([
            'nama' => 'required',
            'email' => 'required|valid_email',
            'password1' => 'matches[password2]',
            'password2' => 'matches[password1]',
        ]);

        if (!$input) {
            return view('auth/register', $data);
        }

        $this->dbModel->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
            'role_id' => 1,
            'date_created' => time()

        ]);

        return redirect()->to('/Auth');
    }

    public function dataUser()
    {
        $data['title'] = 'Data User';
        $data['pengguna'] = $this->dbModel->where('role_id', 2)->findAll();


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/pengaturan/User', $data);
        echo view('templates/footer');
    }

    public function tambahUser()
    {
        $data['title'] = 'Tambah User';


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/pengaturan/tambahUser', $data);
        echo view('templates/footer');
    }

    public function saveUser()
    {
        $data = [
            'title' =>  'Tambah Admin'
        ];

        helper(['form', 'url']);


        $input = $this->validate([
            'nama' => 'required',
            'email' => 'required|valid_email',
            'password1' => 'matches[password2]',
            'password2' => 'matches[password1]',
        ]);

        if (!$input) {
            return view('auth/register', $data);
        }

        $this->dbModel->save([
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'date_created' => time()

        ]);

        return redirect()->to('/Auth');
    }
}
