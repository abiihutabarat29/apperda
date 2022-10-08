<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKegiatanModel extends Model
{
    protected $table      = 'mod_sub_kegiatan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_kegiatan', 'id_bagian', 'kode_kegiatan', 'nama_kegiatan', 'kode_sub', 'nama_sub', 'bagian', 'userentry'
    ];
}
