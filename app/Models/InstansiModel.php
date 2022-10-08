<?php

namespace App\Models;

use CodeIgniter\Model;

class InstansiModel extends Model
{
    protected $table      = 'mod_instansi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'instansi', 'userentry'
    ];
}
