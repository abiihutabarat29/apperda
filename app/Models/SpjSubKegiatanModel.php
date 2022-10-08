<?php

namespace App\Models;

use CodeIgniter\Model;

class SpjSubKegiatanModel extends Model
{
    protected $table      = 'mod_spj_subkegiatan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_kegiatan', 'id_subkegiatan', 'id_bagian', 'id_rek', 'kode_sub', 'nama_sub', 'kode_rek', 'nama_rek', 'kode_rek_simda', 'uraian', 'nilai_kwitansi', 'nama_penerima', 'alamat_penerima',  'bagian', 'userentry'
    ];
}
