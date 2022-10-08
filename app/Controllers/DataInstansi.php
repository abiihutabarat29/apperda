<?php

namespace App\Controllers;

use App\Models\InstansiModel;
use CodeIgniter\Config\Config;

class DataInstansi extends BaseController
{
    protected $instansiModel;
    public function __construct()
    {
        $this->instansiModel = new InstansiModel();
    }
    public function data()
    {
        $datainstansi = $this->instansiModel->findAll();
        $data = array(
            'title' => 'Data instansi',
            'data' => $datainstansi,
            'isi' => 'master/instansi/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data instansi',
            'title' => 'Form Tambah Data instansi',
            'isi' => 'master/instansi/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'instansi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Instansi tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to('/data-instansi/add')->withInput();
        }
        $data = [
            'instansi'    => $this->request->getPost('instansi'),
            'userentry'      => session()->get('nama'),
        ];
        $this->instansiModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-instansi'));
    }

    public function delete($id)
    {
        $this->instansiModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-instansi'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data instansi',
            'title' => 'Form Edit Data instansi',
            'isi' => 'master/instansi/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->instansiModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $instansiLama = $this->instansiModel->where(['id' => $id])->first();
        if ($instansiLama['instansi'] == $this->request->getPost('instansi')) {
            $rule_instansi = 'required';
        } else {
            $rule_instansi = 'required|is_unique[mod_instansi.instansi]';
        }
        //Validasi input
        if (!$this->validate([
            'instansi' => [
                'rules' => $rule_instansi,
                'errors' => [
                    'required' => 'Nama Instansi tidak boleh kosong.',
                    'is_unique' => 'Nama instansi sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-instansi/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'             => $id,
            'instansi'    => $this->request->getPost('instansi'),
            'userentry'      => session()->get('nama'),
        ];
        $this->instansiModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-instansi'));
    }
}
