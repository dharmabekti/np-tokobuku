<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleDetailModel extends Model
{
    protected $table            = 'sale_detail';
    protected $allowedFields    = ['sale_id', 'book_id', 'amount', 'price', 'discount', 'total_price'];

    public function getDetail($sale_id)
    {
        return $this->select('sale_detail.*, b.title, c.name_category')
            ->join('book b', 'book_id')
            ->join('book_category c', 'book_category_id')
            ->where('sale_id', $sale_id)
            ->findAll();
    }
}
