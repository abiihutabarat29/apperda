<?php

namespace App\Controllers;

use App\Models\SlideshowModel;
use App\Models\AnggotaModel;

// use App\Models\InstansiModel;

class Front extends BaseController
{

    public function __construct()
    {

        $this->SlideshowModel = new SlideshowModel();
        $this->AnggotaModel = new AnggotaModel();
    }

    public function index()
    {
        $data = array(
            'title'         => 'HOME',
            'slideshow'     => $this->SlideshowModel->orderBy('id', 'Desc')->findAll(5),
            'anggota'       => $this->AnggotaModel->orderBy('id', 'Desc')->findAll(5),
            'isi'           => 'front/index',
        );
        echo view('front/layout/wrapper', $data);
    }
}