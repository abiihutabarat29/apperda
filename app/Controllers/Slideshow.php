<?php

namespace App\Controllers;

use App\Models\SLideshowModel;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class Slideshow extends BaseController
{
    protected $SlideshowModel;
    public function __construct()
    {
        $this->slideshowModel = new SlideshowModel();
    }
    public function slideshow()
    {
        $data = array(
            'title'          => 'SLideshow',
            'appname'        => 'SISTEM INFORMASI PERATURAN DAERAH',
            'slideshow'      => $this->slideshowModel->orderBy('id', 'DESC')->findAll(),
            'isi'            => 'setting/slideshow/data',
        );
        return view('layout/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'titlebar' => 'Data SLideshow',
            'title' => 'Tambah Slideshow',
            'isi' => 'setting/slideshow/add',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'keterangan' => [
                'label' => 'keterangan',
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keterangan Harus Diisi ',
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,4098]',
                'errors' => [
                    'uploaded' => 'Lupa ko ngupload Gambarnya kan???',
                    'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
                    'max_size' => 'Ukuran Gambar Maks. 4 MB'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/data-slideshow/add/' . $this->request->getPost('id')))->withInput();
        }
        $gambar   = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $data = $this->slideshowModel->find();
            $fileName = $data['gambar'];
        } else {
            $fileName = $gambar->getRandomName();

            $gambar   = $this->request->getFile('gambar');
            $fileName = $gambar->getRandomName();
            $data = [
                'keterangan'                  => $this->request->getPost('keterangan'),
                'gambar'                      => $fileName,
            ];
            $gambar->move(ROOTPATH . 'public/media/slideshow/', $fileName);

            $this->slideshowModel->save($data);
            session()->setFlashdata('m', 'Data Berhasil Ditambahkan ke Database');
            return redirect()->to(base_url('data-slideshow'));
        }
    }


    public function delete($id)
    {
        $data = $this->slideshowModel->find($id);
        $gambar = $data['gambar'];
        if (file_exists(ROOTPATH . 'public/media/slideshow/' . $gambar)) {
            unlink(ROOTPATH . 'public/media/slideshow/' . $gambar);
        }
        $this->slideshowModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-slideshow'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data SLideshow',
            'title' => 'Edit Data Slideshow',
            'isi' => 'setting/slideshow/edit',
            'validation' => \Config\Services::validation(),
            'slideshow' => $this->slideshowModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.'
                ]
            ],

            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,4098]',
                'errors' => [
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file foto.',
                    'max_size' => 'Ukuran gambar maks. 4 MB.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('/data-slideshow/edit/' . $this->request->getPost('id')))->withInput();
        }
        $gambar   = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $data = $this->slideshowModel->find($id);
            $fileName = $data['gambar'];
        } else {
            $fileName = $gambar->getRandomName();
            //move foto
            $gambar->move(ROOTPATH . 'public/media/slideshow/', $fileName);
            $data = $this->slideshowModel->find($id);
            $replace = $data['gambar'];
            if (file_exists(ROOTPATH . 'public/media/slideshow/' . $replace)) {
                if ($data['gambar'] != 'blank.png') {
                    unlink(ROOTPATH . 'public/media/slideshow/' . $replace);
                }
            }
        }
        $data = [
            'id'                   => $id,
            'keterangan'                  => $this->request->getPost('keterangan'),
            'gambar'                 => $fileName,
        ];
        $this->slideshowModel->save($data);
        session()->setFlashdata('m', 'Data berhasil di update');
        return redirect()->to(base_url('data-slideshow'));
    }
}
