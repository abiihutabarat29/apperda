<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use App\Models\FraksiModel;
use CodeIgniter\Config\Config;

class Anggota extends BaseController
{
    protected $anggotaModel;
    protected $fraksiModel;
    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
        $this->fraksiModel = new FraksiModel();
    }

    public function anggota()
    {
        $data = array(
            'title'          => 'Anggota',
            'appname'        => 'SISTEM INFORMASI PERATURAN DAERAH',
            'anggota'        =>  $this->anggotaModel->orderBy('id', 'DESC')->findAll(),
            'isi'            => 'setting/anggota/data',
        );
        return view('layout/wrapper', $data);
    }

    public function add()
    {
        $fraksi = $this->fraksiModel->findAll();
        $data = array(
            'titlebar'           => 'Data Anggota',
            'title'              => 'Tambah Anggota',
            'isi'                => 'setting/anggota/add',
            'fraksi'             =>  $fraksi,
            'validation'         => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }

    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'idfraksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Fraksi.',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jabatan tidak boleh kosong.',
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,4098]',
                'errors' => [
                    'uploaded' => 'Lupa ko ngupload Gambarnya kan???',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran Gambar Maks. 4 MB'
                ]
            ]
        ])) {
            return redirect()->to('add')->withInput();
        }

        $foto   = $this->request->getFile('foto');
        if ($foto->getError() == 4) {
            $data = $this->anggotaModel->find();
            $fileName = $data['foto'];
        } else {
            $fileName = $foto->getRandomName();

            $foto   = $this->request->getFile('foto');
            $fileName = $foto->getRandomName();
            $data = [
                'id_fraksi'            => $this->request->getPost('idfraksi'),
                'fraksi'               => $this->request->getPost('fraksi'),
                'nama'                 => $this->request->getPost('nama'),
                'jabatan'              => $this->request->getPost('jabatan'),
                'foto'                 => $fileName,
            ];
            $foto->move(ROOTPATH . 'public/media/fotoanggota/', $fileName);

            $this->anggotaModel->save($data);
            session()->setFlashdata('m', 'Data berhasil disimpan');
            return redirect()->to(base_url('data-anggota'));
        }
    }
    public function delete($id)
    {
        $data = $this->anggotaModel->find($id);
        $foto = $data['foto'];
        if (file_exists(ROOTPATH . 'public/media/fotoanggota/' . $foto)) {
            unlink(ROOTPATH . 'public/media/fotoanggota/' . $foto);
        }
        $this->anggotaModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-anggota'));
    }

    public function edit($id)
    {
        $fraksi = $this->fraksiModel->findAll();
        $data = array(
            'titlebar' => 'Data User',
            'title' => 'Form Edit User',
            'isi' => 'setting/anggota/edit',
            'validation' => \Config\Services::validation(),
            'fraksi' => $fraksi,
            'data' => $this->fraksiModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
}
