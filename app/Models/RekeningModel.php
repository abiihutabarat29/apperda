<?php

namespace App\Models;

use CodeIgniter\Model;

class RekeningModel extends Model
{
    protected $table      = 'mod_rekening_belanja';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'kode_rek', 'nama_rek', 'kode_rek_simda', 'userentry'
    ];
}
