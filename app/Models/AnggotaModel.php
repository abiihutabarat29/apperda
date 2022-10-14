<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaModel extends Model
{
    protected $table      = 'mod_anggota';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_fraksi', 'fraksi', 'nama', 'jabatan', 'foto'];
}
