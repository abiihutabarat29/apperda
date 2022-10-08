<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'mod_user';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_instansi', 'instansi', 'nik', 'nama', 'nohp', 'email', 'username', 'password', 'foto', 'level', 'status'];
}
