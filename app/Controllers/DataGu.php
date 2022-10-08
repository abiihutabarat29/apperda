<?php

namespace App\Controllers;

use App\Models\GuModel;
use CodeIgniter\Config\Config;

class DataGu extends BaseController
{
    protected $guModel;
    public function __construct()
    {
        $this->guModel = new GuModel();
    }
    public function datagu()
    {
        $datagu = $this->guModel->findAll();
        $data = array(
            'title' => 'Data GU',
            'data' => $datagu,
            'isi' => 'master/gu/data'
        );

        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data GU',
            'title' => 'Form Tambah Data GU',
            'isi' => 'master/gu/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'gu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul GU tidak boleh kosong.',
                ]
            ],
            'mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Mulai harus dipilih.',
                ]
            ],
            'jmulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Mulai harus diisi.',
                ]
            ],
            'selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Selesai harus dipilih.',
                ]
            ],
            'jselesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Selesai harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('/data-gu/add')->withInput();
        }
        $data = [
            'judul'            => $this->request->getPost('gu'),
            'tgl_mulai'        => $this->request->getPost('mulai'),
            'jam_mulai'        => $this->request->getPost('jmulai'),
            'tgl_selesai'      => $this->request->getPost('selesai'),
            'jam_selesai'      => $this->request->getPost('jselesai'),
            'bulan'            => format_bulan(date('Y-m-d')),
            'tahun'            => format_tahun(date('Y-m-d')),
            'userentry'        => session()->get('nama'),
        ];
        $this->guModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-gu'));
    }

    public function delete($id)
    {
        $this->guModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-gu'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data GU',
            'title' => 'Form Edit Data GU',
            'isi' => 'master/gu/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->guModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'gu' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul GU tidak boleh kosong.',
                ]
            ],
            'mulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Mulai harus dipilih.',
                ]
            ],
            'jmulai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Mulai harus diisi.',
                ]
            ],
            'selesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Selesai harus dipilih.',
                ]
            ],
            'jselesai' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jam Selesai harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('data-gu/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'               => $id,
            'judul'            => $this->request->getPost('gu'),
            'tgl_mulai'        => $this->request->getPost('mulai'),
            'jam_mulai'        => $this->request->getPost('jmulai'),
            'tgl_selesai'      => $this->request->getPost('selesai'),
            'jam_selesai'      => $this->request->getPost('jselesai'),
            'bulan'            => format_bulan(date('Y-m-d')),
            'tahun'            => format_tahun(date('Y-m-d')),
            'userentry'        => session()->get('nama'),
        ];
        $this->guModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-gu'));
    }
}
