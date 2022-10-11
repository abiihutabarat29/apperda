<?php

namespace App\Controllers;

class Slideshow extends BaseController
{
    public function index()
    {
        $data = array(
            'title'          => 'SLideshow',
            'appname'        => 'SISTEM INFORMASI PERATURAN DAERAH',
            'isi'            => 'setting/slideshow/data',
        );
        return view('layout/wrapper', $data);
    }
}
