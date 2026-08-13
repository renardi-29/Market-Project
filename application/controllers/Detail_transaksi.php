<?php

class Detail_transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Detail_transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'Detail Transaksi';

        $data['detail_transaksi'] = $this->Detail_transaksi_model->get_all();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('detail_transaksi/index', $data);
        $this->load->view('layouts/footer');
    }
}
