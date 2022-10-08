<?php

namespace App\Models;

use CodeIgniter\Model;

class FileKegiatanModel extends Model
{
    protected $table      = 'mod_file_kegiatan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_kegiatan', 'id_bagian', 'kwitansi', 'berita_acara', 'pesanan_brg', 'bon_faktur', 'bagian', 'userentry'
    ];
}
