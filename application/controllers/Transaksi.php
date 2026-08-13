<?php

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Transaksi_model');
    }


    public function index()
    {
        $data['title'] = 'Transaksi';

        $data['transaksi'] = $this->Transaksi_model->get_all();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('transaksi/index', $data);
        $this->load->view('layouts/footer');
    }


    public function tambah()
    {
        $data['title'] = 'Tambah Transaksi';

        $data['pembeli'] = $this->Transaksi_model->get_pembeli();
        $data['produk'] = $this->Transaksi_model->get_produk();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('transaksi/tambah', $data);
        $this->load->view('layouts/footer');
    }


    public function simpan()
    {
        $produk_id = $this->input->post('produk_id');
        $jumlah = $this->input->post('jumlah');

        $produk = $this->db
            ->where('id', $produk_id)
            ->get('produk')
            ->row();

        if (!$produk) {
            show_error('Produk tidak ditemukan.');
        }

        $subtotal = $produk->harga * $jumlah;

        $transaksi = [
            'user_id' => $this->input->post('user_id'),
            'total' => $subtotal,
            'status' => $this->input->post('status')
        ];

        $detail = [
            'produk_id' => $produk_id,
            'jumlah' => $jumlah,
            'harga' => $produk->harga,
            'subtotal' => $subtotal
        ];

        $this->Transaksi_model->insert($transaksi, $detail);

        redirect('transaksi');
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Transaksi';

        $data['transaksi'] =
            $this->Transaksi_model->get_by_id($id);

        $data['detail'] =
            $this->Transaksi_model->get_detail($id);

        $data['pembeli'] =
            $this->Transaksi_model->get_pembeli();

        $data['produk'] =
            $this->Transaksi_model->get_produk();

        if (!$data['transaksi']) {
            show_404();
        }

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view('transaksi/edit', $data);
        $this->load->view('layouts/footer');
    }


    public function update($id)
    {
        $produk_id = $this->input->post('produk_id');
        $jumlah = $this->input->post('jumlah');

        $produk = $this->db
            ->where('id', $produk_id)
            ->get('produk')
            ->row();

        if (!$produk) {
            show_error('Produk tidak ditemukan.');
        }

        $subtotal = $produk->harga * $jumlah;

        $transaksi = [
            'user_id' => $this->input->post('user_id'),
            'total' => $subtotal,
            'status' => $this->input->post('status')
        ];

        $detail = [
            'produk_id' => $produk_id,
            'jumlah' => $jumlah,
            'harga' => $produk->harga,
            'subtotal' => $subtotal
        ];

        $this->Transaksi_model->update(
            $id,
            $transaksi,
            $detail
        );

        redirect('transaksi');
    }


    public function hapus($id)
    {
        $this->Transaksi_model->delete($id);

        redirect('transaksi');
    }
}
