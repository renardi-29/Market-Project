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
        $data = [
            'user_id'     => $this->input->post('user_id'),
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi'   => $this->input->post('deskripsi'),
            'harga'       => $this->input->post('harga'),
            'stok'        => $this->input->post('stok')
        ];

        $this->Produk_model->insert($data);

        redirect('produk');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Produk';

        // Ambil data produk berdasarkan ID
        $data['produk'] = $this->Produk_model->get_by_id($id);

        // Ambil daftar user dengan role penjual
        $data['penjual'] = $this->Produk_model->get_penjual();

        // Tampilkan halaman edit
        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('produk/edit', $data);
        $this->load->view('layouts/footer');
    }

    public function update($id)
    {
        $data = [
            'user_id'     => $this->input->post('user_id'),
            'nama_produk' => $this->input->post('nama_produk'),
            'deskripsi'   => $this->input->post('deskripsi'),
            'harga'       => $this->input->post('harga'),
            'stok'        => $this->input->post('stok')
        ];

        $this->Produk_model->update($id, $data);

        redirect('produk');
    }
    public function delete($id)
    {
        $this->Produk_model->delete($id);

        redirect('produk');
    }
}
