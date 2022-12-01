<?php

namespace App\Controllers;

use App\Models\AnggotaModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class Anggota extends BaseController
{
    protected $anggotaModel;
    public function __construct()
    {
        $this->anggotaModel = new AnggotaModel();
    }
    public function anggota()
    {
        $anggota = $this->anggotaModel->findAll();
        $data = array(
            'title' => 'Data Anggota Bapemperda',
            'data' => $anggota,
            'isi' => 'master/anggota/data',
        );
        return view('layout/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'titlebar' => 'Data Anggota',
            'title' => 'Tambah Anggota',
            'isi' => 'master/anggota/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]',
                'errors' => [
                    'uploaded' => 'Foto harus di upload.',
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file foto.',
                    'max_size' => 'Ukuran foto maksimal 1MB.'
                ]
            ]
        ])) {
            return redirect()->to('/data-anggota/add')->withInput();
        }
        $foto = $this->request->getFile('foto');
        $fileName = $foto->getRandomName();
        $data = [
            'nama'       => $this->request->getPost('nama'),
            'foto'       => $fileName,
        ];
        $this->anggotaModel->save($data);
        $foto->move(ROOTPATH . 'public/media/fotoanggota/', $fileName);
        session()->setFlashdata('m', 'Data Berhasil Ditambahkan ke Database');
        return redirect()->to(base_url('data-anggota'));
    }
    public function delete($id)
    {
        $data = $this->anggotaModel->find($id);
        $gambar = $data['foto'];
        if (file_exists(ROOTPATH . 'public/media/fotoanggota/' . $gambar)) {
            unlink(ROOTPATH . 'public/media/fotoanggota/' . $gambar);
        }
        $this->anggotaModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-anggota'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Anggota',
            'title' => 'Edit Data Anggota',
            'isi' => 'master/anggota/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->anggotaModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'foto' => [
                'rules' => 'mime_in[foto,image/jpg,image/jpeg,image/png]|max_size[foto,1024]',
                'errors' => [
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file foto.',
                    'max_size' => 'Ukuran foto maksimal 1MB.'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/data-anggota/edit/' . $this->request->getPost('id')))->withInput();
        }
        $foto   = $this->request->getFile('foto');
        if ($foto->getError() == 4) {
            $data = $this->anggotaModel->find($id);
            $fileName = $data['foto'];
        } else {
            $fileName = $foto->getRandomName();
            //move foto
            $foto->move(ROOTPATH . 'public/media/fotoanggota/', $fileName);
            $data = $this->anggotaModel->find($id);
            $replace = $data['foto'];
            if (file_exists(ROOTPATH . 'public/media/fotoanggota/' . $replace)) {
                unlink(ROOTPATH . 'public/media/fotoanggota/' . $replace);
            }
        }
        $data = [
            'id'            => $id,
            'nama'          => $this->request->getPost('nama'),
            'foto'          => $fileName,
        ];
        $this->anggotaModel->save($data);
        session()->setFlashdata('m', 'Data berhasil di update');
        return redirect()->to(base_url('data-anggota'));
    }
}
