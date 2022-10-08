<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BagianModel;
use CodeIgniter\Config\Config;

class User extends BaseController
{
    protected $userModel;
    protected $bagianModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->bagianModel = new BagianModel();
    }
    public function user()
    {
        // jika tidak ingin menampilkan data superadmin
        $datauser = $this->userModel->where('level !=', 1)->findAll();
        $data = array(
            'title' => 'Daftar User',
            'data' => $datauser,
            'isi' => 'master/user/data'
        );
        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $bagian = $this->bagianModel->findAll();
        $data = array(
            'titlebar' => 'Data User',
            'title' => 'Form Tambah Data User',
            'isi' => 'master/user/add',
            'bagian' => $bagian,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'idbagian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Bagian.',
                ]
            ],
            'nik' => [
                'rules' => 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_user.nik]',
                'errors' => [
                    'required' => 'NIK tidak boleh kosong.',
                    'numeric' => 'NIK harus angka.',
                    'max_length' => 'NIK maximal 16 digit.',
                    'min_length' => 'NIK minimal 16 digit.',
                    'is_unique' => 'NIK sudah terdaftar.'
                ]
            ],
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'nohp' => [
                'rules' => 'required|max_length[12]|min_length[11]|regex_match[^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$]',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong.',
                    'max_length' => 'Nomor Handphone maximal 12 digit.',
                    'min_length' => 'Nomor Handphone manimal 11 digit.',
                    'regex_match' => 'Penulisan Nomor Handphone harus benar'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[mod_user.email]',
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar.',
                ]
            ],
            'username' => [
                'rules' => 'required|max_length[25]|min_length[8]|is_unique[mod_user.username]',
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',
                    'is_unique' => 'Username sudah terdaftar.',
                    'max_length' => 'Username maximal 25 digit.',
                    'min_length' => 'Username minimal 8 digit.',

                ]
            ],
            'password' => [
                'rules' => 'required|max_length[8]|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                ]
            ],
            'repassword' => [
                'rules' => 'required|max_length[8]|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                    'matches' => 'Password harus sama.'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->to('add')->withInput();
        }
        $md5 = md5($this->request->getPost('password'));
        $password = password_hash($md5, PASSWORD_DEFAULT);
        $data = [
            'id_bagian'           => $this->request->getPost('idbagian'),
            'nama_bagian'         => $this->request->getPost('bagian'),
            'nik'                  => $this->request->getPost('nik'),
            'nama'                 => $this->request->getPost('nama'),
            'nohp'                 => $this->request->getPost('nohp'),
            'email'                => $this->request->getPost('email'),
            'username'             => $this->request->getPost('username'),
            'foto'                 => 'blank.png',
            'password'             => $password,
            'level'                => $this->request->getPost('level'),
            'status'               => '1',
        ];
        $this->userModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('data-user'));
    }
    public function delete($id)
    {
        $this->userModel->delete->find($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('data-user'));
    }
    public function edit($id)
    {
        $bagian = $this->bagianModel->findAll();
        $data = array(
            'titlebar' => 'Data User',
            'title' => 'Form Edit User',
            'isi' => 'master/user/edit',
            'validation' => \Config\Services::validation(),
            'bagian' => $bagian,
            'data' => $this->userModel->where('id', $id)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        $nikLama = $this->userModel->where(['id' => $id])->first();
        if ($nikLama['nik'] == $this->request->getPost('nik')) {
            $rule_nik = 'required|numeric|max_length[16]|min_length[16]';
        } else {
            $rule_nik = 'required|numeric|max_length[16]|min_length[16]|is_unique[mod_user.nik]';
        }
        $emailLama = $this->userModel->where(['id' => $id])->first();
        if ($emailLama['email'] == $this->request->getPost('email')) {
            $rule_email = 'required|valid_email';
        } else {
            $rule_email = 'required|valid_email|is_unique[mod_user.email]';
        }
        $usernameLama = $this->userModel->where(['id' => $id])->first();
        if ($usernameLama['username'] == $this->request->getPost('username')) {
            $rule_username = 'required|max_length[25]|min_length[8]';
        } else {
            $rule_username = 'required|max_length[25]|min_length[8]|is_unique[mod_user.username]';
        }
        //Validasi input
        if (!$this->validate([
            'idbagian' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Bagian.',
                ]
            ],
            'nik' => [
                'rules' => $rule_nik,
                'errors' => [
                    'required' => 'NIK tidak boleh kosong.',
                    'numeric' => 'NIK harus angka.',
                    'max_length' => 'NIK maximal 16 digit.',
                    'min_length' => 'NIK minimal 16 digit.',
                    'is_unique' => 'NIK sudah terdaftar.'
                ]
            ],
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong.',
                    'alpha_space' => 'Nama harus huruf dan spasi.'
                ]
            ],
            'nohp' => [
                'rules' => 'required|max_length[12]|min_length[11]|regex_match[^(\+62|62)?[\s-]?0?8[1-9]{1}\d{1}[\s-]?\d{4}[\s-]?\d{2,5}$]',
                'errors' => [
                    'required' => 'Nomor Handphone tidak boleh kosong.',
                    'max_length' => 'Nomor Handphone maximal 12 digit.',
                    'min_length' => 'Nomor Handphone manimal 11 digit.',
                    'regex_match' => 'Penulisan Nomor Handphone harus benar'
                ]
            ],
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Email tidak boleh kosong.',
                    'valid_email' => 'Email tidak valid.',
                    'is_unique' => 'Email sudah terdaftar.',
                ]
            ],
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Username tidak boleh kosong.',
                    'is_unique' => 'Username sudah terdaftar.',
                    'max_length' => 'Username maximal 25 digit.',
                    'min_length' => 'Username minimal 8 digit.',

                ]
            ],
            'password' => [
                'rules' => 'required|max_length[8]|min_length[6]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                ]
            ],
            'repassword' => [
                'rules' => 'required|max_length[8]|min_length[6]|matches[password]',
                'errors' => [
                    'required' => 'Password tidak boleh kosong.',
                    'max_length' => 'Password maximal 8 digit.',
                    'min_length' => 'Password minimal 6 digit.',
                    'matches' => 'Password harus sama.'
                ]
            ],
            'level' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Level tidak boleh kosong.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('data-user/edit/' . $this->request->getPost('id')))->withInput();
        }
        $md5 = md5($this->request->getPost('password'));
        $password = password_hash($md5, PASSWORD_DEFAULT);
        $data = [
            'id'                   => $id,
            'id_bagian'            => $this->request->getPost('idbagian'),
            'nama_bagian'          => $this->request->getPost('bagian'),
            'nik'                  => $this->request->getPost('nik'),
            'nama'                 => $this->request->getPost('nama'),
            'nohp'                 => $this->request->getPost('nohp'),
            'email'                => $this->request->getPost('email'),
            'username'             => $this->request->getPost('username'),
            'password'             => $password,
            'level'                => $this->request->getPost('level'),
        ];
        $this->userModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('data-user'));
    }
}
