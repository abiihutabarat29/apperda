<?php

namespace App\Models;

use CodeIgniter\Model;

class FraksiModel extends Model
{
    protected $table      = 'mod_fraksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'fraksi', 'userentry'
    ];
}
