<?php

namespace App\Controllers\Admin;

use App\Models\ProfilModel;
use App\Controllers\BaseController;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class Profil extends BaseController
{
    protected $profilModel;
    public function __construct()
    {
        $this->profilModel = new ProfilModel();
    }
    public function profil()
    {
        $profil = $this->profilModel->first();
        $data = array(
            'title' => 'Profil Aplikasi',
            'data' => $profil,
            'isi' => 'admin/master/profil/data',
        );
        return view('admin/layout/wrapper', $data);
    }

    public function add()
    {
        $data = array(
            'titlebar' => 'Profil Aplikasi',
            'title' => 'Tambah Profil',
            'isi' => 'admin/master/profil/add',
            'validation' => \Config\Services::validation()
        );
        return view('admin/layout/wrapper', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nmapp' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'linkapp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link Aplikasi tidak boleh kosong.',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Deskripsi berisi karakter yang tidak didukung.'
                ]
            ],
            'alamat' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                ]
            ],
            'telp' => [
                'rules' => 'required|max_length[12]|regex_match[^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$]',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong.',
                    'max_length' => 'Nomor Handphone maksimal 12 digit.',
                    'regex_match' => 'Penulisan Nomor Handphone harus benar'
                ]
            ],
            'icon' => [
                'rules' => 'uploaded[icon]|mime_in[icon,image/jpg,image/jpeg,image/png]|max_size[icon,1024]',
                'errors' => [
                    'uploaded' => 'Icon harus di upload.',
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file Icon.',
                    'max_size' => 'Ukuran Icon maksimal 1MB.'
                ]
            ]
        ])) {
            return redirect()->to('/admin/profil/add')->withInput();
        }
        $icon   = $this->request->getFile('icon');
        $fileName = $icon->getRandomName();
        $data = [
            'nama_app'         => $this->request->getPost('nmapp'),
            'link_app'         => $this->request->getPost('linkapp'),
            'deskripsi_app'    => $this->request->getPost('deskripsi'),
            'alamat'           => $this->request->getPost('alamat'),
            'email'            => $this->request->getPost('email'),
            'nohp'             => $this->request->getPost('telp'),
            'icon'             => $fileName,
        ];
        $this->profilModel->save($data);
        $icon->move(ROOTPATH . 'public/media/icon/', $fileName);
        session()->setFlashdata('m', 'Data Berhasil Disimpan');
        return redirect()->to(base_url('admin/profil'));
    }

    public function edit($id)
    {
        $data = array(
            'titlebar' => 'Profil Aplikasi',
            'title' => 'Edit Profil',
            'isi' => 'admin/master/profil/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->profilModel->where('id', $id)->first(),
        );
        return view('admin/layout/wrapper', $data);
    }
    public function update($id)
    {
        if (!$this->validate([
            'nmapp' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'linkapp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Link Aplikasi tidak boleh kosong.',
                ]
            ],
            'deskripsi' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Deskripsi tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Deskripsi berisi karakter yang tidak didukung.'
                ]
            ],
            'alamat' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Alamat tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Alamat berisi karakter yang tidak didukung.'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                ]
            ],
            'telp' => [
                'rules' => 'required|max_length[12]|regex_match[^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$]',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong.',
                    'max_length' => 'Nomor Handphone maksimal 12 digit.',
                    'regex_match' => 'Penulisan Nomor Handphone harus benar'
                ]
            ],
            'icon' => [
                'rules' => 'mime_in[icon,image/jpg,image/jpeg,image/png]|max_size[icon,1024]',
                'errors' => [
                    'mime_in' => 'File extention hanya jpg, jpeg, png.',
                    'is_image' => 'Upload hanya file Icon.',
                    'max_size' => 'Ukuran Icon maksimal 1MB.'
                ]
            ]
        ])) {
            return redirect()->to(base_url('/admin/profil/edit/' . $this->request->getPost('id')))->withInput();
        }
        $icon = $this->request->getFile('icon');
        if ($icon->getError() == 4) {
            $data = $this->profilModel->find($id);
            $fileName = $data['icon'];
        } else {
            $fileName = $icon->getRandomName();
            //move icon
            $icon->move(ROOTPATH . 'public/media/icon/', $fileName);
            $data = $this->profilModel->find($id);
            $replace = $data['icon'];
            if (file_exists(ROOTPATH . 'public/media/icon/' . $replace)) {
                unlink(ROOTPATH . 'public/media/icon/' . $replace);
            }
        }
        $data = [
            'id'               => $id,
            'nama_app'         => $this->request->getPost('nmapp'),
            'link_app'         => $this->request->getPost('linkapp'),
            'deskripsi_app'    => $this->request->getPost('deskripsi'),
            'alamat'           => $this->request->getPost('alamat'),
            'email'            => $this->request->getPost('email'),
            'nohp'             => $this->request->getPost('telp'),
            'icon'             => $fileName,
        ];
        $this->profilModel->save($data);
        session()->setFlashdata('m', 'Data berhasil di update');
        return redirect()->to(base_url('admin/profil'));
    }
}
