<?php

namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table      = 'mod_file';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_perda', 'id_instansi', 'nota', 'pdg_nota', 'jwb_bupati', 'pbhs_ranperda', 'pansus_bapemperda', 'hsl_pembahasan', 'lap_pembahasan', 'pendapat_fraksi', 'penandatangan', 'userentry'
    ];
}
