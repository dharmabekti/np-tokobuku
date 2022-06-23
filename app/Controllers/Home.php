<?php

namespace App\Controllers;

use App\Models\BerandaModel;

define('_TITLE', 'Beranda');

class Home extends BaseController
{
    private $_beranda_model;
    public function __construct()
    {
        $this->_beranda_model = new BerandaModel();
    }

    public function index()
    {
        $data = [
            'title' => _TITLE
        ];
        return view('beranda', $data);
    }

    public function showChartTransaksi()
    {
        $tahun = $this->request->getVar('tahun');
        $data_transaksi = $this->_beranda_model->getTransaksi($tahun);

        $response = [
            'status' => true,
            'data' => $data_transaksi
        ];
        echo json_encode($response);
    }

    public function showChartCustomer()
    {
        $tahun = $this->request->getVar('tahun');
        $data_customer = $this->_beranda_model->getCustomer($tahun);
        $response = [
            'status' => true,
            'data' => $data_customer
        ];
        echo json_encode($response);
    }
}