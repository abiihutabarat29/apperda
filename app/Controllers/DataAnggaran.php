<?php

namespace App\Controllers;

use App\Models\AnggaranModel;
use App\Models\BagianModel;
use CodeIgniter\Config\Config;

class DataAnggaran extends BaseController
{
    protected $anggaranModel;
    protected $bagianModel;
    public function __construct()
    {
        $this->anggaranModel = new AnggaranModel();
        $this->bagianModel = new BagianModel();
    }
    public function dataanggaran()
    {
        $dataanggaran = $this->anggaranModel->findAll();
        $data = array(
            'title' => 'Data Anggaran',
            'data' => $dataanggaran,
            'isi' => 'master/anggaran/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $bagian = $this->bagianModel->findAll();
        $data = array(
            'titlebar' => 'Data Anggaran',
            'title' => 'Form Tambah Data Anggaran',
            'isi' => 'master/anggaran/add',
            'bagian' => $bagian,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'idbagian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Bagian.',
                ]
            ],
            'bagian' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Bagian tidak boleh kosong.',
                    'alpha_space' => 'Nama Bagian harus huruf dan spasi.'
                ]
            ],
            'anggaran' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Anggaran tidak boleh kosong.',
                    'numeric' => 'Jumlah Anggaran harus angka.',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih tahun.',
                ]
            ]
        ])) {
            return redirect()->to('/data-anggaran/add')->withInput();
        }
        $data = [
            'id_bagian'           => $this->request->getPost('idbagian'),
            'nama_bagian'         => $this->request->getPost('bagian'),
            'jumlah_anggaran'     => $this->request->getPost('anggaran'),
            'sisa_anggaran'       => $this->request->getPost('anggaran'),
            'thn_anggaran'        => $this->request->getPost('tahun'),
            'userentry'           => session()->get('nama'),
        ];
        $this->anggaranModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-anggaran'));
    }

    public function delete($id)
    {
        $this->anggaranModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-anggaran'));
    }

    public function edit($id)
    {
        $bagian = $this->bagianModel->findAll();
        $data = array(
            'titlebar' => 'Data Anggaran',
            'title' => 'Form Edit Data Anggaran',
            'bagian' => $bagian,
            'isi' => 'master/anggaran/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->anggaranModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'idbagian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Bagian.',
                ]
            ],
            'bagian' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Bagian tidak boleh kosong.',
                    'alpha_space' => 'Nama Bagian harus huruf dan spasi.'
                ]
            ],
            'anggaran' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Jumlah Anggaran tidak boleh kosong.',
                    'numeric' => 'Jumlah Anggaran harus angka.',
                ]
            ],
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih tahun.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('data-anggaran/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                  => $id,
            'id_bagian'           => $this->request->getPost('idbagian'),
            'nama_bagian'         => $this->request->getPost('bagian'),
            'jumlah_anggaran'     => $this->request->getPost('anggaran'),
            'sisa_anggaran'       => $this->request->getPost('anggaran'),
            'thn_anggaran'        => $this->request->getPost('tahun'),
            'userentry'           => session()->get('nama'),
        ];
        $this->anggaranModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-anggaran'));
    }
}
