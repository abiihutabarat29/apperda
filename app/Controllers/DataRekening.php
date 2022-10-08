<?php

namespace App\Controllers;

use App\Models\RekeningModel;
use CodeIgniter\Config\Config;

class DataRekening extends BaseController
{
    protected $rekeningModel;
    public function __construct()
    {
        $this->rekeningModel = new RekeningModel();
    }
    public function datakoderek()
    {
        $datarek = $this->rekeningModel->findAll();
        $data = array(
            'title' => 'Data Rekening Belanja',
            'data' => $datarek,
            'isi' => 'master/kode-rekening/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Rekening Belanja',
            'title' => 'Form Tambah Data Rekening Belanja',
            'isi' => 'master/kode-rekening/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'kode_rek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Rekening tidak boleh kosong.',
                ]
            ],
            'nama_rek' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Rekening tidak boleh kosong.',
                    'alpha_space' => 'Nama Rekening harus huruf dan spasi.'
                ]
            ],
            'kode_rek_simda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Rekening Simda tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->to('/data-kode-rekening/add')->withInput();
        }
        $data = [
            'kode_rek'             => $this->request->getPost('kode_rek'),
            'nama_rek'             => $this->request->getPost('nama_rek'),
            'kode_rek_simda'       => $this->request->getPost('kode_rek_simda'),
            'userentry'            => session()->get('nama'),
        ];
        $this->rekeningModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-kode-rekening'));
    }

    public function delete($id)
    {
        $this->rekeningModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-kode-rekening'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Rekening Belanja',
            'title' => 'Form Edit Data Rekening Belanja',
            'isi' => 'master/kode-rekening/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->rekeningModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'kode_rek' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Rekening tidak boleh kosong.',
                ]
            ],
            'nama_rek' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Rekening tidak boleh kosong.',
                    'alpha_space' => 'Nama Rekening harus huruf dan spasi.'
                ]
            ],
            'kode_rek_simda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Rekening Simda tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('data-kode-rekening/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'             => $id,
            'kode_rek'             => $this->request->getPost('kode_rek'),
            'nama_rek'             => $this->request->getPost('nama_rek'),
            'kode_rek_simda'       => $this->request->getPost('kode_rek_simda'),
            'userentry'            => session()->get('nama'),
        ];
        $this->rekeningModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-kode-rekening'));
    }
    public function import()
    {
        $file   = $this->request->getFile('file_excel');
        $ex = $file->getClientExtension();
        if ($ex == 'xlsx' || $ex == 'xls' || $ex == 'csv') {
            if ($ex == 'xls') {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet = $reader->load($file);
            $data_excel = $spreadsheet->getActiveSheet()->toArray();
            // print_r($data_excel);
            foreach ($data_excel as $key  => $value) {
                if ($key == 0) {
                    continue;
                }
                $data = [
                    'kode_rek'        => $value[1],
                    'nama_rek'        => $value[2],
                    'kode_rek_simda'  => $value[3],
                    'userentry'       => $value[4],
                ];
                $this->rekeningModel->save($data);
            }
            return redirect()->back()->with('m', 'Import data berhasil.');
        } else {
            return redirect()->back()->with('me', 'Ekstensi file import tidak sesuai.');
        }
    }
}
