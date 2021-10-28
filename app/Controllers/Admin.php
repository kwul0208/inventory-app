<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';

        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/navbar');
        echo view('pages/dashboard');
        echo view('templates/footer');
    }
}
