<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table      = 'mod_profil';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama_app', 'link_app', 'deskripsi_app', 'icon', 'alamat', 'email', 'nohp'];
}
