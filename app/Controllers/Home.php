<?php

namespace App\Controllers;

use App\Models\InstansiModel;
use App\Models\UserModel;
use App\Models\PerdaModel;

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
        $data = array(
            'title'          => 'Dashboard',
            'appname'        => 'SISTEM INFORMASI PERATURAN DAERAH',
            'isi'            => 'home',
            'instansi'       => $this->instansiModel->countAllResults(),
            'user'           => $this->userModel->where('level !=', 1)->countAllResults(),
            'perdap'         => $this->perdaModel->where('jenis_perda =', 'Propemperda')->countAllResults(),
            'perdanp'        => $this->perdaModel->where('jenis_perda =', 'Non-Propemperda')->countAllResults(),
        );
        return view('layout/wrapper', $data);
    }
}
