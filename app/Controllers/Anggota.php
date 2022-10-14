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
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'jabatan tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to('add')->withInput();
        }
        $data = [
            'id_fraksi'            => $this->request->getPost('idfraksi'),
            'fraksi'               => $this->request->getPost('fraksi'),
            'nama'                 => $this->request->getPost('nama'),
            'jabatan'              => $this->request->getPost('jabatan'),
            'foto'                 => 'blank.png',
            'status'               => '1',
        ];
        $this->anggotaModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-anggota'));
    }
    public function delete($id)
    {
        $this->anggotaModel->delete->find($id);
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
