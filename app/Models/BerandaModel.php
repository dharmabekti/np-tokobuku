<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    public function getTransaksi($tahun)
    {
        return $this->db->table('sale_detail as sd')
            ->select("MONTH(s.created_at) bulan, SUM(sd.total_price) total")
            ->join('sale s', 'sale_id')
            ->where('YEAR(s.created_at)', $tahun)
            ->orderBy('MONTH(s.created_at)')
            ->get()->getResultArray();
    }

    public function getCustomer($tahun)
    {
        return $this->db->table('customer')
            ->select("MONTH(created_at) bulan, COUNT(*) total")
            ->where('YEAR(created_at)', $tahun)
            ->orderBy('MONTH(created_at)')
            ->get()->getResultArray();
    }
}