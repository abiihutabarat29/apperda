<?php

namespace App\Controllers;

use App\Models\FraksiModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class DataFraksi extends BaseController
{
    protected $FraksiModel;
    public function __construct()
    {
        $this->fraksiModel = new FraksiModel();
    }
    public function data()
    {
        $datafraksi = $this->fraksiModel->findAll();
        $data = array(
            'title' => 'Data Fraksi',
            'fraksi' => $datafraksi,
            'isi' => 'setting/fraksi/data'
        );

        return view('layout/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'titlebar' => 'Data Fraksi',
            'title' => 'Form Tambah Data Fraksi',
            'isi' => 'setting/fraksi/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }

    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'fraksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Fraksi tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to('/data-fraksi/add')->withInput();
        }
        $data = [
            'fraksi'         => $this->request->getPost('fraksi'),
            'userentry'      => session()->get('nama'),
        ];
        $this->fraksiModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-fraksi'));
    }

    public function delete($id)
    {
        $this->fraksiModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-fraksi'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar'        => 'Data Fraksi',
            'title'           => 'Form Edit Data Fraksi',
            'isi'             => 'setting/fraksi/edit',
            'validation'      => \Config\Services::validation(),
            'fraksi'          => $this->fraksiModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }

    public function update($id)
    {
        // $fraksiLama = $this->fraksiModel->where(['id' => $id])->first();
        // if ($fraksiLama['fraksi'] == $this->request->getPost('fraksi')) {
        //     $rule_fraksi = 'required';
        // } else {
        //     $rule_fraksi = 'required|is_unique[mod_fraksi.fraksi]';
        // }
        //Validasi input
        if (!$this->validate([
            'fraksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama fraksi tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-fraksi/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'             => $id,
            'fraksi'    => $this->request->getPost('fraksi'),
            'userentry'      => session()->get('nama'),
        ];
        $this->fraksiModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-fraksi'));
    }
}
