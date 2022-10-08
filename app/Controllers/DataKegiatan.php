<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use CodeIgniter\Config\Config;

class DataKegiatan extends BaseController
{
    protected $kegiatanModel;
    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
    }
    public function datakegiatan()
    {
        $datakeg = $this->kegiatanModel->findAll();
        $data = array(
            'title' => 'Data Kegiatan',
            'data' => $datakeg,
            'isi' => 'master/kegiatan/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Kegiatan',
            'title' => 'Form Tambah Data Kegiatan',
            'isi' => 'master/kegiatan/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'kode_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Kegiatan tidak boleh kosong.',
                ]
            ],
            'nama_kegiatan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Kegiatan tidak boleh kosong.',
                    'alpha_space' => 'Nama Kegiatan harus huruf dan spasi.'
                ]
            ]
        ])) {
            return redirect()->to('/data-kegiatan/add')->withInput();
        }
        $data = [
            'kode_kegiatan'       => $this->request->getPost('kode_kegiatan'),
            'nama_kegiatan'       => $this->request->getPost('nama_kegiatan'),
            'userentry'           => session()->get('nama'),
        ];
        $this->kegiatanModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-kegiatan'));
    }

    public function delete($id)
    {
        $this->kegiatanModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-kegiatan'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Kegiatan',
            'title' => 'Form Edit Data Kegiatan',
            'isi' => 'master/kegiatan/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->kegiatanModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'kode_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Kegiatan tidak boleh kosong.',
                ]
            ],
            'nama_kegiatan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Kegiatan tidak boleh kosong.',
                    'alpha_space' => 'Nama Kegiatan harus huruf dan spasi.'
                ]
            ]
        ])) {
            return redirect()->to(base_url('data-kegiatan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'             => $id,
            'kode_kegiatan'       => $this->request->getPost('kode_kegiatan'),
            'nama_kegiatan'       => $this->request->getPost('nama_kegiatan'),
            'userentry'           => session()->get('nama'),
        ];
        $this->kegiatanModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-kegiatan'));
    }
}
