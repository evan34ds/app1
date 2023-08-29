<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class FilterDsn implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('level') == '') {
            session()->setFlashdata('pesan', 'Anda Belum Login, Silakan Login Dulu!!!');
            return redirect()->to(base_url('auth'));
        }
    }

    //Creating a Filter => Codeigniter.com user guide
    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('level') == 3) { // jika levelx 2 maka controlnya mhs
            return redirect()->to(base_url('dsn'));
        }
    }
}
