<?php

namespace App\Controllers;

use App\Models\SubKegiatanModel;
use App\Models\BagianModel;
use App\Models\KegiatanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Config\Config;

class DataSubKegiatan extends BaseController
{
    protected $subkegiatanModel;
    protected $bagianModel;
    protected $kegiatanModel;
    public function __construct()
    {
        $this->subkegiatanModel = new SubKegiatanModel();
        $this->bagianModel = new BagianModel();
        $this->kegiatanModel = new KegiatanModel();
    }
    public function datasubkeg()
    {
        $datasub = $this->subkegiatanModel->findAll();
        $data = array(
            'title' => 'Data Sub Kegiatan',
            'data' => $datasub,
            'isi' => 'master/sub-kegiatan/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $kegiatan = $this->kegiatanModel->findAll();
        $bagian = $this->bagianModel->findAll();
        $data = array(
            'titlebar' => 'Data Sub Kegiatan',
            'title' => 'Form Tambah Data Sub Kegiatan',
            'isi' => 'master/sub-kegiatan/add',
            'bagian' => $bagian,
            'kegiatan' => $kegiatan,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'id_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kegiatan.',
                ]
            ],
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
            'kode_sub' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Sub Kegiatan tidak boleh kosong.',
                ]
            ],
            'nama_sub' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Sub Kegiatan tidak boleh kosong.',
                    'alpha_space' => 'Nama Sub Kegiatan harus huruf dan spasi.'
                ]
            ]
        ])) {
            return redirect()->to('/data-sub-kegiatan/add')->withInput();
        }
        $data = [
            'id_kegiatan'        => $this->request->getPost('id_kegiatan'),
            'id_bagian'          => $this->request->getPost('idbagian'),
            'kode_kegiatan'      => $this->request->getPost('kode_kegiatan'),
            'nama_kegiatan'      => $this->request->getPost('nama_kegiatan'),
            'bagian'             => $this->request->getPost('bagian'),
            'kode_sub'           => $this->request->getPost('kode_sub'),
            'nama_sub'           => $this->request->getPost('nama_sub'),
            'userentry'          => session()->get('nama'),
        ];
        $this->subkegiatanModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-sub-kegiatan'));
    }

    public function delete($id)
    {
        $this->subkegiatanModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-sub-kegiatan'));
    }

    public function edit($id)
    {
        $kegiatan = $this->kegiatanModel->findAll();
        $bagian = $this->bagianModel->findAll();
        $data = array(
            'titlebar' => 'Data Sub Kegiatan',
            'title' => 'Form Edit Data Sub Kegiatan',
            'bagian' => $bagian,
            'kegiatan' => $kegiatan,
            'isi' => 'master/sub-kegiatan/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->subkegiatanModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'id_kegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kegiatan.',
                ]
            ],
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
            'kode_sub' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kode Sub Kegiatan tidak boleh kosong.',
                ]
            ],
            'nama_sub' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Sub Kegiatan tidak boleh kosong.',
                    'alpha_space' => 'Nama Sub Kegiatan harus huruf dan spasi.'
                ]
            ]
        ])) {
            return redirect()->to(base_url('data-sub-kegiatan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                 => $id,
            'id_kegiatan'        => $this->request->getPost('id_kegiatan'),
            'id_bagian'          => $this->request->getPost('idbagian'),
            'kode_kegiatan'      => $this->request->getPost('kode_kegiatan'),
            'nama_kegiatan'      => $this->request->getPost('nama_kegiatan'),
            'bagian'             => $this->request->getPost('bagian'),
            'kode_sub'           => $this->request->getPost('kode_sub'),
            'nama_sub'           => $this->request->getPost('nama_sub'),
            'userentry'          => session()->get('nama'),
        ];
        $this->subkegiatanModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-sub-kegiatan'));
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
                    'kode_sub'    => $value[1],
                    'nama_sub'    => $value[2],
                    'bagian'      => $value[3],
                    'userentry'   => $value[4],
                ];
                $this->subkegiatanModel->save($data);
            }
            return redirect()->back()->with('m', 'Import data berhasil.');
        } else {
            return redirect()->back()->with('me', 'Ekstensi file import tidak sesuai.');
        }
    }
}
