<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggaranModel extends Model
{
    protected $table      = 'mod_anggaran';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_bagian', 'nama_bagian', 'jumlah_anggaran', 'pakai_anggaran', 'sisa_anggaran', 'thn_anggaran', 'userentry'
    ];
}
