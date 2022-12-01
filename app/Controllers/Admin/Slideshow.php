<?php

namespace App\Controllers\Admin;

use App\Models\SlideshowModel;
use App\Controllers\BaseController;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class Slideshow extends BaseController
{
    protected $slideModel;
    public function __construct()
    {
        $this->slideModel = new SlideshowModel();
    }
    public function slideshow()
    {
        $slideshow = $this->slideModel->findAll();
        $data = array(
            'titlebar' => 'Slideshow',
            'title' => 'Slideshow',
            'data' => $slideshow,
            'isi' => 'admin/master/slideshow/data',
        );
        return view('admin/layout/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'titlebar' => 'Data Slideshow',
            'title' => 'Tambah Data Slideshow',
            'isi' => 'admin/master/slideshow/add',
            'validation' => \Config\Services::validation()
        );
        return view('admin/layout/wrapper', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong.',
                    'alpha_space' => 'Keterangan harus huruf dan spasi.'
                ]
            ],
            'gambar' => [
                'rules' => 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,1024]',
                'errors' => [
                    'uploaded' => 'Gambar harus di upload.',
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file gambar.',
                    'max_size' => 'Ukuran gambar maksimal 1MB.'
                ]
            ]
        ])) {
            return redirect()->to('/admin/slideshow/add')->withInput();
        }
        $gambar = $this->request->getFile('gambar');
        $fileNameSlide = $gambar->getRandomName();
        $data = [
            'keterangan' => $this->request->getPost('keterangan'),
            'gambar'     => $fileNameSlide,
        ];
        $this->slideModel->save($data);
        $gambar->move(ROOTPATH . 'public/media/slideshow/', $fileNameSlide);
        session()->setFlashdata('m', 'Data Berhasil Ditambahkan ke Database');
        return redirect()->to(base_url('admin/slideshow'));
    }
    public function delete($id)
    {
        $data = $this->slideModel->find($id);
        $gambar = $data['gambar'];
        if (file_exists(ROOTPATH . 'public/media/slideshow/' . $gambar)) {
            unlink(ROOTPATH . 'public/media/slideshow/' . $gambar);
        }
        $this->slideModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/slideshow'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Data Slideshow',
            'title' => 'Edit Data Slideshow',
            'isi' => 'admin/master/slideshow/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->slideModel->where('id', $id)->first(),
        );
        return view('admin/layout/wrapper', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'keterangan' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Keterangan tidak boleh kosong.',
                    'alpha_space' => 'Keterangan harus huruf dan spasi.'
                ]
            ],
            'gambar' => [
                'rules' => 'mime_in[gambar,image/jpg,image/jpeg,image/png]|max_size[gambar,1024]',
                'errors' => [
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file gambar.',
                    'max_size' => 'Ukuran gambar maksimal 1MB.'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/admin/slideshow/edit/' . $this->request->getPost('id')))->withInput();
        }
        $gambar   = $this->request->getFile('gambar');
        if ($gambar->getError() == 4) {
            $data = $this->slideModel->find($id);
            $fileName = $data['gambar'];
        } else {
            $fileName = $gambar->getRandomName();
            //move foto
            $gambar->move(ROOTPATH . 'public/media/slideshow/', $fileName);
            $data = $this->slideModel->find($id);
            $replace = $data['gambar'];
            if (file_exists(ROOTPATH . 'public/media/slideshow/' . $replace)) {
                unlink(ROOTPATH . 'public/media/slideshow/' . $replace);
            }
        }
        $data = [
            'id'            => $id,
            'keterangan'    => $this->request->getPost('keterangan'),
            'gambar'        => $fileName,
        ];
        $this->slideModel->save($data);
        session()->setFlashdata('m', 'Data berhasil di update');
        return redirect()->to(base_url('admin/slideshow'));
    }
}
