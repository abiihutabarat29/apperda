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
                    'max_size' => 'Ukuran Gambar Jangan Lewat dari 4 MB'
                ]
            ]
        ])) {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->back()->withInput();
        }

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
        $validation = $this->validate([
            'gambar' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,4096]'
        ]);

        if ($validation == FALSE) {
            $this->slideshowModel->update($id, [
                'keterangan'                 => $this->request->getPost('keterangan'),
            ]);
        } else {
            $data = $this->slideshowModel->find($id);
            $replace = $data['gambar'];
            if (file_exists(ROOTPATH . 'public/media/slideshow/' . $replace)) {
                unlink(ROOTPATH . 'public/media/slideshow/' . $replace);
            }

            $gambar   = $this->request->getFile('gambar');
            $fileName = $gambar->getRandomName();
            $this->slideshowModel->update($id, [
                'keterangan'                 => $this->request->getPost('keterangan'),
                'gambar'                     => $fileName,
            ]);
            $gambar->move(ROOTPATH . 'public/media/slideshow', $fileName);
        }
        session()->setFlashdata('m', 'Data Berhasil Di Edit');
        return redirect()->to(base_url('data-slideshow'));
    }
}
