<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Dashboard_model');
    }


    public function index()
    {
        $data['title'] = 'Dashboard';

        $data['total_produk'] =
            $this->Dashboard_model->total_produk();

        $data['total_transaksi'] =
            $this->Dashboard_model->total_transaksi();

        $data['total_penjual'] =
            $this->Dashboard_model->total_penjual();

        $data['total_pembeli'] =
            $this->Dashboard_model->total_pembeli();

        $data['transaksi_terbaru'] =
            $this->Dashboard_model->transaksi_terbaru();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('home', $data);
        $this->load->view('layouts/footer');
    }
}
