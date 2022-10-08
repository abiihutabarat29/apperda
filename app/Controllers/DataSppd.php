<?php

namespace App\Controllers;

use App\Models\SppdModel;
use App\Models\BagianModel;
use App\Models\KegiatanModel;
use App\Models\SubKegiatanModel;
use App\Models\RekeningModel;
use App\Models\SpjSubKegiatanModel;
use App\Models\FileSppdModel;
use App\Models\GuModel;
use App\Models\AnggaranModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\Config\Config;
use CodeIgniter\HTTP\RequestInterface;

class DataSppd extends BaseController
{
    protected $sppdModel;
    protected $kegiatanModel;
    protected $subkegiatanModel;
    protected $bagianModel;
    protected $rekModel;
    protected $spjsubModel;
    protected $filesppdModel;
    protected $guModel;
    protected $anggaranModel;
    public function __construct()
    {
        $this->sppdModel = new SppdModel();
        $this->kegiatanModel = new KegiatanModel();
        $this->subkegiatanModel = new SubKegiatanModel();
        $this->bagianModel = new BagianModel();
        $this->rekModel = new RekeningModel();
        $this->spjsubModel = new SpjSubKegiatanModel();
        $this->filesppdModel = new FileSppdModel();
        $this->guModel = new GuModel();
        $this->anggaranModel = new AnggaranModel();
    }
    public function datasppd()
    {
        $id = session()->get('id_bagian');
        $datasppd = $this->sppdModel->where('id_bagian =', $id)->findAll();
        $data = array(
            'title' => 'Data SPJ SPPD',
            'data' => $datasppd,
            'isi' => 'master/sppd/data'
        );
        return view('layout/wrapper', $data);
    }
    public function add()
    {
        $kegiatan = $this->kegiatanModel->findAll();
        $data = array(
            'titlebar' => 'Data SPJ SPPD',
            'title' => 'Form Tambah Data SPJ SPPD',
            'isi' => 'master/sppd/add',
            'kegiatan' => $kegiatan,
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
            ]
        ])) {
            return redirect()->to('/sppd/add')->withInput();
        }
        $data = [
            'id_kegiatan'        => $this->request->getPost('idkegiatan'),
            'kode_kegiatan'      => $this->request->getPost('kodekeg'),
            'nama_kegiatan'      => $this->request->getPost('namakeg'),
            'status'             => 0,
            'id_bagian'          => session()->get('id_bagian'),
            'bagian'             => session()->get('nama_bagian'),
            'userentry'          => session()->get('nama'),
        ];
        $this->sppdModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('sppd'));
    }

    public function delete($id)
    {
        $data = $this->filesppdModel->where('id_kegiatan =', $id)->first();
        $kwitansi = $data['kwitansi'];
        $lumsum = $data['lumsum'];
        $spt = $data['spt'];
        $lpd = $data['lpd'];
        if (file_exists(ROOTPATH . 'public/media/kwitansi/' . $kwitansi)) {
            unlink(ROOTPATH . 'public/media/kwitansi/' . $kwitansi);
        }
        if (file_exists(ROOTPATH . 'public/media/lumsum/' . $lumsum)) {
            unlink(ROOTPATH . 'public/media/lumsum/' . $lumsum);
        }
        if (file_exists(ROOTPATH . 'public/media/spt/' . $spt)) {
            unlink(ROOTPATH . 'public/media/spt/' . $spt);
        }
        if (file_exists(ROOTPATH . 'public/media/lpd/' . $lpd)) {
            unlink(ROOTPATH . 'public/media/lpd/' . $lpd);
        }
        $this->sppdModel->delete($id);
        $this->spjsubModel->where('id_kegiatan', $id)->delete();
        $this->filesppdModel->where('id_kegiatan', $id)->delete();
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('sppd'));
    }

    public function edit($id)
    {
        $idb = session()->get('id_bagian');
        $kegiatan = $this->kegiatanModel->findAll();
        $data = array(
            'titlebar' => 'Data SPJ SPPD',
            'title' => 'Form Edit Data SPJ SPPD',
            'kegiatan' => $kegiatan,
            'isi' => 'master/sppd/edit',
            'validation' => \Config\Services::validation(),
            'data' => $this->sppdModel->where('id', $id)->where('id_bagian', $idb)->first(),
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
            ]
        ])) {
            return redirect()->to(base_url('sppd/edit/' . $this->request->getPost('id')))->withInput();
        }
        $data = [
            'id'                 => $id,
            'id_kegiatan'        => $this->request->getPost('idkegiatan'),
            'kode_kegiatan'      => $this->request->getPost('kodekeg'),
            'nama_kegiatan'      => $this->request->getPost('namakeg'),
        ];
        $this->sppdModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('sppd'));
    }
    public function datasub($id)
    {
        $title = $this->sppdModel->where('id =', $id)->first();
        $idb = session()->get('id_bagian');
        $datasub = $this->sppdModel->join('mod_spj_subkegiatan', 'mod_spj_subkegiatan.id_kegiatan = mod_spj_sppd.id', 'left')->where('mod_spj_subkegiatan.id_bagian =', $idb)->where('mod_spj_subkegiatan.id_kegiatan =', $id)->findAll();
        $data = array(
            'title' => 'Data Sub Kegiatan',
            'data' => $datasub,
            'kegiatan' => $title,
            'isi' => 'master/sppd/datasub'
        );
        return view('layout/wrapper', $data);
    }
    public function addsub($id)
    {
        $idb = session()->get('id_bagian');
        $title = $this->sppdModel->where('id =', $id)->first();
        $subkegiatan = $this->subkegiatanModel->where('id_bagian =', $idb)->findAll();
        $rek = $this->rekModel->findAll();
        $data = array(
            'titlebar' => 'Data Sub Kegiatan',
            'title' => 'Form Tambah Data Sub Kegiatan',
            'isi' => 'master/sppd/addsub',
            'subkegiatan' => $subkegiatan,
            'kegiatan' => $title,
            'rekening' => $rek,
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
            return redirect()->to('/sppd/add-sub-kegiatan/' . $id)->withInput();
        }
        $idb = session()->get('id_bagian');
        $nilai = $this->request->getPost('nilai');
        $anggaran = $this->anggaranModel->where('id_bagian =', $idb)->first();
        $sisa = $anggaran['sisa_anggaran'];
        if ($nilai > $anggaran['sisa_anggaran']) {
            session()->setFlashdata('me', 'Maaf Pagu tidak mencukupi, sisa pagu hanya' . "\n" . rupiah($sisa));
            return redirect()->to(base_url('sppd/sub-kegiatan/' . $this->request->getPost('idkegiatan')));
        }
        $data = [
            'id_kegiatan'        => $this->request->getPost('idkegiatan'),
            'id_subkegiatan'     => $this->request->getPost('idsub'),
            'id_rek'             => $this->request->getPost('idrekening'),
            'kode_sub'           => $this->request->getPost('kodesubkeg'),
            'nama_sub'           => $this->request->getPost('namasubkeg'),
            'kode_rek'           => $this->request->getPost('koderekening'),
            'nama_rek'           => $this->request->getPost('namarek'),
            'kode_rek_simda'     => $this->request->getPost('reksimda'),
            'uraian'             => $this->request->getPost('uraian'),
            'nilai_kwitansi'     => $this->request->getPost('nilai'),
            'nama_penerima'      => $this->request->getPost('nmpenerima'),
            'alamat_penerima'    => $this->request->getPost('alamat'),
            'id_bagian'          => session()->get('id_bagian'),
            'bagian'             => session()->get('nama_bagian'),
            'userentry'          => session()->get('nama'),
        ];
        $timeline = [
            'id'                => $this->request->getPost('idkegiatan'),
            'status'            => 1,
        ];
        $this->sppdModel->save($timeline);
        $this->spjsubModel->save($data);
        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('sppd/sub-kegiatan/' . $id));
    }
    public function editsub($id)
    {
        $idb = session()->get('id_bagian');
        $subkegiatan = $this->subkegiatanModel->where('id_bagian =', $idb)->findAll();
        $rek = $this->rekModel->findAll();
        $data = array(
            'titlebar' => 'Data Sub Kegiatan',
            'title' => 'Form Edit Data Sub Kegiatan',
            'subkegiatan' => $subkegiatan,
            'rekening' => $rek,
            'isi' => 'master/sppd/editsub',
            'validation' => \Config\Services::validation(),
            'data' => $this->spjsubModel->where('id', $id)->where('id_bagian', $idb)->first(),
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
            return redirect()->to(base_url('sppd/edit-sub-kegiatan/' . $this->request->getPost('id')))->withInput();
        }
        $idb = session()->get('id_bagian');
        $nilai = $this->request->getPost('nilai');
        $anggaran = $this->anggaranModel->where('id_bagian =', $idb)->first();
        $sisa = $anggaran['sisa_anggaran'];
        if ($nilai > $anggaran['sisa_anggaran']) {
            session()->setFlashdata('me', 'Maaf Pagu tidak mencukupi, sisa pagu hanya' . "\n" . rupiah($sisa));
            return redirect()->to(base_url('sppd/sub-kegiatan/' . $this->request->getPost('idkegiatan')));
        }
        $data = [
            'id'                 => $id,
            'id_kegiatan'        => $this->request->getPost('idkegiatan'),
            'id_subkegiatan'     => $this->request->getPost('idsub'),
            'id_rek'             => $this->request->getPost('idrekening'),
            'kode_sub'           => $this->request->getPost('kodesubkeg'),
            'nama_sub'           => $this->request->getPost('namasubkeg'),
            'kode_rek'           => $this->request->getPost('koderekening'),
            'nama_rek'           => $this->request->getPost('namarek'),
            'kode_rek_simda'     => $this->request->getPost('reksimda'),
            'uraian'             => $this->request->getPost('uraian'),
            'nilai_kwitansi'     => $this->request->getPost('nilai'),
            'nama_penerima'      => $this->request->getPost('nmpenerima'),
            'alamat_penerima'    => $this->request->getPost('alamat'),
        ];
        $this->spjsubModel->save($data);
        session()->setFlashdata('m', 'Data berhasil diupdate');
        return redirect()->to(base_url('sppd/sub-kegiatan/' . $this->request->getPost('idkegiatan')));
    }
    public function deletesub($id)
    {
        $this->spjsubModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('sppd/sub-kegiatan/' . $this->request->getPost('idkegiatan')));
    }
    public function datafile($id)
    {
        $title = $this->sppdModel->where('id =', $id)->first();
        $idb = session()->get('id_bagian');
        $datasub = $this->sppdModel->join('mod_file_sppd', 'mod_file_sppd.id_kegiatan = mod_spj_sppd.id', 'left')->where('mod_file_sppd.id_bagian =', $idb)->where('mod_file_sppd.id_kegiatan =', $id)->findAll();
        $data = array(
            'title' => 'Data File SPPD',
            'data' => $datasub,
            'kegiatan' => $title,
            'isi' => 'master/sppd/datafile'
        );
        return view('layout/wrapper', $data);
    }
    public function addfile($id)
    {
        $title = $this->sppdModel->where('id =', $id)->first();
        $data = array(
            'titlebar' => 'Data File SPPD',
            'title' => 'Form Tambah Data File SPPD',
            'kegiatan' => $title,
            'isi' => 'master/sppd/addfile',
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
            'lumsum' => [
                'rules' => 'uploaded[lumsum]|mime_in[lumsum,application/pdf]|max_size[lumsum,200]',
                'errors' => [
                    'uploaded' => 'Lumsum harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 200kb.'
                ]
            ],
            'spt' => [
                'rules' => 'uploaded[spt]|mime_in[spt,application/pdf]|max_size[spt,200]',
                'errors' => [
                    'uploaded' => 'Surat Perintah Tugas harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 200kb.'
                ]
            ],
            'lpd' => [
                'rules' => 'uploaded[lpd]|mime_in[lpd,application/pdf]|max_size[lpd,200]',
                'errors' => [
                    'uploaded' => 'Laporan Perjalanan Dinas harus di upload.',
                    'mime_in' => 'Extension file yang diperbolehkan .pdf',
                    'max_size' => 'Ukuran File maksimal 200kb.'
                ]
            ]
        ])) {
            return redirect()->to('/sppd/add-file/' . $id)->withInput();
        }
        $kwitansi   = $this->request->getFile('kwitansi');
        $lumsum   = $this->request->getFile('lumsum');
        $spt   = $this->request->getFile('spt');
        $lpd   = $this->request->getFile('lpd');
        $fileNamekwitansi = $kwitansi->getRandomName();
        $fileNamelumsum = $lumsum->getRandomName();
        $fileNamespt = $spt->getRandomName();
        $fileNamelpd = $lpd->getRandomName();
        $data = [
            'id_kegiatan'     => $this->request->getPost('idkegiatan'),
            'kwitansi'        => $fileNamekwitansi,
            'lumsum'          => $fileNamelumsum,
            'spt'             => $fileNamespt,
            'lpd'             => $fileNamelpd,
            'id_bagian'       => session()->get('id_bagian'),
            'bagian'          => session()->get('nama_bagian'),
            'userentry'       => session()->get('nama'),
        ];
        $timeline = [
            'id'                => $this->request->getPost('idkegiatan'),
            'status'            => 2,
        ];
        $this->sppdModel->save($timeline);
        $this->filesppdModel->save($data);
        //move file
        $kwitansi->move(ROOTPATH . 'public/media/kwitansi/', $fileNamekwitansi);
        $lumsum->move(ROOTPATH . 'public/media/lumsum/', $fileNamelumsum);
        $spt->move(ROOTPATH . 'public/media/spt/', $fileNamespt);
        $lpd->move(ROOTPATH . 'public/media/lpd/', $fileNamelpd);

        session()->setFlashdata('m', 'Data berhasil disimpan');
        return redirect()->to(base_url('sppd/file/' . $id));
    }
    public function deletefile($id)
    {
        $data = $this->filesppdModel->find($id);
        $kwitansi = $data['kwitansi'];
        $lumsum = $data['lumsum'];
        $spt = $data['spt'];
        $lpd = $data['lpd'];
        if (file_exists(ROOTPATH . 'public/media/kwitansi/' . $kwitansi)) {
            unlink(ROOTPATH . 'public/media/kwitansi/' . $kwitansi);
        }
        if (file_exists(ROOTPATH . 'public/media/lumsum/' . $lumsum)) {
            unlink(ROOTPATH . 'public/media/lumsum/' . $lumsum);
        }
        if (file_exists(ROOTPATH . 'public/media/spt/' . $spt)) {
            unlink(ROOTPATH . 'public/media/spt/' . $spt);
        }
        if (file_exists(ROOTPATH . 'public/media/lpd/' . $lpd)) {
            unlink(ROOTPATH . 'public/media/lpd/' . $lpd);
        }
        $this->filesppdModel->delete($id);
        session()->setFlashdata('m', 'Data berhasil dihapus');
        return redirect()->to(base_url('sppd/file/' . $this->request->getPost('idkegiatan')));
    }
    public function dataadmin()
    {
        $databv = $this->sppdModel->where('status', 2)->findAll();
        $datasv = $this->sppdModel->where('status', 3)->findAll();
        $datavt = $this->sppdModel->where('status', 4)->findAll();
        $data = array(
            'title' => 'Data SPJ SPPD',
            'databv' => $databv,
            'datasv' => $datasv,
            'datavt' => $datavt,
            'isi' => 'master/sppd/dataadmin'
        );
        return view('layout/wrapper', $data);
    }
    public function verifikasisppd($id)
    {
        $data = $this->sppdModel->where('status', 2)->where('id', $id)->first();
        $datasub = $this->spjsubModel->where('id_kegiatan', $id)->findAll();
        $datafile = $this->filesppdModel->where('id_kegiatan', $id)->findAll();
        // dd($datasub);
        $title = $this->sppdModel->where('id =', $id)->first();
        $data = array(
            'title' => 'Verifikasi SPJ SPPD',
            'titlebar' => 'Verifikasi SPJ SPPD',
            'kegiatan' => $title,
            'data' => $data,
            'datasub' => $datasub,
            'datafile' => $datafile,
            'validation' => \Config\Services::validation(),
            'isi' => 'master/sppd/verifikasisppd'
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
        // dd($nilai);
        if ($nilai > $sisa) {
            session()->setFlashdata('me', 'Maaf Pagu tidak mencukupi, sisa pagu hanya' . "\n" . rupiah($sisa));
            return redirect()->to(base_url('data-sppd/verifikasi/' . $id));
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
        $this->sppdModel->save($timeline);
        session()->setFlashdata('m', 'SPJ SPPD berhasil diverifikasi');
        return redirect()->to(base_url('data-sppd'));
    }
    public function tolak($id)
    {
        $timeline = [
            'id'                => $id,
            'status'            => 4,
            'alasan'            => $this->request->getPost('alasan'),
        ];
        $this->sppdModel->save($timeline);
        session()->setFlashdata('m', 'SPJ SPPD berhasil ditolak');
        return redirect()->to(base_url('data-sppd'));
    }
    public function review($id)
    {
        $data = $this->sppdModel->where('id', $id)->first();
        $datasub = $this->spjsubModel->where('id_kegiatan', $id)->findAll();
        $datafile = $this->filesppdModel->where('id_kegiatan', $id)->findAll();
        $title = $this->sppdModel->where('id =', $id)->first();
        $data = array(
            'title' => 'Review Data SPJ SPPD',
            'titlebar' => 'Review Data SPJ SPPD',
            'kegiatan' => $title,
            'data' => $data,
            'datasub' => $datasub,
            'datafile' => $datafile,
            'isi' => 'master/sppd/review'
        );
        return view('layout/wrapper', $data);
    }
    public function export($id)
    {
        // Fetch Data SPJ SPPD
        $datasppd = $this->sppdModel->where('id', $id)->first();
        $datasubkeg = $this->spjsubModel->where('id_kegiatan', $id)->findAll();
        // Design Table Identitas Sekolah
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet()->setTitle('Data SPJ SPPD');
        $spreadsheet->setActiveSheetIndex(0)->setCellValue('A1', $datasppd['nama_kegiatan']);
        $sheet->setCellValue('A2', 'NO');
        $sheet->setCellValue('B2', 'NO. BKU');
        $sheet->setCellValue('C2', 'JENIS KEGIATAN');
        $sheet->setCellValue('D2', 'URAIAN KEGIATAN');
        $sheet->setCellValue('E2', 'KODE SUB KEGIATAN');
        $sheet->setCellValue('F2', 'KODE REKENING');
        $sheet->setCellValue('G2', 'NAMA SUB KEGIATAN');
        $sheet->setCellValue('H2', 'NAMA REKENING');
        $sheet->setCellValue('I2', 'NILAI KWITANSI');
        $sheet->setCellValue('J2', 'PENERIMA PEMBAYARAN');
        $sheet->setCellValue('J3', 'NAMA REKANAN');
        $sheet->setCellValue('K3', 'ALAMAT');
        // $no =  1;
        // $row = 3;
        // foreach ($datasubkeg as $dsk) :
        //     $sheet->setCellValue('A' . $row, $no);
        //     $sheet->setCellValue('B' . $row, '');
        //     $sheet->setCellValue('C' . $row, '');
        //     $sheet->setCellValue('D' . $row, $datasppd['uraian']);
        //     $sheet->setCellValue('E' . $row, $dsk['kode_sub']);
        //     $sheet->setCellValue('F' . $row, $datasppd['kode_rek']);
        //     $sheet->setCellValue('G' . $row, $dsk['nama_sub']);
        //     $sheet->setCellValue('H' . $row, $datasppd['nama_rek']);
        //     $sheet->setCellValue('I' . $row, $datasppd['nilai_kwitansi']);
        //     $sheet->setCellValue('J' . $row, $datasppd['nama_penerima']);
        //     $sheet->setCellValue('K' . $row, $datasppd['alamat_penerima']);
        //Style
        $styleBorder = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];
        $styleColumnCenter = [
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $sheet->getStyle('A2:K5')->applyFromArray($styleBorder);
        $sheet->getStyle('A2:A5')->applyFromArray($styleColumnCenter);
        $sheet->getStyle('A2:K5')->applyFromArray($styleColumnCenter);
        $sheet->mergeCells('A1:K1');
        $sheet->mergeCells('A2:A3');
        $sheet->mergeCells('B2:B3');
        $sheet->mergeCells('C2:C3');
        $sheet->mergeCells('D2:D3');
        $sheet->mergeCells('E2:E3');
        $sheet->mergeCells('F2:F3');
        $sheet->mergeCells('G2:G3');
        $sheet->mergeCells('H2:H3');
        $sheet->mergeCells('I2:I3');
        $sheet->mergeCells('J2:K2');
        $sheet->getStyle('A1')->getFont()->setBold(true);
        $sheet->getColumnDimension('A')->setAutoSize(true);
        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);
        $sheet->getColumnDimension('F')->setAutoSize(true);
        $sheet->getColumnDimension('G')->setAutoSize(true);
        $sheet->getColumnDimension('H')->setAutoSize(true);
        $sheet->getColumnDimension('I')->setAutoSize(true);
        $sheet->getColumnDimension('J')->setWidth(150, 'pt');
        $sheet->getColumnDimension('K')->setWidth(200, 'pt');
        //     $no++;
        //     $row++;
        // endforeach;
        // Export
        $writer = new Xlsx($spreadsheet);
        $r = $this->sppdModel->where('id =', $id)->first();
        $bagian = $r['bagian'];
        $bulan = format_bulan(date('Y-m-d'));
        $tahun = format_tahun(date('Y-m-d'));
        $waktu = date('H:i:s');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Data SPJ SPPD_' . $bulan . '_' . $tahun . '_' . $bagian . '_' . $waktu . '.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
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
