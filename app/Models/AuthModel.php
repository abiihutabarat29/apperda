<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('mod_user')->where([
            'username' => $username
        ])->get()->getRowArray();
    }
}
