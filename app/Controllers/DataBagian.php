<?php

namespace App\Controllers;

use App\Models\BagianModel;
use CodeIgniter\Config\Config;

class DataBagian extends BaseController
{
    protected $bagianModel;
    public function __construct()
    {
        $this->bagianModel = new BagianModel();
    }
    public function databagian()
    {
        $databagian = $this->bagianModel->findAll();
        $data = array(
            'title' => 'Data Bagian',
            'data' => $databagian,
            'isi' => 'master/bagian/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Bagian',
            'title' => 'Form Tambah Data Bagian',
            'isi' => 'master/bagian/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'bagian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Bagian tidak boleh kosong.',
                ]
            ],
        ])) {
            return redirect()->to('/data-bagian/add')->withInput();
        }
        $data = [
            'nama_bagian'    => $this->request->getPost('bagian'),
            'userentry'      => session()->get('nama'),
        ];
        $this->bagianModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-bagian'));
    }

    public function delete($id)
    {
        $this->bagianModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-bagian'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Bagian',
            'title' => 'Form Edit Data Bagian',
            'isi' => 'master/bagian/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->bagianModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $bagianLama = $this->bagianModel->where(['id' => $id])->first();
        if ($bagianLama['nama_bagian'] == $this->request->getPost('bagian')) {
            $rule_bagian = 'required';
        } else {
            $rule_bagian = 'required|is_unique[mod_bagian.nama_bagian]';
        }
        //Validasi input
        if (!$this->validate([
            'bagian' => [
                'rules' => $rule_bagian,
                'errors' => [
                    'required' => 'Nama Bagian tidak boleh kosong.',
                    'is_unique' => 'Nama Bagian sudah ada.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('data-bagian/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'             => $id,
            'nama_bagian'    => $this->request->getPost('bagian'),
            'userentry'      => session()->get('nama'),
        ];
        $this->bagianModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-bagian'));
    }
}
