<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table            = 'customer';
    protected $primaryKey = 'customer_id';
    protected $allowedFields    = ['name', 'no_customer', 'address', 'gender', 'email', 'phone'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
}
