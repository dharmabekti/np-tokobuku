<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    // Nama Tabel
    protected $table      = 'supplier';
    protected $primaryKey = 'supplier_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'address', 'email', 'phone'];
    protected $returnType = 'App\Entities\SupplierEntity';
}
