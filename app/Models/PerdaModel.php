<?php

namespace App\Models;

use CodeIgniter\Model;

class PerdaModel extends Model
{
    protected $table      = 'mod_perda';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_instansi', 'instansi', 'judul_perda', 'dasar_hukum', 'draf_perda', 'naskah_akademik', 'dokumen', 'jenis_perda', 'surat', 'status', 'tgl_banmus',  'nota', 'pdg_nota', 'jwb_bupati', 'pbhs_ranperda', 'pansus_bapemperda', 'hsl_pembahasan', 'lap_pembahasan', 'pendapat_fraksi', 'penandatangan', 'userentry'
    ];
}
