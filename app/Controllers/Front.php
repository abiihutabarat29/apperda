<?php

namespace App\Controllers;

use App\Models\SlideshowModel;
use App\Models\AnggotaModel;
use App\Models\PerdaModel;
use App\Models\InstansiModel;

// use App\Models\InstansiModel;

class Front extends BaseController
{

    public function __construct()
    {

        $this->SlideshowModel = new SlideshowModel();
        $this->AnggotaModel = new AnggotaModel();
        $this->PerdaModel = new PerdaModel();
        $this->InstansiModel = new InstansiModel();
    }

    public function index()
    {
        $data = array(
            'title'         => 'HOME',
            'slideshow'     => $this->SlideshowModel->orderBy('id', 'Desc')->findAll(5),
            'anggota'       => $this->AnggotaModel->orderBy('id', 'Desc')->findAll(5),
            'instansi'       => $this->InstansiModel->countAllResults(),
            'perdap'         => $this->PerdaModel->where('jenis_perda =', 'Propemperda')->countAllResults(),
            'perdanp'        => $this->PerdaModel->where('jenis_perda =', 'Non-Propemperda')->countAllResults(),
            'isi'           => 'front/index',
        );
        echo view('front/layout/wrapper', $data);
    }


    public function jadwal()
    {

        $data = array(
            'title'         => 'jadwal',
            // 'jadwal'        => $this->PerdaModel->orderBy('id', 'Desc')->findAll(3),
            'isi'           => 'front/jadwal',
        );
        echo view('front/layout/wrapper', $data);
    }
}
