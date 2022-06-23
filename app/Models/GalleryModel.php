<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table            = 'gallery';
    protected $allowedFields    = ['nama_file', 'type_file', 'path', 'size'];
}
