<?php

namespace App\Controllers;

use App\Models\SpjKegiatanModel;
use App\Models\SpjKegiatanSubModel;
use App\Models\BagianModel;
use App\Models\KegiatanModel;
use App\Models\SubKegiatanModel;
use App\Models\RekeningModel;
use App\Models\FileKegiatanModel;
use App\Models\AnggaranModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class DataSpjKegiatan extends BaseController
{
    protected $spjkegModel;
    protected $spjsubkegModel;
    protected $kegiatanModel;
    protected $subkegiatanModel;
    protected $bagianModel;
    protected $rekModel;
    protected $filekegiatanModel;
    protected $anggaranModel;
    public function __construct()
    {
        $this->spjkegModel = new SpjKegiatanModel();
        $this->spjsubkegModel = new SpjKegiatanSubModel();
        $this->kegiatanModel = new KegiatanModel();
        $this->subkegiatanModel = new SubKegiatanModel();
        $this->bagianModel = new BagianModel();
        $this->rekModel = new RekeningModel();
        $this->filekegiatanModel = new FileKegiatanModel();
        $this->anggaranModel = new AnggaranModel();
    }
    public function dataspjkeg()
    {
        $id = session()->get('id_bagian');
        $datakeg = $this->spjkegModel->where('id_bagian =', $id)->findAll();
        $data = array(
            'title' => 'Data SPJ Kegiatan',
            'data' => $datakeg,
            'isi' => 'master/spjkegiatan/data'
        );
        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $kegiatan = $this->kegiatanModel->findAll();
        $bagian = $this->bagianModel->findAll();
        $rek = $this->rekModel->findAll();
        $data = array(
            'titlebar' => 'Data SPJ Kegiatan',
            'title' => 'Form Tambah Data SPJ Kegiatan',
            'isi' => 'master/spjkegiatan/add',
            'bagian' => $bagian,
            'kegiatan' => $kegiatan,
            'rekening' => $rek,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function save()
    {
        //Validasi input
        if (!$this->validate([
            'idkegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kegiatan.',
                ]
            ],
            'idrekening' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kode Rekening.',
                ]
            ],
            'uraian' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Uraian Kegiatan tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Uraian Kegiatan berisi karakter yang tidak didukung.'
                ]
            ],
            'nilai' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nilai Kwitansi tidak boleh kosong.',
                    'numaric' => 'Nilai Kwitansi harus angka.'
                ]
            ],
            'nmpenerima' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Penerima tidak boleh kosong.',
                    'alpha_sapce' => 'Nama Penerima harus huruf dan spasi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Alamat Penerima tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Alamat Penerima berisi karakter yang tidak didukung.'
                ]
            ]
        ])) {
            return redirect()->to('/kegiatan/add')->withInput();
        }
        $idb = session()->get('id_bagian');
        $nilai = $this->request->getPost('nilai');
        $anggaran = $this->anggaranModel->where('id_bagian =', $idb)->first();
        $sisa = $anggaran['sisa_anggaran'];
        if ($nilai > $anggaran['sisa_anggaran']) {
            session()->setFlashdata('me', 'Maaf Pagu tidak mencukupi, sisa pagu hanya' . "\n" . rupiah($sisa));
            return redirect()->to(base_url('kegiatan'));
        }
        $data = [
            'id_kegiatan'        => $this->request->getPost('idkegiatan'),
            'id_rek'             => $this->request->getPost('idrekening'),
            'kode_kegiatan'      => $this->request->getPost('kodekeg'),
            'nama_kegiatan'      => $this->request->getPost('namakeg'),
            'kode_rek'           => $this->request->getPost('koderekening'),
            'nama_rek'           => $this->request->getPost('namarek'),
            'kode_rek_simda'     => $this->request->getPost('reksimda'),
            'uraian'             => $this->request->getPost('uraian'),
            'nilai_kwitansi'     => $this->request->getPost('nilai'),
            'nama_penerima'      => $this->request->getPost('nmpenerima'),
            'alamat_penerima'    => $this->request->getPost('alamat'),
            'uraian'             => $this->request->getPost('uraian'),
            'status'             => 0,
            'id_bagian'          => session()->get('id_bagian'),
            'bagian'             => session()->get('nama_bagian'),
            'userentry'          => session()->get('nama'),
        ];
        $this->spjkegModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('kegiatan'));
    }

    public function delete($id)
    {
        $data = $this->filekegiatanModel->where('id_kegiatan =', $id)->first();
        $kwitansi = $data['kwitansi'];
        $berita_acara = $data['berita_acara'];
        $pesanan_brg = $data['pesanan_brg'];
        $bon_faktur = $data['bon_faktur'];
        if (file_exists(ROOTPATH . 'public/media/kwitansi/' . $kwitansi)) {
            unlink(ROOTPATH . 'public/media/kwitansi/' . $kwitansi);
        }
        if (file_exists(ROOTPATH . 'public/media/berita-acara/' . $berita_acara)) {
            unlink(ROOTPATH . 'public/media/berita-acara/' . $berita_acara);
        }
        if (file_exists(ROOTPATH . 'public/media/pesanan-barang/' . $pesanan_brg)) {
            unlink(ROOTPATH . 'public/media/pesanan-barang/' . $pesanan_brg);
        }
        if (file_exists(ROOTPATH . 'public/media/bon-faktur/' . $bon_faktur)) {
            unlink(ROOTPATH . 'public/media/bon-faktur/' . $bon_faktur);
        }
        $this->spjkegModel->delete($id);
        $this->spjsubkegModel->where('id_kegiatan', $id)->delete();
        $this->filekegiatanModel->where('id_kegiatan', $id)->delete();
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('kegiatan'));
    }

    public function edit($id)
    {
        $idb = session()->get('id_bagian');
        $kegiatan = $this->kegiatanModel->findAll();
        $bagian = $this->bagianModel->findAll();
        $rek = $this->rekModel->findAll();
        $data = array(
            'titlebar' => 'Data SPJ Kegiatan',
            'title' => 'Form Edit Data SPJ Kegiatan',
            'bagian' => $bagian,
            'kegiatan' => $kegiatan,
            'rekening' => $rek,
            'isi' => 'master/spjkegiatan/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->spjkegModel->where('id', $id)->where('id_bagian', $idb)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function update($id)
    {
        //Validasi input
        if (!$this->validate([
            'idkegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kegiatan.',
                ]
            ],
            'idkegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Kode Rekening.',
                ]
            ],
            'uraian' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Uraian Kegiatan tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Uraian Kegiatan berisi karakter yang tidak didukung.'
                ]
            ],
            'nilai' => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Nilai Kwitansi tidak boleh kosong.',
                    'numaric' => 'Nilai Kwitansi harus angka.'
                ]
            ],
            'nmpenerima' => [
                'rules' => 'required|alpha_space',
                'errors' => [
                    'required' => 'Nama Penerima tidak boleh kosong.',
                    'alpha_sapce' => 'Nama Penerima harus huruf dan spasi.'
                ]
            ],
            'alamat' => [
                'rules' => 'required|alpha_numeric_punct',
                'errors' => [
                    'required' => 'Alamat Penerima tidak boleh kosong.',
                    'alpha_numeric_punct' => 'Alamat Penerima berisi karakter yang tidak didukung.'
                ]
            ]
        ])) {
            return redirect()->to(base_url('kegiatan/edit/' . $this->request->getPost('id')))->withInput();
        }
        $idb = session()->get('id_bagian');
        $nilai = $this->request->getPost('nilai');
        $anggaran = $this->anggaranModel->where('id_bagian =', $idb)->first();
        $sisa = $anggaran['sisa_anggaran'];
        if ($nilai > $anggaran['sisa_anggaran']) {
            session()->setFlashdata('me', 'Maaf Pagu tidak mencukupi, sisa pagu hanya' . "\n" . rupiah($sisa));
            return redirect()->to(base_url('kegiatan'));
        }
        $data = [
            'id'                 => $id,
            'id_kegiatan'        => $this->request->getPost('idkegiatan'),
            'id_rek'             => $this->request->getPost('idrekening'),
            'kode_kegiatan'      => $this->request->getPost('kodekeg'),
            'nama_kegiatan'      => $this->request->getPost('namakeg'),
            'kode_rek'           => $this->request->getPost('koderekening'),
            'nama_rek'           => $this->request->getPost('namarek'),
            'kode_rek_simda'     => $this->request->getPost('reksimda'),
            'uraian'             => $this->request->getPost('uraian'),
            'nilai_kwitansi'     => $this->request->getPost('nilai'),
            'nama_penerima'      => $this->request->getPost('nmpenerima'),
            'alamat_penerima'    => $this->request->getPost('alamat'),
            'uraian'             => $this->request->getPost('uraian'),
        ];
        $this->spjkegModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('kegiatan'));
    }
    public function datasub($id)
    {
        $title = $this->spjkegModel->where('id =', $id)->first();
        $idb = session()->get('id_bagian');
        $datasub = $this->spjsubkegModel->where('id_bagian =', $idb)->where('id_kegiatan =', $id)->findAll();
        // dd($datasub);
        $data = array(
            'title' => 'Data Sub Kegiatan',
            'data' => $datasub,
            'kegiatan' => $title,
            'isi' => 'master/spjkegiatan/datasub'
        );
        return view('layout/wrapper', $data);
    }
    public function addsub($id)
    {
        $idb = session()->get('id_bagian');
        $title = $this->spjkegModel->where('id =', $id)->first();
        $subkegiatan = $this->subkegiatanModel->where('id_bagian =', $idb)->findAll();
        $data = array(
            'titlebar' => 'Data Sub Kegiatan',
            'title' => 'Form Tambah Data Sub Kegiatan',
            'isi' => 'master/spjkegiatan/addsub',
            'subkegiatan' => $subkegiatan,
            'kegiatan' => $title,
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function savesub($id)
    {
        //Validasi input
        if (!$this->validate([
            'idsub' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Sub Kegiatan.',
                ]
            ]
        ])) {
            return redirect()->to('/kegiatan/add-sub-kegiatan/' . $id)->withInput();
        }
        $data = [
            'id_kegiatan'        => $this->request->getPost('idkegiatan'),
            'id_subkegiatan'     => $this->request->getPost('idsub'),
            'kode_sub'           => $this->request->getPost('kodesubkeg'),
            'nama_sub'           => $this->request->getPost('namasubkeg'),
            'id_bagian'          => session()->get('id_bagian'),
            'bagian'             => session()->get('nama_bagian'),
            'userentry'          => session()->get('nama'),
        ];
        $timeline = [
            'id'                => $this->request->getPost('idkegiatan'),
            'status'            => 1,
        ];
        $this->spjkegModel->save($timeline);
        $this->spjsubkegModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('kegiatan/sub-kegiatan/' . $id));
    }
    public function editsub($id)
    {
        $idb = session()->get('id_bagian');
        $subkegiatan = $this->subkegiatanModel->where('id_bagian =', $idb)->findAll();
        $data = array(
            'titlebar' => 'Data Sub Kegiatan',
            'title' => 'Form Edit Data Sub Kegiatan',
            'subkegiatan' => $subkegiatan,
            'isi' => 'master/spjkegiatan/editsub',
            'validation' => \Config\Services::validation(),
            'data' => $this->spjsubkegModel->where('id', $id)->where('id_bagian', $idb)->first(),
        );
        return view('layout/wrapper', $data);
    }
    public function updatesub($id)
    {
        //Validasi input
        if (!$this->validate([
            'idsub' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih Sub Kegiatan.',
                ]
            ]
        ])) {
            return redirect()->to(base_url('kegiatan/edit-sub-kegiatan/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                 => $id,
            'id_kegiatan'        => $this->request->getPost('idkegiatan'),
            'id_subkegiatan'     => $this->request->getPost('idsub'),
            'kode_sub'           => $this->request->getPost('kodesubkeg'),
            'nama_sub'           => $this->request->getPost('namasubkeg'),
        ];
        $this->spjsubkegModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('kegiatan/sub-kegiatan/' . $this->request->getPost('idkegiatan')));
    }
    public function deletesub($id)
    {
        $this->spjsubkegModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('kegiatan/sub-kegiatan/' . $this->request->getPost('idkegiatan')));
    }
    public function datafile($id)
    {
        $title = $this->spjkegModel->where('id =', $id)->first();
        $idb = session()->get('id_bagian');
        $datasub = $this->spjkegModel->join('mod_file_kegiatan', 'mod_file_kegiatan.id_kegiatan = mod_spj_kegiatan.id', 'left')->where('mod_file_kegiatan.id_bagian =', $idb)->where('mod_file_kegiatan.id_kegiatan =', $id)->findAll();
        $data = array(
            'title' => 'Data File SPJ Kegiatan',
            'data' => $datasub,
            'kegiatan' => $title,
            'isi' => 'master/spjkegiatan/datafile'
        );
        return view('layout/wrapper', $data);
    }
    public function addfile($id)
    {
        $title = $this->spjkegModel->where('id =', $id)->first();
        $data = array(
            'titlebar' => 'Data File kegiatan',
            'title' => 'Form Tambah Data File kegiatan',
            'kegiatan' => $title,
            'isi' => 'master/spjkegiatan/addfile',
            'validation' => \Config\Services::validation()
        );
        return view('layout/wrapper', $data);
    }
    public function savefile($id)
    {
        //Validasi input
        if (!$this->validate([
            'kwitansi' => [
                'rules' => 'uploaded[kwitansi]|mime_in[kwitansi,application/pdf]|max_size[kwitansi,200]',
                'errors' => [
                    'uploaded' => 'Kwitansi harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 200kb.'
                ]
            ],
            'berita_acara' => [
                'rules' => 'uploaded[berita_acara]|mime_in[berita_acara,application/pdf]|max_size[berita_acara,200]',
                'errors' => [
                    'uploaded' => 'Berita Acara harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 200kb.'
                ]
            ],
            'pesanan_brg' => [
                'rules' => 'uploaded[pesanan_brg]|mime_in[pesanan_brg,application/pdf]|max_size[pesanan_brg,200]',
                'errors' => [
                    'uploaded' => 'Pesanan Barang Tugas harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 200kb.'
                ]
            ],
            'bon_faktur' => [
                'rules' => 'uploaded[bon_faktur]|mime_in[bon_faktur,application/pdf]|max_size[bon_faktur,200]',
                'errors' => [
                    'uploaded' => 'Bon Faktur harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 200kb.'
                ]
            ]
        ])) {
            return redirect()->to('/kegiatan/add-file/' . $id)->withInput();
        }
        $kwitansi   = $this->request->getFile('kwitansi');
        $berita_acara   = $this->request->getFile('berita_acara');
        $pesanan_brg   = $this->request->getFile('pesanan_brg');
        $bon_faktur   = $this->request->getFile('bon_faktur');
        $fileNamekwitansi = $kwitansi->getRandomName();
        $fileNamebacara = $berita_acara->getRandomName();
        $fileNamepesanan = $pesanan_brg->getRandomName();
        $fileNamebon = $bon_faktur->getRandomName();
        $data = [
            'id_kegiatan'     => $this->request->getPost('idkegiatan'),
            'kwitansi'        => $fileNamekwitansi,
            'berita_acara'    => $fileNamebacara,
            'pesanan_brg'     => $fileNamepesanan,
            'bon_faktur'       => $fileNamebon,
            'id_bagian'       => session()->get('id_bagian'),
            'bagian'          => session()->get('nama_bagian'),
            'userentry'       => session()->get('nama'),
        ];
        $timeline = [
            'id'                => $this->request->getPost('idkegiatan'),
            'status'            => 2,
        ];
        $this->spjkegModel->save($timeline);
        $this->filekegiatanModel->save($data);
        //move file
        $kwitansi->move(ROOTPATH . 'public/media/kwitansi/', $fileNamekwitansi);
        $berita_acara->move(ROOTPATH . 'public/media/berita-acara/', $fileNamebacara);
        $pesanan_brg->move(ROOTPATH . 'public/media/pesanan-barang/', $fileNamepesanan);
        $bon_faktur->move(ROOTPATH . 'public/media/bon-faktur/', $fileNamebon);

        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('kegiatan/file/' . $id));
    }
    public function deletefile($id)
    {
        $data = $this->filekegiatanModel->find($id);
        $kwitansi = $data['kwitansi'];
        $berita_acara = $data['berita_acara'];
        $pesanan_brg = $data['pesanan_brg'];
        $bon_faktur = $data['bon_faktur'];
        if (file_exists(ROOTPATH . 'public/media/kwitansi/' . $kwitansi)) {
            unlink(ROOTPATH . 'public/media/kwitansi/' . $kwitansi);
        }
        if (file_exists(ROOTPATH . 'public/media/berita-acara/' . $berita_acara)) {
            unlink(ROOTPATH . 'public/media/berita-acara/' . $berita_acara);
        }
        if (file_exists(ROOTPATH . 'public/media/pesanan-barang/' . $pesanan_brg)) {
            unlink(ROOTPATH . 'public/media/pesanan-barang/' . $pesanan_brg);
        }
        if (file_exists(ROOTPATH . 'public/media/bon-faktur/' . $bon_faktur)) {
            unlink(ROOTPATH . 'public/media/bon-faktur/' . $bon_faktur);
        }
        $this->filekegiatanModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('kegiatan/file/' . $this->request->getPost('idkegiatan')));
    }
    public function dataadmin()
    {
        $databv = $this->spjkegModel->where('status', 2)->findAll();
        $datasv = $this->spjkegModel->where('status', 3)->findAll();
        $datavt = $this->spjkegModel->where('status', 4)->findAll();
        $data = array(
            'title' => 'Data SPJ Kegiatan',
            'databv' => $databv,
            'datasv' => $datasv,
            'datavt' => $datavt,
            'isi' => 'master/spjkegiatan/dataadmin'
        );
        return view('layout/wrapper', $data);
    }
    public function verifkegiatan($id)
    {
        $data = $this->spjkegModel->where('status', 2)->where('id', $id)->first();
        $datasub = $this->spjsubkegModel->where('id_kegiatan', $id)->findAll();
        $datafile = $this->filekegiatanModel->where('id_kegiatan', $id)->findAll();
        // dd($datasub);
        $title = $this->spjkegModel->where('id =', $id)->first();
        $data = array(
            'title' => 'Verifikasi SPJ SPPD',
            'titlebar' => 'Verifikasi SPJ SPPD',
            'kegiatan' => $title,
            'data' => $data,
            'datasub' => $datasub,
            'datafile' => $datafile,
            'validation' => \Config\Services::validation(),
            'isi' => 'master/spjkegiatan/verifkegiatan'
        );
        return view('layout/wrapper', $data);
    }
    public function verif($id)
    {
        $idb = $this->request->getPost('idbagian');
        $nilai = $this->request->getPost('nilai');
        $anggaran = $this->anggaranModel->where('id_bagian =', $idb)->first();
        $idanggaran = $anggaran['id'];
        $sisa = $anggaran['sisa_anggaran'];
        $jumlah = $anggaran['sisa_anggaran'] - $nilai;
        $pakai = $anggaran['pakai_anggaran'] + $nilai;
        // dd($pakai);
        if ($nilai > $sisa) {
            session()->setFlashdata('me', 'Maaf Pagu tidak mencukupi, sisa pagu hanya' . "\n" . rupiah($sisa));
            return redirect()->to(base_url('data-spjkegiatan/verifikasi/' . $id));
        }
        $data = [
            'id'                 => $idanggaran,
            'sisa_anggaran'      => $jumlah,
            'pakai_anggaran'     => $pakai,
        ];
        $timeline = [
            'id'                => $id,
            'status'            => 3,
        ];
        $this->anggaranModel->save($data);
        $this->spjkegModel->save($timeline);
        session()->setFlashdata('m', 'SPJ Kegiatan berhasil diverifikasi');
        return redirect()->to(base_url('data-spjkegiatan'));
    }
    public function tolak($id)
    {
        $timeline = [
            'id'                => $id,
            'status'            => 4,
            'alasan'            => $this->request->getPost('alasan'),
        ];
        $this->spjkegModel->save($timeline);
        session()->setFlashdata('m', 'SPJ Kegiatan berhasil ditolak');
        return redirect()->to(base_url('data-spjkegiatan'));
    }
    public function review($id)
    {
        $data = $this->spjkegModel->where('id', $id)->first();
        $datasub = $this->spjsubkegModel->where('id_kegiatan', $id)->findAll();
        $datafile = $this->filekegiatanModel->where('id_kegiatan', $id)->findAll();
        $title = $this->spjkegModel->where('id =', $id)->first();
        $data = array(
            'title' => 'Review Data SPJ Kegiatan',
            'titlebar' => 'Review Data SPJ Kegiatan',
            'kegiatan' => $title,
            'data' => $data,
            'datasub' => $datasub,
            'datafile' => $datafile,
            'isi' => 'master/spjkegiatan/review'
        );
        return view('layout/wrapper', $data);
    }
    // public function subkegiatan($id_kegiatan)
    // {
    //     $query = $this->subkegiatanModel->where('id_kegiatan', $id_kegiatan)->get();
    //     $data = "<option value='' selected disabled>.::Pilih Sub Kegiatan::.</option>";
    //     foreach ($query->getResultArray() as $key => $value) {
    //         $data .= "<option value='" . $value['id']  . "'>" . $value['nama_sub'] . "</option>";
    //     }
    //     echo $data;
    // }
    // public function datakegiatan()
    // {
    //     $cari = $this->request->getVar('search');
    //     $kegiatan =  $this->kegiatanModel->like('nama_kegiatan', $cari)->findAll();
    //     $data = array();
    //     foreach ($kegiatan as $r) :
    //         $data[] = [
    //             "id" => $r['kode_kegiatan'],
    //             "text" => $r['nama_kegiatan'],
    //         ];
    //     endforeach;
    //     echo json_encode($data);
    // }
    // public function datasub($kode)
    // {
    //     $query = $this->subkegiatanModel->where('kode_kegiatan', $kode)->get();
    //     $data = "<option value=''>.::Pilih Sub Kegiatan::.</option>";
    //     foreach ($query->getResultArray() as $key => $value) {
    //         $data .= "<option value='" . $value['nama_sub']  . "'>" . $value['nama_sub'] . "</option>";
    //     }
    //     echo $data;
    // }
}
