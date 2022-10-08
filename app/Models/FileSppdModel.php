<?php

namespace App\Models;

use CodeIgniter\Model;

class FileSppdModel extends Model
{
    protected $table      = 'mod_file_sppd';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_kegiatan', 'id_bagian', 'kwitansi', 'lumsum', 'spt', 'lpd', 'bagian', 'userentry'
    ];
}
