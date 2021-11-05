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
        $session = \Config\Services::session();

        if ($session->get('role_id') === '1') {
            return redirect()->to('Admin');
        } elseif ($session->get('role_id') === '2') {
            return redirect()->to('User');
        }

        $data = [
            'title' => 'Login',
        ];

        return view('auth/login', $data);
    }

    public function cekLogin()
    {
        $session = \Config\Services::session();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $input = $this->validate([
            'email' => 'required|valid_email',
            'password' => 'required'
        ]);

        if (!$input) {
            return view('auth/login');
        }

        if ($email) {
            $user = $this->dbModel->where('email', $email)->first();

            if (password_verify($password, $user['password'])) {
                if ($user['role_id'] === '1') {
                    $datasession = [
                        'id' => $user['id'],
                        'log' => TRUE,
                        'nama' => $user['nama'],
                        'role_id' => $user['role_id']
                    ];

                    $session->set($datasession);

                    return redirect()->to('/Admin');
                } else {
                    $datasession = [
                        'id' => $user['id'],
                        'log' => TRUE,
                        'nama' => $user['nama'],
                        'role_id' => $user['role_id']
                    ];

                    $session->set($datasession);
                    return redirect()->to('/User');
                }
            } else {
                return redirect()->to('/Auth');
            }
        } else {
            return redirect()->to('/Auth');
        }
    }

    public function Register()
    {

        $session = \Config\Services::session();

        if ($session->get('role_id') === '1') {
            return redirect()->to('Admin');
        } elseif ($session->get('role_id') === '2') {
            return redirect()->to('User');
        }

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

    public function logOut()
    {
        $session = \Config\Services::session();

        $array_items = array('id', 'role_id', 'log');
        $session->remove($array_items);
        return redirect()->to('/Auth');
    }
}
