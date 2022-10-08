<?php

namespace App\Models;

use CodeIgniter\Model;

class SpjKegiatanModel extends Model
{
    protected $table      = 'mod_spj_kegiatan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_kegiatan', 'id_bagian', 'id_rek', 'kode_kegiatan', 'nama_kegiatan',
        'kode_rek', 'nama_rek', 'kode_rek_simda', 'bagian', 'uraian', 'nilai_kwitansi', 'nama_penerima', 'alamat_penerima', 'alasan', 'status', 'userentry'
    ];
}
