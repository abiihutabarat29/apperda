<?php

namespace App\Models;

use CodeIgniter\Model;

class SpjKegiatanSubModel extends Model
{
    protected $table      = 'mod_spj_kegiatansub';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_kegiatan', 'id_subkegiatan', 'id_bagian', 'kode_sub', 'nama_sub', 'bagian', 'userentry'
    ];
}
