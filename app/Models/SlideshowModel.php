<?php

namespace App\Models;

use CodeIgniter\Model;

class SlideshowModel extends Model
{
    protected $table      = 'mod_slideshow';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['keterangan', 'gambar'];
}
