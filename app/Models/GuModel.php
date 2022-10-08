<?php

namespace App\Models;

use CodeIgniter\Model;

class GuModel extends Model
{
    protected $table      = 'mod_gu';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'judul', 'tgl_mulai', 'jam_mulai', 'tgl_selesai', 'jam_selesai', 'bulan', 'tahun', 'userentry'
    ];
}
