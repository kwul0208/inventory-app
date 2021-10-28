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

        $user = $this->dbModel->where('id', 9)->findAll();




        $data = [
            'title' => 'Login',
            'user' => $user
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
                        'role_id' => $user['role_id']
                    ];

                    $session->set($datasession);

                    return redirect()->to('/Admin');
                } else {
                    $datasession = [
                        'id' => $user['id'],
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

        $array_items = array('id', 'role_id');
        $session->remove($array_items);
        return redirect()->to('/Auth');
    }
}
