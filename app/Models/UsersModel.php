<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    // Nama Tabel
    protected $table      = 'users';
    // protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $allowedFields = ['firstname', 'lastname', 'username', 'email', 'password_hash', 'active'];

    public function getUsers($id = false)
    {
        if ($id === false) {
            return $this->select('users.id, firstname, lastname, username, email, gs.group_id, g.name group_name')
                ->join('auth_groups_users gs', 'users.id=gs.user_id')
                ->join('auth_groups g', 'g.id = gs.group_id')
                ->findAll();
        } else {
            return $this->where(['id' => $id])->first();
        }
    }
}
