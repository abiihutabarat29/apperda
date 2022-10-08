<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SppdModel;
use App\Models\SpjKegiatanModel;
use App\Models\AnggaranModel;
use App\Models\GuModel;
use App\Models\BagianModel;

class Home extends BaseController
{
    protected $userModel;
    protected $sppdModel;
    protected $spjkegModel;
    protected $anggaranModel;
    protected $guModel;
    protected $bagianModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->sppdModel = new SppdModel();
        $this->spjkegModel = new SpjKegiatanModel();
        $this->anggaranModel = new AnggaranModel();
        $this->guModel = new GuModel();
        $this->bagianModel = new BagianModel();
    }
    public function index()
    {
        $idb = session()->get('id_bagian');
        $profil = $this->userModel->where('id_bagian =', $idb)->first();
        $data = array(
            'title'          => 'Dashboard',
            'data'           => $profil,
            'spjsppd'        => $this->sppdModel->where('id_bagian', $idb)->countAllResults(),
            'spjkegiatan'    => $this->spjkegModel->where('id_bagian', $idb)->countAllResults(),
            'bagian'         => $this->bagianModel->countAllResults(),
            'account'        => $this->userModel->where('level !=', 1)->countAllResults(),
            'spjsppdall'     => $this->sppdModel->countAllResults(),
            'spjkegiatanall' => $this->spjkegModel->countAllResults(),
            'anggaran'       => $this->anggaranModel->where('id_bagian', $idb)->first(),
            'gu'             =>  $this->guModel->first(),
            'isi'            => 'home',
        );
        return view('layout/wrapper', $data);
    }
}
