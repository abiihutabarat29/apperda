<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class FilterSetwan implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('level') == "") {
            session()->setFlashdata('m', 'Maaf anda belum login.');
            return redirect()->to(base_url('site-admin'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('level') == 5) {
            return redirect()->to(base_url('admin/home'));
        }
    }
}
