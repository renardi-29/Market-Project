<?php

class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Produk_model');
        $this->load->library('form_validation');
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

    public function tambah()
    {
        $data['title'] = 'Tambah Produk';

        $data['penjual'] = $this->Produk_model->get_penjual();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('produk/tambah', $data);
        $this->load->view('layouts/footer');
    }

    public function simpan()
    {
        $this->form_validation->set_rules(
            'user_id',
            'Penjual',
            'required'
        );

        $this->form_validation->set_rules(
            'nama_produk',
            'Nama Produk',
            'required|trim'
        );

        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'required|numeric'
        );

        $this->form_validation->set_rules(
            'stok',
            'Stok',
            'required|integer'
        );

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Tambah Produk';
            $data['penjual'] = $this->Produk_model->get_penjual();

            $this->load->view('layouts/header', $data);
            $this->load->view('layouts/sidebar');
            $this->load->view('produk/tambah', $data);
            $this->load->view('layouts/footer');
        } else {

            $data = [
                'user_id'     => $this->input->post('user_id'),
                'nama_produk' => $this->input->post('nama_produk', TRUE),
                'deskripsi'   => $this->input->post('deskripsi', TRUE),
                'harga'       => $this->input->post('harga'),
                'stok'        => $this->input->post('stok')
            ];

            $this->Produk_model->insert($data);

            redirect('produk');
        }
    }
}
