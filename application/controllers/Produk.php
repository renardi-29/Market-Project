<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Produk_model');
    }

    public function index()
    {
        $data['title'] = 'Produk';

        $data['produk'] = $this->Produk_model->get_all();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('produk/index', $data);
        $this->load->view('layouts/footer');
    }
}
