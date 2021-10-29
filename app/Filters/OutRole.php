<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class OutRole implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        if (session()->get('role_id') === '1') {
            return redirect()->to('Admin');
        } else if (session()->get('role_id') === '2') {
            return redirect()->to('User');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
