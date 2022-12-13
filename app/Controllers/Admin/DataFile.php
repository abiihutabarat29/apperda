<?php

namespace App\Controllers\Admin;

use App\Models\FileModel;
use App\Models\PerdaModel;
use App\Controllers\BaseController;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class DataFile extends BaseController
{
    protected $fileModel;
    protected $perdaModel;
    public function __construct()
    {
        $this->fileModel = new FileModel();
        $this->perdaModel = new PerdaModel();
    }

    public function addfile($id)
    {
        $ins = $this->perdaModel->where('id =', $id)->where('status', 4)->first();
        $id_instansi = $ins['id_instansi'];
        $perda = $this->perdaModel->where('id =', $id)->where('id_instansi =', $id_instansi)->where('status', 4)->first();
        $data = array(
            'titlebar' => 'Arsip Data Ranperda',
            'title' => 'Arsip Data Ranperda',
            'data' => $perda,
            'isi' => 'admin/master/perda/data-file',
        );

        return view('admin/layout/wrapper', $data);
    }
    public function upfile($id)
    {
        $draf   = $this->request->getFile('draf');
        $naskah   = $this->request->getFile('naskah');
        $dokumen   = $this->request->getFile('dokumen');
        $fileNamedraf = $draf->getRandomName();
        $fileNamenaskah = $naskah->getRandomName();
        $fileNamedokumen = $dokumen->getRandomName();
        $data = [
            'judul_perda'        => $this->request->getPost('judul'),
            'dasar_hukum'        => $this->request->getPost('dasar'),
            'draf_perda'         =>  $fileNamedraf,
            'naskah_akademik'    => $fileNamenaskah,
            'dokumen'            => $fileNamedokumen,
            'status'             => 0,
            'id_instansi'        => session()->get('id_instansi'),
            'instansi'           => session()->get('instansi'),
            'userentry'          => session()->get('nama'),
        ];
        $this->perdaModel->save($data);
        //move file
        $draf->move(ROOTPATH . 'public/media/draf-perda/', $fileNamedraf);
        $naskah->move(ROOTPATH . 'public/media/naskah-akademik/', $fileNamenaskah);
        $dokumen->move(ROOTPATH . 'public/media/dokumen/', $fileNamedokumen);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/perda'));
    }
}
