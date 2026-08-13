<?php

class Detail_transaksi_model extends CI_Model
{
    public function get_all()
    {
        return $this->db
            ->select('
                detail_transaksi.*,
                produk.nama_produk,
                transaksi.id AS nomor_transaksi
            ')
            ->from('detail_transaksi')
            ->join(
                'produk',
                'produk.id = detail_transaksi.produk_id'
            )
            ->join(
                'transaksi',
                'transaksi.id = detail_transaksi.transaksi_id'
            )
            ->order_by('detail_transaksi.id', 'DESC')
            ->get()
            ->result();
    }
}
