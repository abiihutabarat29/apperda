<?php

namespace App\Models;

use CodeIgniter\Model;

class SppdModel extends Model
{
    protected $table      = 'mod_spj_sppd';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_kegiatan', 'id_bagian', 'kode_kegiatan', 'nama_kegiatan', 'alasan', 'bagian', 'status', 'userentry'
    ];
}
