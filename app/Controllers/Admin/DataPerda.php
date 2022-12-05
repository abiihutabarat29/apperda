<?php

namespace App\Controllers\Admin;

use App\Models\PerdaModel;
use App\Controllers\BaseController;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class DataPerda extends BaseController
{
    protected $perdaModel;
    public function __construct()
    {
        $this->perdaModel = new PerdaModel();
    }
    public function data()
    {
        $id = session()->get('id_instansi');
        $perda = $this->perdaModel->where('id_instansi =', $id)->findAll();
        $data = array(
            'title' => 'Data Perda',
            'data' => $perda,
            'isi' => 'admin/master/perda/data'
        );

        return view('admin/layout/wrapper', $data);
    }
    public function dataperda()
    {
        $perda = $this->perdaModel->where('status =', 0)->orWhere('status =', 1)->orWhere('status =', 2)->findAll();
        $data = array(
            'title' => 'Data Pengajuan Perda',
            'data' => $perda,
            'isi' => 'admin/master/perda/datap'
        );

        return view('admin/layout/wrapper', $data);
    }
    public function dataperdav()
    {
        $perda = $this->perdaModel->where('jenis_perda =', 'Propemperda')->orwhere('jenis_perda =', 'Non-Propemperda')->findAll();
        $data = array(
            'title' => 'Verifikasi Perda',
            'data' => $perda,
            'isi' => 'admin/master/perda/datav'
        );

        return view('admin/layout/wrapper', $data);
    }
    public function dataperdapv()
    {
        $perda = $this->perdaModel->where('status =', 2)->orwhere('status =', 3)->findAll();
        $data = array(
            'title' => 'Perda Terverifikasi',
            'data' => $perda,
            'isi' => 'admin/master/perda/datapv'
        );

        return view('admin/layout/wrapper', $data);
    }
    public function add()
    {
        $data = array(
            'titlebar' => 'Data Perda',
            'title' => 'Tambah Data Perda',
            'isi' => 'admin/master/perda/add',
            'validation' => \Config\Services::validation()
        );
        return view('admin/layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Judul Perda wajib diisi.',
                ]
            ],
            'dasar' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Dasar Hukum tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Dasar Hukum berisi karakter yang tidak didukung.'
                ]
            ],
            'draf' => [
                'rules' => 'uploaded[draf]|mime_in[draf,application/pdf]|max_size[draf,5000]',
                'errors' => [
                    'uploaded' => 'Draf Perda harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 5MB.'
                ]
            ],
            'naskah' => [
                'rules' => 'uploaded[naskah]|mime_in[naskah,application/pdf]|max_size[naskah,5000]',
                'errors' => [
                    'uploaded' => 'Naskah Akademik harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 5MB.'
                ]
            ],
            'dokumen' => [
                'rules' => 'uploaded[dokumen]|mime_in[dokumen,application/pdf]|max_size[dokumen,5000]',
                'errors' => [
                    'uploaded' => 'Dokumen harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 5MB.'
                ]
            ],
        ])) {
            return redirect()->to('/admin/perda/add')->withInput();
        }
        $draf   = $this->request->getFile('draf');
        $naskah   = $this->request->getFile('naskah');
        $dokumen   = $this->request->getFile('dokumen');
        $fileNamedraf = $draf->getRandomName();
        $fileNamenaskah = $naskah->getRandomName();
        $fileNamedokumen = $dokumen->getRandomName();
        $data = [
            'judul_perda'        => $this->request->getPost('judul'),
            'dasar_hukum'        => $this->request->getPost('dasar'),
            'draf_perda'         =>  $fileNamedraf,
            'naskah_akademik'    => $fileNamenaskah,
            'dokumen'            => $fileNamedokumen,
            'status'             => 0,
            'id_instansi'        => session()->get('id_instansi'),
            'instansi'           => session()->get('instansi'),
            'userentry'          => session()->get('nama'),
        ];
        $this->perdaModel->save($data);
        //move file
        $draf->move(ROOTPATH . 'public/media/draf-perda/', $fileNamedraf);
        $naskah->move(ROOTPATH . 'public/media/naskah-akademik/', $fileNamenaskah);
        $dokumen->move(ROOTPATH . 'public/media/dokumen/', $fileNamedokumen);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('admin/perda'));
    }

    public function delete($id)
    {
        // drop file
        $data = $this->perdaModel->where('id =', $id)->first();
        $draf = $data['draf_perda'];
        $naskah = $data['naskah_akademik'];
        $dokumen = $data['dokumen'];
        if (file_exists(ROOTPATH . 'public/media/draf-perda/' . $draf)) {
            unlink(ROOTPATH . 'public/media/draf-perda/' . $draf);
        }
        if (file_exists(ROOTPATH . 'public/media/naskah-akademik/' . $naskah)) {
            unlink(ROOTPATH . 'public/media/naskah-akademik/' . $naskah);
        }
        if (file_exists(ROOTPATH . 'public/media/dokumen/' . $dokumen)) {
            unlink(ROOTPATH . 'public/media/dokumen/' . $dokumen);
        }
        $this->perdaModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('admin/perda'));
    }

    public function edit($id)
    {
        $idi = session()->get('id_instansi');
        $data = array(
            'titlebar' => 'Data Perda',
            'title' => 'Edit Data Perda',
            'isi' => 'admin/master/perda/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->perdaModel->where('id', $id)->where('id_instansi', $idi)->first(),
        );
        return view('admin/layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Judul Perda wajib diisi.',
                    'alpha_space' => 'Judul Perda hanya huruf dan spasi.',
                ]
            ],
            'dasar' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Dasar Hukum tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Dasar Hukum berisi karakter yang tidak didukung.'
                ]
            ],
            'draf' => [
                'rules' => 'mime_in[draf,application/pdf]|max_size[draf,5000]',
                'errors' => [
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 5MB.'
                ]
            ],
            'naskah' => [
                'rules' => 'mime_in[naskah,application/pdf]|max_size[naskah,5000]',
                'errors' => [
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 5MB.'
                ]
            ],
            'dokumen' => [
                'rules' => 'mime_in[naskah,application/pdf]|max_size[naskah,5000]',
                'errors' => [
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 5MB.'
                ]
            ],
        ])) {
            return redirect()->to(base_url('admin/perda/edit/' . $this->request->getPost('id')))->withInput();
        }
        $draf   = $this->request->getFile('draf');
        $naskah   = $this->request->getFile('naskah');
        $dokumen   = $this->request->getFile('dokumen');
        if ($draf->getError() == 4) {
            $r = $this->perdaModel->find($id);
            $fileNamedraf = $r['draf_perda'];
        }
        if ($naskah->getError() == 4) {
            $r = $this->perdaModel->find($id);
            $fileNamenaskah = $r['naskah_akademik'];
        }
        if ($dokumen->getError() == 4) {
            $r = $this->perdaModel->find($id);
            $fileNamedokumen = $r['dokumen'];
        } else {
            $fileNamedraf = $draf->getRandomName();
            $fileNamenaskah = $naskah->getRandomName();
            $fileNamedokumen = $dokumen->getRandomName();
            //move file
            $draf->move(ROOTPATH . 'public/media/draf-perda/', $fileNamedraf);
            $naskah->move(ROOTPATH . 'public/media/naskah-akademik/', $fileNamenaskah);
            $dokumen->move(ROOTPATH . 'public/media/dokumen/', $fileNamedokumen);
            //if file found then replace file
            $f = $this->perdaModel->find($id);
            $replacedraf = $f['draf_perda'];
            $replacenaskah = $f['naskah_akademik'];
            $replacedokumen = $f['dokumen'];
            if (file_exists(ROOTPATH . 'public/media/draf-perda/' . $replacedraf)) {
                unlink(ROOTPATH . 'public/media/draf-perda/' . $replacedraf);
            }
            if (file_exists(ROOTPATH . 'public/media/naskah-akademik/' . $replacenaskah)) {
                unlink(ROOTPATH . 'public/media/naskah-akademik/' . $replacenaskah);
            }
            if (file_exists(ROOTPATH . 'public/media/dokumen/' . $replacedokumen)) {
                unlink(ROOTPATH . 'public/media/dokumen/' . $replacedokumen);
            }
        }
        $data = [
            'id'                 => $id,
            'judul_perda'        => $this->request->getPost('judul'),
            'dasar_hukum'        => $this->request->getPost('dasar'),
            'draf_perda'         => $fileNamedraf,
            'naskah_akademik'    => $fileNamenaskah,
            'dokumen'            => $fileNamedokumen,
        ];
        $this->perdaModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('admin/perda'));
    }
    public function verifikasi($id)
    {
        $perda = $this->perdaModel->where('status', 0)->where('id =', $id)->first();
        $data = array(
            'titlebar' => 'Verifikasi Pengajuan Perda',
            'title' => 'Verifikasi Pengajuan Perda',
            'data' => $perda,
            'isi' => 'admin/master/perda/verifikasi',
            'validation' => \Config\Services::validation(),
        );

        return view('admin/layout/wrapper', $data);
    }
    public function verify($id)
    {
        //Validasi input
        if (!$this->validate([
            'jenis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Jenis Perda.',
                ]
            ],
            'lampiran' => [
                'rules' => 'uploaded[lampiran]|mime_in[lampiran,application/pdf]|max_size[lampiran,1000]',
                'errors' => [
                    'uploaded' => 'Surat harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 1MB.'
                ]
            ]
        ])) {
            return redirect()->to(base_url('admin/pengajuan-perda/verifikasi/' . $this->request->getPost('id')))->withInput();
        }
        $lampiran   = $this->request->getFile('lampiran');
        $fileNameLampiran = $lampiran->getRandomName();
        $data = [
            'id'             => $id,
            'jenis_perda'    => $this->request->getPost('jenis'),
            'surat'          => $fileNameLampiran,
            'status'         => 1,
        ];
        $this->perdaModel->save($data);
        $lampiran->move(ROOTPATH . 'public/media/surat/', $fileNameLampiran);
        session()->setFlashdata('m', 'Data berhasil diverifikasi');
        return redirect()->to(base_url('admin/pengajuan-perda'));
    }
    public function verifikasiv($id)
    {
        $perda = $this->perdaModel->where('id =', $id)->where('status =', 1)->first();
        $data = array(
            'titlebar' => 'Verifikasi Perda',
            'title' => 'Verifikasi Perda',
            'data' => $perda,
            'isi' => 'admin/master/perda/verifikasiv',
            'validation' => \Config\Services::validation(),
        );

        return view('admin/layout/wrapper', $data);
    }
    public function verifikasipv($id)
    {
        $perda = $this->perdaModel->where('status =', 2)->where('id =', $id)->first();
        $data = array(
            'titlebar' => 'Verifikasi Perda',
            'title' => 'Verifikasi Perda',
            'data' => $perda,
            'isi' => 'admin/master/perda/verifikasipv',
            'validation' => \Config\Services::validation(),
        );

        return view('admin/layout/wrapper', $data);
    }
    public function verifyv($id)
    {
        $data = [
            'id'             => $id,
            'status'         => 2,
        ];
        $this->perdaModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diverifikasi');
        return redirect()->to(base_url('admin/verifikasi-perda'));
    }
    public function verifypv($id)
    {
        //Validasi input
        if (!$this->validate([
            'konfirm' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kelayakan.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('admin/perda-terverifikasi/verifikasi/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'             => $id,
            'status'         =>  $this->request->getPost('konfirm'),
        ];
        $this->perdaModel->save($data);
        session()->setFlashdata('m', 'Data berhasil dikonfirmasi');
        return redirect()->to(base_url('admin/perda-terverifikasi'));
    }
    public function review($id)
    {
        $perda = $this->perdaModel->where('id =', $id)->first();
        $data = array(
            'titlebar' => 'Review Perda',
            'title' => 'Review Perda',
            'data' => $perda,
            'isi' => 'admin/master/perda/review',
            'validation' => \Config\Services::validation(),
        );

        return view('admin/layout/wrapper', $data);
    }
    public function reviewp($id)
    {
        $perda = $this->perdaModel->where('id =', $id)->first();
        $data = array(
            'titlebar' => 'Review Pengajuan Perda',
            'title' => 'Review Pengajuan Perda',
            'data' => $perda,
            'isi' => 'admin/master/perda/reviewp',
            'validation' => \Config\Services::validation(),
        );

        return view('admin/layout/wrapper', $data);
    }
}