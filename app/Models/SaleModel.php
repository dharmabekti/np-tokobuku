<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleModel extends Model
{
    protected $table            = 'sale';
    protected $allowedFields    = ['sale_id', 'user_id', 'customer_id'];
    protected $useTimestamps = true;

    public function getLaporan($tgl_awal, $tgl_akhir)
    {
        return $this->db->table('sale_detail as sd')
            ->select('s.sale_id, s.created_at tgl_transaksi, s.user_id, u.firstname, u.lastname, s.customer_id, c.name nama_customer, SUM(sd.total_price) total')
            ->join('sale s', 'sd.sale_id = s.sale_id')
            ->join('users u', 'u.id = s.user_id')
            ->join('customer c', 'c.customer_id = s.customer_id', 'left')
            ->where('date(s.created_at) >=', $tgl_awal)
            ->where('date(s.created_at) <=', $tgl_akhir)
            ->groupBy('s.sale_id')
            ->get()->getResultArray();
    }

    public function getLaporanById($sale_id)
    {
        return $this->select("sale.*, u.firstname, u.lastname, c.name")
            ->join('users u', 'u.id=sale.user_id')
            ->join('customer c', 'c.customer_id = sale.customer_id', 'left')
            ->where('sale_id', $sale_id)->first();
    }
}