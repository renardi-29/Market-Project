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

        $data['detail_transaksi'] =
            $this->Detail_transaksi_model->get_all();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view(
            'detail_transaksi/index',
            $data
        );
        $this->load->view('layouts/footer');
    }


    public function tambah()
    {
        $data['title'] = 'Tambah Detail Transaksi';

        $data['transaksi'] =
            $this->Detail_transaksi_model->get_transaksi();

        $data['produk'] =
            $this->Detail_transaksi_model->get_produk();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view(
            'detail_transaksi/tambah',
            $data
        );
        $this->load->view('layouts/footer');
    }


    public function simpan()
    {
        $transaksi_id = $this->input->post('transaksi_id');
        $produk_id = $this->input->post('produk_id');
        $jumlah = $this->input->post('jumlah');

        /** @var CI_DB_query_builder $db */
        $db = $this->db;

        $produk = $db
            ->where('id', $produk_id)
            ->get('produk')
            ->row();

        if (!$produk) {
            show_error('Produk tidak ditemukan.');
        }

        $subtotal = $produk->harga * $jumlah;

        $data = [
            'transaksi_id' => $transaksi_id,
            'produk_id' => $produk_id,
            'jumlah' => $jumlah,
            'harga' => $produk->harga,
            'subtotal' => $subtotal
        ];

        $this->Detail_transaksi_model->insert($data);

        redirect('detail_transaksi');
    }


    public function edit($id)
    {
        $data['title'] = 'Edit Detail Transaksi';

        $data['detail'] =
            $this->Detail_transaksi_model->get_by_id($id);

        if (!$data['detail']) {
            show_404();
        }

        $data['transaksi'] =
            $this->Detail_transaksi_model->get_transaksi();

        $data['produk'] =
            $this->Detail_transaksi_model->get_produk();

        $this->load->view('layouts/header', $data);
        $this->load->view('layouts/sidebar');
        $this->load->view(
            'detail_transaksi/edit',
            $data
        );
        $this->load->view('layouts/footer');
    }


    public function update($id)
    {
        $transaksi_id = $this->input->post('transaksi_id');
        $produk_id = $this->input->post('produk_id');
        $jumlah = $this->input->post('jumlah');

        /** @var CI_DB_query_builder $db */
        $db = $this->db;

        $produk = $db
            ->where('id', $produk_id)
            ->get('produk')
            ->row();

        if (!$produk) {
            show_error('Produk tidak ditemukan.');
        }

        $subtotal = $produk->harga * $jumlah;

        $data = [
            'transaksi_id' => $transaksi_id,
            'produk_id' => $produk_id,
            'jumlah' => $jumlah,
            'harga' => $produk->harga,
            'subtotal' => $subtotal
        ];

        $this->Detail_transaksi_model->update(
            $id,
            $data
        );

        redirect('detail_transaksi');
    }


    public function hapus($id)
    {
        $this->Detail_transaksi_model->delete($id);

        redirect('detail_transaksi');
    }
}
