<?php

namespace App\Models;

use CodeIgniter\Model;

class TimeModel extends Model
{
    protected $table      = 'mod_timestamp';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_perda', 'id_instansi', 'timestamp', 'userentry'
    ];
}
