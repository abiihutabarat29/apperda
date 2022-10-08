<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = array(
            'title'          => 'Dashboard',
            'appname'        => 'SISTEM INFORMASI PERATURAN DAERAH',
            'isi'            => 'home',
        );
        return view('layout/wrapper', $data);
    }
}
