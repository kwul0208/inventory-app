<?php

namespace App\Models;

use CodeIgniter\Model;

class Db_model extends Model
{
    protected $table = 'user';
    protected $allowedFields = ['nama', 'email', 'password', 'role_id', 'date_created'];

    public function cari($email)
    {
        return $this->table('user')->like('email', $email);
    }
}
