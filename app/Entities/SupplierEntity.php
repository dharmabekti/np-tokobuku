<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class SupplierEntity extends Entity
{
    protected $datamap = [
        'nama' => 'name',
        'alamat' => 'address',
        'email' => 'email',
        'telepon' => 'phone'
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

    public function setEmail($email)
    {
        $this->attributes['email'] = strtolower($email);
        return $this;
    }

    public function getName()
    {
        $name = strtoupper($this->attributes['name']);
        return $name;
    }
}
