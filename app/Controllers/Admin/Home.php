<?php

namespace App\Controllers\Admin;

use App\Models\InstansiModel;
use App\Models\UserModel;
use App\Models\PerdaModel;
use App\Controllers\BaseController;

class Home extends BaseController
{
    protected $instansiModel;
    protected $userModel;
    protected $perdaModel;

    public function __construct()
    {
        $this->instansiModel = new InstansiModel();
        $this->userModel = new UserModel();
        $this->perdaModel = new PerdaModel();
    }
    public function index()
    {
        $idu = session()->get('id');
        $idb = session()->get('id_instansi');
        $profil = $this->userModel->where('id =', $idu)->where('id_instansi =', $idb)->first();
        $data = array(
            'title'          => 'Dashboard',
            'appname'        => 'SISTEM INFORMASI PERATURAN DAERAH',
            'isi'            => 'admin/home',
            'data'           => $profil,
            'instansi'       => $this->instansiModel->countAllResults(),
            'user'           => $this->userModel->where('level !=', 1)->countAllResults(),
            //Perda Admin Setwan, Ketua Bapemperda & Bagian Hukum
            'perdap'         => $this->perdaModel->where('jenis_perda =', 'Propemperda')->countAllResults(),
            'perdanp'        => $this->perdaModel->where('jenis_perda =', 'Non-Propemperda')->countAllResults(),
            //Perda Masing-masing Instansi
            'perdapi'        => $this->perdaModel->where('id_instansi =', $idb)->where('jenis_perda =', 'Propemperda')->countAllResults(),
            'perdanpi'       => $this->perdaModel->where('id_instansi =', $idb)->where('jenis_perda =', 'Non-Propemperda')->countAllResults(),
        );
        return view('admin/layout/wrapper', $data);
    }
}
