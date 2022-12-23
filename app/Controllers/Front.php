<?php

namespace App\Controllers;

use App\Models\SlideshowModel;
use App\Models\AnggotaModel;
use App\Models\PerdaModel;
use App\Models\InstansiModel;
use App\Models\ProfilModel;

class Front extends BaseController
{
    public function __construct()
    {
        $this->SlideshowModel = new SlideshowModel();
        $this->AnggotaModel = new AnggotaModel();
        $this->PerdaModel = new PerdaModel();
        $this->InstansiModel = new InstansiModel();
        $this->profilModel = new ProfilModel();
    }
    public function index()
    {
        $data = array(
            'title'          => 'Beranda',
            'slideshow'      => $this->SlideshowModel->orderBy('id', 'asc')->findAll(),
            'anggota'        => $this->AnggotaModel->orderBy('id', 'asc')->findAll(),
            'profil'         => $this->profilModel->findAll(),
            'instansi'       => $this->InstansiModel->countAllResults(),
            'perdap'         => $this->PerdaModel->where('jenis_perda =', 'Propemperda')->countAllResults(),
            'perdanp'        => $this->PerdaModel->where('jenis_perda =', 'Non-Propemperda')->countAllResults(),
            'isi'            => 'front/index',
        );
        echo view('front/layout/wrapper', $data);
    }
    public function jadwal()
    {
        $data = array(
            'data'          => $this->PerdaModel->where('tgl_banmus !=', null)->orderBy('id', 'Desc')->findAll(),
            'profil'         => $this->profilModel->findAll(),
            'isi'           => 'front/jadwal',
        );
        echo view('front/layout/wrapper', $data);
    }
}
