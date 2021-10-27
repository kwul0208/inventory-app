<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\Db_model;

class Auth extends Controller
{

    protected $dbModel;
    public function __construct()
    {
        $this->dbModel = new Db_model();
    }

    public function index()
    {
        $user = $this->dbModel->find(1);

        $data = [
            'title' => 'Login',
            'user' => $user
        ];

        return view('auth/login', $data);
    }

    public function Register()
    {
        // dd($this->request->getVar('nama'));


        $data = [
            'title' =>  'Registrai'
        ];
        return view('auth/register', $data);
    }

    public function newUser()
    {
        $data = [
            'title' =>  'Registrai'
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
}
